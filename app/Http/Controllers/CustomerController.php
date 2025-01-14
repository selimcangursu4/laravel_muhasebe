<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function fetch(Request $request)
    {
        $customers = CustomerModel::query();

        if($request->input('search_customer_id'))
        {
            $customers->where('id','=',$request->input('search_customer_id'));
        }
        if($request->input('search_customer_fullname'))
        {
            $customers->where('fullname','=',$request->input('search_customer_fullname'));
        }
    }
}
