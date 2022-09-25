<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller{
    public function deleteGenre($id){
        $genres = Genre::find($id);
        if($genres!=null){
            $genres->delete();
        }
        return redirect(url()->previous());
    }

    public function addGenre(Request $request){
        $data = [
            'genreTitle' => 'required'
        ];

        $validator = Validator::make($request->all(), $data);
        if($validator->fails()){
             return back()->withErrors($validator);
         }

        $genre = Genre::create(request(['genreTitle']));
        $genre->save();
        return redirect('/ManageGenre');
    }

    public function UpdateGenre(Request $request, $id){
        $data = [
            'genreTitle' => 'required'
        ];

        $validator = Validator::make($request->all(), $data);
        if($validator->fails()){
             return back()->withErrors($validator);
         }

        $genre = Genre::find($id);
        if($genre!=null){
            $genre->genreTitle = $request->genreTitle;
        }
        $genre->save();
        return redirect('/ManageGenre');
    }
}
