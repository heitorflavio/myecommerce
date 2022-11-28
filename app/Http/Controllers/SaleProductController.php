<?php

namespace App\Http\Controllers;

use App\Models\SaleProduct;
use App\Http\Requests\StoreSaleProductRequest;
use App\Http\Requests\UpdateSaleProductRequest;

class SaleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $SaleProduct = SaleProduct::all();
        return $SaleProduct;
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
     * @param  \App\Http\Requests\StoreSaleProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleProductRequest $request)
    {
        //
        $SaleProduct = SaleProduct::create($request->all());
        return $SaleProduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SaleProduct $saleProduct)
    {
        //
        $SaleProduct = SaleProduct::find($saleProduct);
        return $SaleProduct;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleProductRequest  $request
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleProductRequest $request, SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleProduct $saleProduct)
    {
        //
    }
}
