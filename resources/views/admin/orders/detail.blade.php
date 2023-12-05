@extends('layouts.master')

@section('content')
    <div class="container mx-auto my-8">
        <h2 class="text-2xl font-semibold mb-4">Create New Order</h2>

        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-4 mb-4 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="customer_id" class="block text-gray-700 text-sm font-bold mb-2">Customer ID:</label>
                <input type="text" name="customer_id" id="customer_id" class="border rounded w-full py-2 px-3" value="{{ old('customer_id') }}" required>
            </div>

            <div class="mb-4">
                <label for="order_date" class="block text-gray-700 text-sm font-bold mb-2">Order Date:</label>
                <input type="date" name="order_date" id="order_date" class="border rounded w-full py-2 px-3" value="{{ old('order_date') }}" required>
            </div>

            <div class="mb-4">
                <label for="delivery_date" class="block text-gray-700 text-sm font-bold mb-2">Delivery Date:</label>
                <input type="date" name="delivery_date" id="delivery_date" class="border rounded w-full py-2 px-3" value="{{ old('delivery_date') }}" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <input type="text" name="status" id="status" class="border rounded w-full py-2 px-3" value="{{ old('status') }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Order</button>
        </form>
    </div>
@endsection
