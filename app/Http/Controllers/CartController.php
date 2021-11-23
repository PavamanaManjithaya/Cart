<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fooditem;
class CartController extends Controller
{
    public function addToCart($id)
    {
        $food = Fooditem::find($id);

        if(!$food) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "id"=>$food->id,
                        "description" => $food->description,
                        "name" => $food->name,
                        "quantity" => 1,
                        "price" => $food->price,
                        "type" => $food->type
                    ]
            ];

            session()->put('cart', $cart);
            session()->flash('success', 'Food added to cart successfully');
            

           
        }else if(isset($cart[$id])) {

        // if cart not empty then check if this product exist then increment quantity
       

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            session()->flash('success', 'Food added to cart successfully');

        }
    else{
 // if item not exist in cart then add to cart with quantity = 1
 $cart[$id] = [
    "id"=>$food->id,
    "name" => $food->name,
    "description" => $food->description,
    "quantity" => 1,
    "price" => $food->price,
    "type" => $food->type
];

session()->put('cart', $cart);

session()->flash('success', 'Food added to cart successfully');
    }
       
    }
    public function removecart($id)
    {
      
                $cart = session()->get('cart');
            $cart[$id]["quantity"] = $cart[$id]["quantity"]-1;
            if( $cart[$id]["quantity"]==0)
            unset($cart[$id]);
            session()->put('cart', $cart);

            
            session()->flash('success', 'Food removed successfully');
        
    }
}
