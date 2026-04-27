<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        $category = $request->get('category');
        
        $products = Product::query();
        
        if ($query) {
            $products->where(function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhere('description', 'like', '%' . $query . '%');
            });
        }
        
        if ($category) {
            $products->where('category', $category);
        }
        
        $products = $products->paginate(12);
        $categories = Category::where('is_active', true)->whereNull('parent_id')->get();
        
        return view('search.results', compact('products', 'query', 'categories'));
    }
}
