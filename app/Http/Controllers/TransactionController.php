<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\Game;
use App\Models\Header;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;

class TransactionController extends Controller{
    public function checkOut(){
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', 'LIKE', $user)->get();
        $transaction = new Header();
        $transaction->Uid = $user;
        $transaction->  transactionDate = date(now());
        $totalItem = 0;
        foreach ($cart as $cart) {
            $totalItem += $cart['quantity'];
        }
        $transaction->totalItem = $totalItem;
        $transaction->save();

        $transactionDetail = Cart::where('user_id',$user)->get();
        foreach ($transactionDetail as $item) {
            $transactionDetail = new Detail();
            $transactionDetail->transactionID = $transaction->id;
            $transactionDetail->gameID = $item->gameID;

            $games = Game::find($item->gameID);

            $transactionDetail->name = $games->gameTitle;
            $transactionDetail->price = $games->gamePrice;
            $transactionDetail->quantity = $item->quantity;
            $transactionDetail->subTotal = $item->quantity * $games->gamePrice;
            $transactionDetail->save();
        }

        $removeItems = Cart::where('user_id', $user)->first();
        while($removeItems != null){
            $removeItems->delete();
            $removeItems = Cart::where('user_id', $user)->first();
        }

        return redirect(url()->previous());
    }
}
