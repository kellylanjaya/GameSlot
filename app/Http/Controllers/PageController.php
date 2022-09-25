<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Detail;
use App\Models\Details;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Header;
use Illuminate\Http\Request;

class PageController extends Controller{
    public function HomePage(){
        $games = Game::simplePaginate(10);
        $genre = Genre::all();
        return view('home',compact('genre','games'));
    }

    public function toLogin(){
        return view('login');
    }

    public function toRegister(){
        return view('register');
    }


    public function ManageGenre(){
        $genres = Genre::all();
        return view('manage-genre',compact('genres'));
    }


    public function toAddGenre(){
        return view('add-genre');
    }

    public function UpdateGenre( $id){
        return view('update-genre')->with('id',$id);
    }

    public function ManageGame(){
        $games = Game::all();
        $genres = Genre::all();
        return view('manage-game',compact('games','genres'));
    }

    public function toAddGame(){
        $genres = Genre::all();
        return view('add-game',compact('genres'));
    }

    public function toUpdateGame($id){
        $genres = Genre::all();
        return view('update-game',compact('genres'))->with('id',$id);
    }

    public function profile(){
        return view('profile');
    }

    public function toGameDetail($id){
        $games = Game::find($id);
        return view('game-detail',compact('games',$games))->with('id',$id);
    }

    public function myCart($id){
        $cartGames = Cart::where('id',$id)->get();
        $games = Game::all();
        $totalPrice = 0;
        foreach($cartGames as $games){
            $totalPrice = $totalPrice + $games->totalPrice;
        }

        return view('cart',compact('cartGames',$cartGames))->with('totalPrice',$totalPrice);
    }

    public function toTransaction(){
        $user = auth()->user()->id;
        $header = Header::where('Uid',$user)->get();
        return view('transaction',compact('header'));
    }

    public function toTransactionDetails($id){
        $details = Detail::where('transactionID', 'LIKE', $id);
        $header = Header::where('transactionID', 'LIKE', $id)->first();
        return view('transaction-detail')->with('header', $header)->with('details', $details);
    }

    public function search(Request $request){
        $games = Game::where('gameTitle', 'LIKE', "%$request->search%")->simplePaginate(10);
        return view('home', ['games' => $games]);
    }
}
