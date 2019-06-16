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

                        <div class="form-group">
                            <label for="active">Status</label>
                            <select name="active" id="active" class="form-control">
                                <option value="" disabled>Select customer status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="company_id">Company</label>
                            <select name="company_id" id="company_id" class="form-control">
                                @foreach ($companies as $company)
                                <option value="{{ $company->id}}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <br>
                
                        <button type="submit" class="btn btn-primary">Add Customer</button>
                
                        @csrf
                    </form>
        </div>
    </div>

   
     <hr>
 
     <div class="row">
         <div class="col-6">  
             <h3>Active Customers</h3>  
            <ui>
                @foreach ($activeCustomers as $activeCustomer) <!-- active customer deatils -->
                <li>{{ $activeCustomer->name }} <span class="text-muted">({{ $activeCustomer->company->name }})</span></li>
                @endforeach
            </ui>
         </div>
         <div class="col-6">    
                <h3>Inactive Customers</h3>  
                <ui>
                    @foreach ($inactiveCustomers as $inactiveCustomer) <!-- inactive customers details syntax -->
                    <li>{{ $inactiveCustomer->name }} <span class="text-muted">({{ $inactiveCustomer->company->name }})</span></li>
                    @endforeach
                </ui>
             </div>
     </div>

     <div class="row">
         <div class="col-12">
             @foreach ($companies as $company)
                <h2> {{ $company->name}} </h2>
                <ui>
                    @foreach ($company->customers as $customer)
                    <li> {{ $customer->name}}  </li> 
                    @endforeach
                </ui>  
             @endforeach
         </div>
     </div>
     

@endsection