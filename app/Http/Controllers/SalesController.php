<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $Sale = Sales::all();
            return $Sale;
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
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        //
      
        // $Sale = Sales::create($request->all());
        $cart = DB::table('carts')->where('customer_id', $request->customer_id)->where('status', 1)->get();
        $Sales = Sales::create($request->all());

        foreach ($cart as $key => $value) {
            # code...
            $total = $value->price * $value->quantity;
            $Sale = DB::table('sale_products')->insert([
                'sale_id' => $Sales->id,
                'product_id' => $value->product_id,
                'product_price' => $value->price,
                'product_total' => $total,
                'product_quantity' => $value->quantity,
                'product_sku'=> $value->sku,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $product = DB::table('produtos')->find($value->product_id);
            $new_quantity = $product->stock - $value->quantity;
            $update = DB::table('produtos')->where('id', $value->product_id)->update([
                'stock' => $new_quantity
            ]);
          
          
        }
        $cart = DB::table('carts')->where('customer_id', $request->customer_id)->update(['status' => 2]);
       
        return $Sale;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
        $Sale = Sales::find($sales);
        return $Sale;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, Sales $sales)
    {
        //
        $Sale = Sales::find($sales);
        $Sale->update($request->all());
        return $Sale;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
