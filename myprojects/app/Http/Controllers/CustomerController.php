<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index()
    {
        // $activeCustomers = Customer::active()->get(); //get active customers form database by checking their active column
        // $inactiveCustomers = Customer::inactive()->get();
       
        $customers = Customer::all();

       return view('customers.index', compact('customers')); //another option of passing data to view
       

        // return view('internals.customers',[
        //     'activeCustomers'=>$activeCustomer,//send Active customers details to view
        //     'inactiveCustomers' => $inactiveCustomer, //send inActive customers details to view
        // ]);
    }

    //create function
    public function create()
    {
        $companies = Company::all();
        return view('customers.create',compact('companies'));
    }

    //
    public function store(){
        //get name from input-form

        $data = request()->validate([
            'name' =>'required|min:3',  //we need minimum 3 character name
            'email' =>'required|email', //we need need email and also a valid email
            'active' =>'required',
            'company_id'=>'required',
        ]);

        // to more secure we need to verify all data comes from input form
        // if any user add a html input form and send data , it will be harmful for databse
        // thats why we need to validate every data comes from User input form 
        // before insert that data to our database 


       // $customer = Customer::create($data);

        //$customer = new Customer(); // create a object of customer database
        // $customer->name = request('name'); // add customer name to databse
        // $customer->email = request('email'); // add email to databse
        // $customer->active = request('active'); // geta ctive status value from input form 
        // $customer->save(); //save to database

        //mass assignments can be happen
        Customer::create($data); 


        return redirect('customers'); //back to the previous function
       
    }

    //show funtion  this $customer name need to ewual with url variable
    public function show(Customer $customer) //Route model Binding. laravel fetch automaticallu if not found then show 404 not found 
    {
       //dd($customer);
       //$customer = Customer::find($customer); //collect data from Customer model with the help of cutomerID
       //if invalid input given so  to this avoid we use
    //   $customer = Customer::where('id', $customer)->firstOrFail(); 

       return view('customers.show', compact('customer'));

    }

    //edit
    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer','companies'));
    }
    //update
    public function update(Customer $customer)
    {
        $data = request()->validate([
            'name' =>'required|min:3',  //we need minimum 3 character name
            'email' =>'required|email', //we need need email and also a valid email
        ]);

        $customer->update($data);

        return redirect('customers/'. $customer->id);
    }
}
