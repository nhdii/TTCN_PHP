@extends('layouts.master')
@section('content')
    <a href="{{ route('products.index') }}">
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
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Product Details
            </h3>
            <p class="mt-1 max-w-2xl text-xss text-gray-500">
                Details about the product:
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
                            <img class="w-[100px] bg-contain" src="/storage/images/product-images/{{ $product->product_id }}/{{ $product->image }}" alt="profile">
                        </div>
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Product Name
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->product_name }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Category
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->getCategoryName->category_name }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Brand
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->getBrand->brand_name }}
                    </dd>
                </div>
                {{-- <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Size
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->size }}
                    </dd>
                </div> --}}
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Gender
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->gender }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Quantity Stock
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->default_stock_quantity }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Price
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->default_price }}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xss font-medium text-gray-500">
                        Description 
                    </dt>
                    <dd class="mt-1 text-xss text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $product->desciption }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
