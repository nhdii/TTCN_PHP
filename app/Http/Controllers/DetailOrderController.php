<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Order;
use App\Http\Requests\DetailOrder\StoreDetailOrderRequest;
use App\Http\Requests\DetailOrder\UpdateDetailOrderRequest;

class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetailOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        $detail_orders = DetailOrder::where('order_id', $order_id)->get(); // Use get() to retrieve multiple records

        if ($order) {
            return view('admin.orders.detail', ['order' => $order, 'detail_orders' => $detail_orders]);
        } else {
            return redirect()->route('detail_orders.index')->with('error', 'Order not exists');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailOrderRequest $request, DetailOrder $detailOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailOrder $detailOrder)
    {
        //
    }
}
