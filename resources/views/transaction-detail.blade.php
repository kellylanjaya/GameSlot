@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <p style="font-size:18px;">Transaction ID : {{$header->transactionID}}</p>
        </div>
        <div class="col-3">
            <p style="font-size:18px;">Transaction Date : {{$header->transactionDate}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p style="font-size:18px;">Customer : {{auth()->User()->name}}</p>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">GAME TITLE</th>
                <th scope="col">GAME PRICE</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">SUB TOTAL</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($header->detail as $detail)
            <tr>
                <td>
                    {{$detail->name}}
                </td>

                <td>
                    {{$detail->price}}
                </td>

                <td>
                    {{$detail->quantity}}
                </td>

                <td>
                    {{$detail->subTotal}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col text-right">
            <p style="font-size:18px; font-weight:bold;">Total : {{$total_price = $details->sum("subTotal")}}</p>
        </div>
    </div>
</div>

@endsection
