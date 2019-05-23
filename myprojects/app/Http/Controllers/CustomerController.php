<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function list()
    {
        $customers =[
            'Jhon Doe',
            'Bob The Builder',
            'Mazharul Islam Leon',
            'Another Name ',
        ];
        return view('internals.customers',[
            'customers'=>$customers,
        ]);
    }
}
