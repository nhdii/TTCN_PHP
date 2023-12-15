@extends('layouts.master')
@section('content')
<a href="{{ route('orders.index') }}">
    <button class="bg-white border border-white p-2 rounded shadow-md text-gray-700 flex items-center focus:outline-none focus:shadow-outline">
        <svg width="24" height="24" viewBox="0 0 16 16">
            <path d="M9 4 L5 8 L9 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path>
        </svg>
        <span class="mx-2">Back</span>
    </button>
</a>
<div class="p-8">
    <div class="bg-white overflow-hidden shadow rounded-lg border">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Order Details
            </h3>
            <p class="mt-1 max-w-2xl text-xss text-gray-500">
                Details about the order_date:
            </p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Image
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="relative">
                            <img class="w-[100px] bg-contain" src="/storage/images/product-images/{{ $detail_order->getProduct->product_id }}/{{ $detail_order->getProduct->image }}" alt="profile">
                        </div>
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Order ID
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$order->order_id }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Product ID
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$detail_order->getProduct->product_name }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Customer ID
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$order->getCustomerName->fullName }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Order Date
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$order->order_date }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Order Delivery
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$order->delivery_date }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Status
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$order->status }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Quantity
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$detail_order->quantity }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Total Price
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$detail_order->price }}
                    </dd>
                    <dt class="text-xss font-medium text-gray-500">
                        Notes
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{$detail_order->notes }}
                    </dd>
                </div>
                <!-- Add more information as needed -->
            </dl>
        </div>
    </div>
</div>
@endsection
