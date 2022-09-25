@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container pb-6 mb-5 mt-5">
    <div class="p-5 mb-5 rounded-5 shadow" style="background-color:#FFFFFF;">
        <div class="container-fluid py-5">
            <div class="row justify-content-center">
                <img src="{{Storage::url($games->gameImage)}}" alt="" class="img-fluid"
                    style="height: 300px; width: 300px">
                <div class="col-md-7 ml-4">
                    <h1 class="display-5 fw-bold mb-3">{{$games->gameTitle}}</h1>
                    <p class="badge bg-success">{{$games->genres->genreTitle}}</p>
                    <p class="badge bg-success">{{$games->gameRating}}+</p>
                    <p class="fs-4 text-justify">{{$games->gameDescription}}</p>
                    <p style="font-size:18px;">Price : Rp {{$games->gamePrice}}</p>
                    <form action="/AddCart/{{$games->id}}" method="post">
                        @csrf
                        <button class="btn btn-primary mt-3" type="submit">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
