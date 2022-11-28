<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
       
    }
    public function  me(Customer $customer,StoreCustomerRequest $request){
        // print_r($request->bearerToken());
        $customer = Customer::where('token', $request->token)->get();
        try{
            if($customer[0]->id){
                return $customer[0];
            }
        }catch(\Exception $e){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    public function login(UpdateCustomerRequest $request,Customer $customer)
    {
        //
        $customer = Customer::where('email', $request->email)->where('password', $request->password)->first();
        if ($customer) {
            $email = bcrypt($customer->email);
            $name = bcrypt($customer->name);
            $date = bcrypt(date('Y-m-d'));
            $token = $email . $name . $date;
            // $token = $email . $name;
            // $customer->where('email', $request->email)->where('password', $request->password)->update(['token' => $token]);
            $customer->update(['token' => $token]);
            return response()->json(['token' => $token], 200);

            // return response()->json($token, 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        $customer = Customer::create($request->all());
        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $customer->update($request->all());
        return response()->json($customer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
