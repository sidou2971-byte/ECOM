<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Get session cart (for guests)
     */
    private function getSessionCart()
    {
        return session()->get('cart', []);
    }

    /**
     * Save session cart
     */
    private function saveSessionCart(array $cart)
    {
        session()->put('cart', $cart);
    }

    /**
     * Get total cart count (works for both guests and authenticated users)
     */
    public static function getCartCount()
    {
        if (Auth::check()) {
            return Auth::user()->cartItems()->sum('quantity');
        }
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }

    /**
     * Get total cart price (works for both guests and authenticated users)
     */
    public static function getCartTotal()
    {
        $total = 0;
        if (Auth::check()) {
            $cartItems = Auth::user()->cartItems()->with('product')->get();
            $total = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
        } else {
            $cart = session()->get('cart', []);
            foreach ($cart as $productId => $item) {
                $product = Product::find($productId);
                if ($product) {
                    $total += $item['quantity'] * $product->price;
                }
            }
        }
        return $total;
    }

    /**
     * Get all cart items (works for both guests and authenticated users)
     */
    public static function getCartItems()
    {
        if (Auth::check()) {
            return Auth::user()->cartItems()->with('product')->get();
        }

        $sessionCart = session()->get('cart', []);
        $cartItems = collect();

        foreach ($sessionCart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                // Ensure a similar object structure as CartItem model
                $cartItems->push((object)[
                    'id' => $productId,
                    'product_id' => $product->id,
                    'product' => $product,
                    'quantity' => $item['quantity'],
                ]);
            }
        }

        return $cartItems;
    }

    /**
     * Display the cart
     */
    public function index()
    {
        if (Auth::check()) {
            // Logged-in user: use database cart
            $cartItems = Auth::user()->cartItems()->with('product')->get();
            $total = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });
            return view('cart.index', compact('cartItems', 'total'));
        }

        // Guest: use session cart
        $sessionCart = $this->getSessionCart();
        $cartItems = collect();
        $total = 0;

        foreach ($sessionCart as $productId => $item) {
            $product = Product::find($productId);
            if ($product) {
                $cartItems->push((object)[
                    'id' => $productId,
                    'product' => $product,
                    'quantity' => $item['quantity'],
                ]);
                $total += $item['quantity'] * $product->price;
            }
        }

        return view('cart.guest', compact('cartItems', 'total'));
    }

    /**
     * Add to cart (works for guests and authenticated users)
     */
    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity,
        ]);

        $qty = (int) $request->quantity;

        if (Auth::check()) {
            // Logged-in: use database
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {
                $newQuantity = $cartItem->quantity + $qty;
                if ($newQuantity > $product->quantity) {
                    return back()->with('error', 'Quantité insuffisante en stock.');
                }
                $cartItem->quantity = $newQuantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $qty,
                ]);
            }
        } else {
            // Guest: use session
            $cart = $this->getSessionCart();
            $productId = $product->id;

            if (isset($cart[$productId])) {
                $newQty = $cart[$productId]['quantity'] + $qty;
                if ($newQty > $product->quantity) {
                    return back()->with('error', 'Quantité insuffisante en stock.');
                }
                $cart[$productId]['quantity'] = $newQty;
            } else {
                $cart[$productId] = ['quantity' => $qty];
            }

            $this->saveSessionCart($cart);
        }

        return back()->with('success', 'Produit ajouté au panier !');
    }

    /**
     * Update quantity (authenticated users only — guests use JS or re-add)
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $cartItem = CartItem::findOrFail($id);
            if ($cartItem->user_id !== Auth::id()) {
                return back()->with('error', 'Accès non autorisé.');
            }

            $request->validate([
                'quantity' => 'required|integer|min:1|max:' . $cartItem->product->quantity,
            ]);

            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        } else {
            // Guest session update
            $cart = $this->getSessionCart();
            $product = Product::findOrFail($id);
            $request->validate([
                'quantity' => 'required|integer|min:1|max:' . $product->quantity,
            ]);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = (int) $request->quantity;
                $this->saveSessionCart($cart);
            }
        }

        return back()->with('success', 'Panier mis à jour !');
    }

    /**
     * Remove from cart
     */
    public function remove($id)
    {
        if (Auth::check()) {
            $cartItem = CartItem::findOrFail($id);
            if ($cartItem->user_id !== Auth::id()) {
                return back()->with('error', 'Accès non autorisé.');
            }
            $cartItem->delete();
        } else {
            // Guest session remove
            $cart = $this->getSessionCart();
            unset($cart[$id]);
            $this->saveSessionCart($cart);
        }

        return back()->with('success', 'Produit retiré du panier !');
    }
}
