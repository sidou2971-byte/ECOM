<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $wishlists = Auth::user()->wishlists()->with('product')->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function toggle(Request $request, $productId)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return back()->with('success', 'Produit retiré de votre liste de souhaits');
        } else {
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
            ]);
            return back()->with('success', 'Produit ajouté à votre liste de souhaits');
        }
    }

    public function remove(Wishlist $wishlist)
    {
        if ($wishlist->user_id !== Auth::id()) {
            return back()->with('error', 'Accès non autorisé.');
        }

        $wishlist->delete();
        return back()->with('success', 'Produit retiré de votre liste de souhaits');
    }
}
