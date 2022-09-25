<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller{
    public function addGame(Request $request){
        $data = [
        'gameTitle'=> 'required',
        'genreID'=> 'required',
        'gameImage'=> 'required',
        'gameRating'=> 'required',
        'gameDescription'=> 'required',
        'gamePrice' => 'required'
        ];

        $validator = Validator::make($request->all(), $data);
        if($validator->fails()){
             return back()->withErrors($validator);
         }

         $file = $request->file('gameImage');
         $image = time().'.'.$file->getClientOriginalExtension();

         Storage::putFileAs('public/game',$file,$image);

         $game = Game::create(request(['gameTitle','genreID','gameImage','gameRating','gameDescription','gamePrice']));

         $game->gameImage = 'game/'.$image;

         $game->save();
         return redirect('/');

    }

    public function deleteGame($id){
        $games = Game::find($id);
        if($games!=null){
            Storage::delete('public/'.$games->gameImage);
            $games->delete();
        }
        return redirect(url()->previous());
    }

    public function updateGame(Request $request, $id){
        $data = [
            'gameTitle'=> 'required',
            'genreID'=> 'required',
            'gameImage'=> 'required',
            'gameRating'=> 'required',
            'gameDescription'=> 'required',
            'gamePrice' => 'required'
        ];

        $validator = Validator::make($request->all(), $data);
        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $games = Game::find($id);
        if($games!=null){
            $games->gameTitle = $request->gameTitle;
            $games->gameDescription = $request->gameDescription;
            $games->genreID = $request->genreID;
            $games->gameTitle = $request->gameTitle;
            $games->gameRating = $request->gameRating;

            if($request->file('gameImage')){
                $file = $request->file('gameImage');
                $image = time().'.'.$file->getClientOriginalExtension();
                Storage::putFileAs('public/game',$file,$image);
                Storage::delete('public/'.$games->gameImage);
                $games->gameImage = 'game/'.$image;
        }
    }
        $games->save();
        return redirect('/');
    }

}
