@extends('layout')

@section('title')
    Customers List
@endsection

@section('content')

    <h1>Customers Page</h1>
    <ui>
        @foreach ($customers as $customer) <!-- blade syntax -->
        <li>{{ $customer->name }}</li>
        @endforeach
    </ui>
@endsection