<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function list()
    {
        $activeCustomers = Customer::where('active',1)->get(); //get active customers form database by checking their active column
        $inactiveCustomers = Customer::where('active',0)->get();

       // $customers = Customer::all();

       return view('internals.customers', compact('activeCustomers','inactiveCustomers')); //another option of passing data to view
       

        // return view('internals.customers',[
        //     'activeCustomers'=>$activeCustomer,//send Active customers details to view
        //     'inactiveCustomers' => $inactiveCustomer, //send inActive customers details to view
        // ]);
    }

    //
    public function store(){
        //get name from input-form

        $data = request()->validate([
            'name' =>'required|min:3',  //we need minimum 3 character name
            'email' =>'required|email', //we need need email and also a valid email
            'active' =>'required'
        ]);

        $customer = new Customer(); // create a object of customer database
        $customer->name = request('name'); // add customer name to databse
        $customer->email = request('email'); // add email to databse
        $customer->active = request('active'); // geta ctive status value from input form 
        $customer->save(); //save to database

        return back(); //back to the previous function
       
    }
}
