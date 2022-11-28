<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
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
    * It checks if the product is already in the cart.
    * 
    * @param product_id The id of the product you want to add to the cart
    * @param customer_id The id of the customer
    * 
    * @return The id of the cart item if it exists, otherwise false.
    */
    public function check($product_id, $customer_id){
        $cart = Cart::where('customer_id', $customer_id)->where('product_id', $product_id)->where('status', 1)->get();
       try{
        if($cart[0]->id){
            return $cart[0]->id;
        }
         }catch(\Exception $e){
              return false;
         }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        $check = $this->check($request->product_id, $request->customer_id);
        if($check){
            $cart = Cart::find($check);
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
            return $cart;
        }else{
            $cart = Cart::create($request->all());
            return $cart;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart, StoreCartRequest $request)
    {
        //
        $cart = Cart::where('customer_id', $request->customer_id)->where('status', 1)->get();
        return $cart;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
        $cart->find($cart->id)->update($request->all());
        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
         
        $cart = Cart::where('id', $cart->id)->update(['status' => 0]);
        return $cart;
    }
}
