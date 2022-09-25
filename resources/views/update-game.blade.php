@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container">
    <h2 class="font-weight-bold mt-4 mb-4">Update Game</h2>

    <form action="/updateGame/{{$id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Game Title -->
        <div class="form-group row">
            <label for="gameTitle" class="col-sm-2 col-form-label">Game Title</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="">
            </div>
        </div>

        <!-- Photo -->
        <div class="form-group row">
            <label for="gamePhoto" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="">
                <input type="file" class="form-control-file mt-3" id="exampleFormControlFile1">
            </div>
        </div>

        <!-- Game Description -->
        <div class="form-group row">
            <label for="gameDescription" class="col-sm-2 col-form-label">Game Description</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="">
            </div>
        </div>

        <!-- Game Price -->
        <div class="form-group row">
            <label for="gamePrice" class="col-sm-2 col-form-label">Game Price</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="">
            </div>
        </div>

        <!-- Game Genre -->
        <div class="form-group row">
            <label for="gameGenre" class="col-sm-2 col-form-label">Game Genre</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control">
                    <option value="" hidden>Select Genre</option>
                    @foreach ($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->genreTitle}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- New Game Genre -->
        <div class="form-group row">
            <label for="newGameGenre" class="col-sm-2 col-form-label">New Game Genre</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="">
            </div>
        </div>

        <!-- PEGI Rating -->
        <div class="form-group row">
            <label for="pegiRating" class="col-sm-2 col-form-label">PEGI Rating</label>
            <div class="col-sm-10">
                <select id="inputState" class="form-control">
                    <option value="" hidden>Select PEGI Rating</option>
                    <option value="0">0</option>
                    </option>
                    <option value="3">3</option>
                    </option>
                    <option value="7">7</option>
                    </option>
                    <option value="12">12</option>
                    </option>
                    <option value="16">16</option>
                    </option>
                    <option value="18">18</option>
                    </option>
                </select>
            </div>
        </div>

        <div class="text-right mt-4">
            <button type="button" class="btn btn-primary">Update</button>
        </div>
    </form>

    <div class="alert" role="alert" style="outline: none">
        @if ($errors->any())
        <i class="text-danger mt-1">{{$errors->first()}}</i>
        @endif
    </div>
</div>

@endsection
