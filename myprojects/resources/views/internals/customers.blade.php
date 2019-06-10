@extends('layout')

@section('title')
    Customers List
@endsection

@section('content')

    <h1>Customers Page</h1>

    <form action="customers" method="POST" class="pb-5">
        <div class="input-group">
            <input type="text" name="name">
        </div>
        <button type="submit">Add Customer</button>

        @csrf
    </form>

    <ui>
        @foreach ($customers as $customer) <!-- blade syntax -->
        <li>{{ $customer->name }}</li>
        @endforeach
    </ui>
@endsection