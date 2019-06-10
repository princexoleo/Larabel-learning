@extends('layout')

@section('title')
    Customers List
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
                <h1>Customers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
                <form action="customers" method="POST">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="enter your name "  value="{{ old('name') }} " class="form-control">
                            <div> {{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group">  
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="enter your email"value="{{ old('email') }} " class="form-control">
                            <div> {{ $errors->first('email') }}</div>
                        </div>
                
                        <button type="submit" class="btn btn-primary">Add Customer</button>
                
                        @csrf
                    </form>
        </div>
    </div>

   
     <hr>
 
     <div class="row">
         <div class="col-12">    
            <ui>
                @foreach ($customers as $customer) <!-- blade syntax -->
                <li>{{ $customer->name }} <span class="text-muted">({{ $customer->email }})</span></li>
                @endforeach
            </ui>
         </div>
     </div>

@endsection