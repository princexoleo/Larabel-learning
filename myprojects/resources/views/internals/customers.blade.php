@extends('layout')

@section('title')
    Customers List
@endsection

@section('content')

    <h1>Customers Page</h1>

    <form action="customers" method="POST" class="pb-5">
        <div class="input-group pb-2">
            <input type="text" name="name" placeholder="enter your name "  value="{{ old('name') }} ">
            <div> {{ $errors->first('name') }}</div>
        </div>
        <div class="input-group">  
            <input type="email" name="email" placeholder="enter your email"value="{{ old('email') }} ">
            <div> {{ $errors->first('email') }}</div>
        </div>

        <button type="submit">Add Customer</button>

        @csrf
    </form>

 

    <ui>
        @foreach ($customers as $customer) <!-- blade syntax -->
        <li>{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
       
        @endforeach
    </ui>
@endsection