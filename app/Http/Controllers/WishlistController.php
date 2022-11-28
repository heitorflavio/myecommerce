<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;

class WishlistController extends Controller
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
        $cart = Wishlist::where('customer_id', $customer_id)->where('product_id', $product_id)->where('status', 1)->get();
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
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request)
    {
        //
        $check = $this->check($request->product_id, $request->customer_id);
        if($check){
            $cart = Wishlist::find($check);
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
            return $cart;
        }else{
            $cart = Wishlist::create($request->all());
            return $cart;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist, StoreWishlistRequest $request)
    {
        //
        $cart = Wishlist::where('customer_id', $request->customer_id)->where('status', 1)->get();
        return $cart;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $wish = Wishlist::where('id', $id)->update(['status' => 0]);
        return $wish;
    }
}
