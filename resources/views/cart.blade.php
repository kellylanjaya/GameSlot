@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }

</style>

<div class="container">
    <div class="row">
        <div class="col mb-4 text-end ">
            <a href="/checkOut"><button type="submit" class="btn btn-primary">Checkout</button></a>
        </div>
    </div>

    <div class="shadow-sm p-0 mb-4 bg-white rounded">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">GAME TITLE</th>
                    <th scope="col">GAME PRICE</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cart as $cart)
                <tr>
                    <td>
                        <img src="{{Storage::url($cart->games->gameImage)}}" class=" rounded-circle mx-auto"
                            style="height: 50px; width: 50px;" alt="">
                        {{$cart->games->gameTitle}}
                    </td>
                    <td class="align-middle">{{$cart->games->gamePrice}}</td>

                    <form action="/updateQuantity/{{$cart->id}}" method="POST">
                        @csrf
                        <td class="align-middle"><input type="number" name="quantity" value="{{ $cart->quantity }}">
                        </td>
                        <td>
                            <button class="btn nav-link active">
                                <h6>Update</h6>
                            </button>
                    </form>
                    </td>

                    <td>
                        <a href="/deleteCart/{{$cart->id}}"><button class="btn btn-outline-danger">Remove</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
