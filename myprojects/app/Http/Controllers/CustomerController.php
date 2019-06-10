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
            'name' =>'required|min:3'  //we need minimum 3 character name
        ]);

        $customer = new Customer();
        $customer->name = request('name');
        $customer->save();

        return back();
       
    }
}
