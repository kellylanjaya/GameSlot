@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>


<div class="container">
    <h2 class="font-weight-bold mt-4 mb-4">Add Category</h2>
    <form action="/addGenre" method="post">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="genreTitle" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="">
            </div>
        </div>

        <div class="text-right mt-4">
            <button type="button" class="btn btn-primary">Add</button>
        </div>
    </form>

    <div class="alert" role="alert" style="outline: none">
        @if ($errors->any())
        <i class="text-danger mt-1">{{$errors->first()}}</i>
        @endif
    </div>
</div>

@endsection
