@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container">
    <a href="/toAddGenre">
        <button class="btn btn-primary mt-4 mb-4" type="submit">
            Add genre
        </button>
    </a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">GAME GENRE</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @for ($i = 0; $i < count($genres); $i++) <tr>
                <td>
                    {{$genres[$i]->genreTitle}}
                </td>

                <td>
                    <a href="/UpdateGenre/{{$genres[$i]->id}}">
                        <button class="update">Edit</button>
                    </a>
                </td>

                </tr>
                @endfor
        </tbody>
    </table>
</div>

@endsection
