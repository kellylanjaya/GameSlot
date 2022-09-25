@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container mt-4 mb-4">
    <a href="/toAddGame">
        <button class="btn btn-primary justify-content-right mt-4 mb-4" type="submit">
            Add Game
        </button>
    </a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">GAME TITLE</th>
                <th scope="col">PEGI RATING</th>
                <th scope="col">GAME GENRE</th>
                <th scope="col">GAME PRICE</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @for ($i = 0; $i < count($games); $i++) <tr>
                <td>
                    <img src="{{Storage::url($games[$i]->gameImage)}}" alt="" style="height: 50px; width:50px; border-radius:100px;">
                    {{$games[$i]->gameTitle}}
                </td>

                <td>
                    {{$games[$i]->gameRating}}
                </td>

                <td>
                  {{$games[$i]->genres->genreTitle}}
                </td>

                <td>
                  Rp {{$games[$i]->gamePrice}}
                </td>
                
                <td>
                    <a href="/toUpdateGame/{{$games[$i]->id}}"><button class="update">Edit</button></a>
                </td>

                <td> 
                    <a href="/deleteGame/{{$games[$i]->id}}"><button class="delete">Delete</button></a>
                </td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>

@endsection
