<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $searchColumns = [
            'order_id' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = Order::query();

        if (array_key_exists($column, $searchColumns)) {
            $operator = $searchColumns[$column];
            if (!empty($keywords)) {
                if ($operator === 'like') {
                    $keywords = '%' . $keywords . '%';
                }
                $query->where($column, $operator, $keywords);
            }
        }
        $data = $query->paginate(5);
        return view('admin.orders.index' , [
            'orders' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        $result = Order::query()->create($data);
        if ($result) {
            return redirect()->route('orders.index')->with('success', 'Order Created Successfull!');
        }
        return redirect()->route('orders.index')->with('error', 'Create Error!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->fill($request->validated());

        if ($order->save()) {
            return redirect()->route('orders.index')->with('success', 'Order Edited Successful!');
        }
        return redirect()->route('orders.index')->with('error', 'Edit Error!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order_id)
    {
        $result = Order::query()->where('order_id', $order_id)->delete();
        if ($result) {
            return redirect()->route('orders.index')->with('success', 'Order deleted Successfull!');
        }
        return redirect()->route('orders.index')->with('error', 'Deleted Error!');
    }
}
