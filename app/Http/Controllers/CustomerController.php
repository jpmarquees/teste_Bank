<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

use App\Customer;
use App\Sale;



class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }


    public function edit ($customerId) {
        $customer = Customer::findOrFail($customerId);

        return view('customer.edit', compact('customer'));
    }

    public function get()
    {
        $customers = Customer::all();

        return $customers;
    }

    public function post(CustomerRequest $request)
    {
        $customer = Customer::create([
            'name' => $request->input('name'),
            'document' => $request->input('document'),
        ]);

        return redirect()->route('customers');
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        return redirect()->route('customers');
    }

    public function delete (Customer $customer){
        if(Sale::where('customer_id', $customer->id)->get()->isEmpty()){
            $customer->delete();
        } else {
            throw new \Exception('É impossível excluir esse consumidor pois ele está ligado a uma venda.');
        }


        return redirect()->route('customers');
    }

}
