@extends('layouts.app')
@section('guest-content')

<style>
    body {
        background-color: #f9fafb;
    }
</style>

<div class="container mt-4">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">TRANSACTION ID</th>
                <th scope="col">TRANSACTION DATE</th>
                <th scope="col">TOTAL ITEM</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($header as $header)
                <tr>
                    <td>
                        {{$header->transactionID}}
                    </td>

                    <td>
                        {{$header->transactionID}}
                    </td>

                    <td>
                        {{$header->totalItem}}
                    </td>

                    <td>
                        <a href="/toTransactionDetail/{{$header->transactionID}}">Details</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
