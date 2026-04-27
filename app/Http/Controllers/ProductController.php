<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        // Filtre par catégorie
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        // Filtre par sous-catégorie
        if ($request->has('subcategory') && $request->subcategory) {
            $query->where('subcategory', $request->subcategory);
        }
        
        // Filtre par catégorie ID
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        
        // Recherche
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        $products = $query->paginate(12);
        $categories = Category::where('is_active', true)->whereNull('parent_id')->with('children')->get();
        $featuredProducts = Product::where('is_featured', true)->take(6)->get();
        
        return view('products.index', compact('products', 'categories', 'featuredProducts'));
    }

    public function boutique(Request $request)
    {
        $query = Product::query();

        // Filtre par catégorie (animal)
        if ($request->filled('animal')) {
            $animals = is_array($request->animal) ? $request->animal : [$request->animal];
            $query->whereIn('category', $animals);
        }

        // Filtre par sous-catégorie (type produit)
        if ($request->filled('type')) {
            $types = is_array($request->type) ? $request->type : [$request->type];
            $query->whereIn('subcategory', $types);
        }

        // Filtre par Type aliment
        if ($request->filled('type_aliment')) {
            $typeAliments = is_array($request->type_aliment) ? $request->type_aliment : [$request->type_aliment];
            $query->where(function($q) use ($typeAliments) {
                foreach ($typeAliments as $ta) {
                    $q->orWhere('subcategory', 'like', '%' . $ta . '%')
                      ->orWhere('description', 'like', '%' . $ta . '%')
                      ->orWhere('name', 'like', '%' . $ta . '%');
                }
            });
        }

        // Filtre par prix
        if ($request->filled('price_min')) {
            $query->where(function($q) use ($request) {
                $q->where('discount_price', '>=', $request->price_min)
                  ->orWhere(function($q2) use ($request) {
                      $q2->whereNull('discount_price')->where('price', '>=', $request->price_min);
                  });
            });
        }
        if ($request->filled('price_max')) {
            $query->where(function($q) use ($request) {
                $q->where('discount_price', '<=', $request->price_max)
                  ->orWhere(function($q2) use ($request) {
                      $q2->whereNull('discount_price')->where('price', '<=', $request->price_max);
                  });
            });
        }

        // Tri
        switch ($request->input('sort', 'default')) {
            case 'price_asc':
                $query->orderByRaw('COALESCE(discount_price, price) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('COALESCE(discount_price, price) DESC');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('id', 'desc');
                break;
        }

        $products = $query->paginate(32)->appends($request->query());
        $totalProducts = Product::count();
        $categories = Category::where('is_active', true)->whereNull('parent_id')->with('children')->get();
        $priceMin = Product::min('price') ?? 0;
        $priceMax = Product::max('price') ?? 100000;
        $subcategories = Product::select('subcategory')->distinct()->whereNotNull('subcategory')->pluck('subcategory');

        return view('products.boutique', compact('products', 'categories', 'totalProducts', 'priceMin', 'priceMax', 'subcategories'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
            
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
