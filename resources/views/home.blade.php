@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="wrapper">
    <div class="container-lg justify-content-center">
        <div class="row">
            @foreach ($games as $game)
            <div class="card mt-4 mr-2 ml-4" style="width: 12rem;">
                <img src="{{Storage::url($game->gameImage)}}"
                    style="height: 80px; width:80px; border-radius:100px; display:block; margin:0 auto;"
                    class="card-img-top mt-4" alt="">
                <div class="card-body">
                    <h5 class="card-title text-center" style="font-size: 14px">{{$game->gameTitle}}</h5>
                    <a href="/DetailGame/{{$game->id}}"
                        class="btn btn-success d-flex justify-content-center mb-4">{{$game->genres->genreTitle}}</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Rp {{$game->gamePrice}}</li>
                </ul>
            </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item disabled">
                </li>
                {{$games->withQueryString()->links()}}
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection
