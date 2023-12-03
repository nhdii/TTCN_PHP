@extends('layouts.master')

@section('content')
    @include('layouts.notifySuccess')
    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Orders</h2>
        
        <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Create New Order</a>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Order ID</th>
                    <th class="py-2 px-4 border-b">Customer ID</th>
                    <th class="py-2 px-4 border-b">Order Date</th>
                    <th class="py-2 px-4 border-b">Delivery Date</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $order->order_id }}</td>
                        <td class="py-2 px-4 border-b">{{ $order->customer_id }}</td>
                        <td class="py-2 px-4 border-b">{{ $order->order_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $order->delivery_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $order->status }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('orders.show', $order->order_id) }}" class="text-blue-500">View</a>
                            <a href="{{ route('orders.edit', $order->order_id) }}" class="text-yellow-500">Edit</a>
                            <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 px-4 border-b text-center">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
