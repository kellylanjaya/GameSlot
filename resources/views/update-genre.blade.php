@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container">
    <h2 class="font-weight-bold mt-4 mb-4">Update Game</h2>
    <form action="/UpdateGenre/update/{{$id}}" method="post">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="gameGenre" class="col-sm-2 col-form-label">Game Genre</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="">
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
