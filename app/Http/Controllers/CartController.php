<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addCart($id){
        $user = auth()->user()->id;

        $findGames = Cart::where('user_id',$user)->where('gameID',$id)->first();

        if($findGames){
            $Price = Game::find($id)->gamePrice;
            $findGames->quantity = $findGames->quantity+1;
            $findGames->totalPrice = $findGames->quantity * $Price;
            $findGames->save();
        }

        else{
            $cart = new Cart();
            $cart->user_id = $user;
            $games = Game::find($id);
            $cart->gameID = $games->id;
            $cart->quantity = 1;
            $cart->totalPrice = ($games->gamePrice * $cart->quantity);
            $cart->save();
        }
        return redirect('/');
    }

    public function showCart(){
        $user = Auth::user()->id;

        $cart = Cart::where('user_id', 'LIKE', $user)->get();
        if($cart != null){
            return view('cart',['cart' => $cart]);
        }
        else{
            return view('cart',['cart' => $cart]);
        }

    }

    public function deleteCart($id){

        $cart = Cart::find($id);
        $cart->delete();
        return redirect(url()->previous());
    }

    public function updateQuantity(Request $request,$id){
        $cart = Cart::find($id);
        if($cart!=null){
            $Price = Game::find($id)->gamePrice;
            $cart->quantity = $request->quantity;
            $cart->totalPrice = $cart->quantity * $Price;
            $cart->save();
        }

        return redirect(url()->previous());
    }
}
