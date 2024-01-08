<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; 
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $searchColumns = [
            'status' => 'like',
            'order_date' => 'like',
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

        $query->orderBy('order_date', 'desc');

        $data = $query->paginate(10);

        $startIndex = ($data->currentPage() - 1) * $data->perPage() + 1;

        return view('admin.orders.index' , [
            'orders' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
            'startIndex' => $startIndex,  // Pass the starting index to the view
        ]);
    }

    public function approve(Order $order)
    {
        if ($order->status === Order::STATUS_PENDING && $order->delivery_date !== null) {
            $order->status = Order::STATUS_APPROVED;
            $order->save();

            $customer = Customer::find($order->customer_id);

            $this->sendOrderConfirmationEmail($order, $customer);
    
            return redirect()->route('orders.index')->with('success', 'Order Approved Successfully!');
        }
    
        return redirect()->route('orders.index')->with('error', 'Unable to approve order. Ensure delivery date is set!');
    }

    public function updateDeliveryDate(Request $request, Order $order)
    {
        $request->validate([
            'delivery_date' => [
                'required',
                'date',
                'after:' . $order->order_date,            
            ],
        ], [
            'delivery_date.after' => 'Delivery Date must be after Order Date.',
        ]);

    
        $order->delivery_date = $request->input('delivery_date');
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Delivery Date updated successfully!');
    }

    private function sendOrderConfirmationEmail(Order $order, Customer $customer)
    {
        $email_user = $customer->email;
        $name_user = $customer->fullName;
        
        Mail::send('emails.order_confirmation', compact('order', 'customer', 'email_user', 'name_user'), function ($email) use ($email_user, $name_user) {
            $email->subject('Order Confirmation');
            $email->to($email_user, $name_user);
        });
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
