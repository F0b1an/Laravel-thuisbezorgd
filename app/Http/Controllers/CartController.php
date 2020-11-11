<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumable;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $consumable = Consumable::find($id);
 
        if(!$consumable) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first consumable
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "title" => $consumable->title,
                        "quantity" => 1,
                        "price" => $consumable->price,
                    ]
            ];
 
            session()->put('cart', $cart);
 		   
            return redirect()->back()->with('success', 'consumable added to cart successfully!');
        }

        // if cart not empty then check if this consumable exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $consumable->title,
            "quantity" => 1,
            "price" => $consumable->price,
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'consumable added to cart successfully!');
    }


    public function removeFromCart(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'removed successfully');
        }
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', 'Cart updated successfully');
        }
    }

}
