@extends('layouts.master')
@section('content')
@php
    $totalBrand = \App\Models\Brand::count();
    $totalProduct = \App\Models\Product::count();
    $totalCustomer = \App\Models\Customer::count();
    $totalOrder = \App\Models\Order::count();
@endphp
<div class="container px-6 py-2 mx-auto">
    <div class="container px-6 py-8 mx-auto">
        <h3 class="text-3xl font-medium text-gray-700">THÔNG TIN NHANH</h3>
        <div class="mt-4 flex flex-wrap -mx-6">
            <!-- Hiển thị số liệu cho Brands -->
            <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                <a href="{{ route('brands.index')}}">
                <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                    <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full my-4">
                        <i class="fas fa-heart text-white"></i>
                    </div>

                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $totalBrand }}</h4>
                        <div class="text-gray-500"><b>BRANDS</b></div>
                    </div>
                </div>
                </a>
            </div>
            <!-- Hiển thị số liệu cho User -->
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="{{ route('customers.index')}}">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full my-4">
                            <i class="fas fa-user text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalCustomer }}</h4>
                            <div class="text-gray-500"><b>CUSTOMERS</b></div>
                        </div>
                    </div>
                    </a>
                </div>
            <!-- Hiển thị số liệu cho Product -->
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="{{ route('products.index')}}">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full my-4">
                            <i class="fas fa-star text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalProduct }}</h4>
                            <div class="text-gray-500"><b>PRODUCTS</b></div>
                        </div>
                    </div>
                    </a>
                </div>
            <!-- Hiển thị số liệu cho Order -->
                <div class="w-full sm:w-1/2 xl:w-1/4 px-2 mb-6">
                    <a href="{{ route('orders.index')}}">
                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-md">
                        <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full my-4">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>

                        <div class="mx-5">
                            <h4 class="text-2xl font-semibold text-gray-700">{{ $totalOrder }}</h4>
                            <div class="text-gray-500"><b>ORDERS</b></div>
                        </div>
                    </div>
                    </a>
                </div>
                
        </div>
    </div>
</div>
@endsection
