<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function list()
    {
        $customers = Customer::all();
       

        return view('internals.customers',[
            'customers'=>$customers,
        ]);
    }

    //
    public function store(){
        //get name from input-form

        $data = request()->validate([
            'name' =>'required|min:3',  //we need minimum 3 character name
            'email' =>'required|email'  //we need need email and also a valid email
        ]);

        $customer = new Customer(); // create a object of customer database
        $customer->name = request('name'); // add customer name to databse
        $customer->email = request('email'); // add email to databse
        $customer->save(); //save to database

        return back(); //back to the previous function
       
    }
}
