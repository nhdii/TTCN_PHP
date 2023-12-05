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
    <div class="w-2/4 mx-auto pt-2">
        <div class="rounded-sm border border-stroke bg-white shadow-default p-4">
            <div class="border-b border-stroke py-4 px-6.5">
                <h3 class="font-semibold text-black" style="font-size: 24px;">Create New Product</h3>
            </div>
            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Product Name <span class="text-meta-1">*</span>
                        </label>
                        <input name="product_name" value="{{ old('product_name') }}" type="text" placeholder="Enter Product" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                        @if($errors->has('product_name'))
                            <span class="text-red-500">{{ $errors->first('product_name') }}</span>
                        @endif
                    </div>
                    <div class="w-full xl:w-1/2">
                        <label class="mb-2.5 block text-black font-bold">
                            Image
                        </label>
                        <div>
                            <input name="image" type="file" class="w-full cursor-pointer rounded-lg border-[1.5px] border-stroke bg-transparent font-medium outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-stroke file:bg-whiter file:py-3 file:px-5 file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @if($errors->has('image'))
                                <span class="text-red-500">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="w-full xl:w-1/2">
                        <label class="mb-2.5 block text-black font-bold">
                            Gender
                        </label>
                        <div class="relative z-20 bg-transparent">
                            <select name="gender" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary">
                                <option value="Men" @if(old('gender') == 'Men') selected @endif>Men</option>
                                <option value="Women" @if(old('gender') == 'Women') selected @endif>Women</option>
                                <option value="Kid" @if(old('gender') == 'Kid') selected @endif>Kid</option>
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.8">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                                </g>
                                </svg>
                            </span>
                        </div>
                        @if($errors->has('gender'))
                            <span class="text-red-500">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>

                    <div class="w-full xl:w-1/2">
                        <label class="mb-2.5 block text-black font-bold">
                            Size
                        </label>
                        <div class="relative z-20 bg-transparent">
                            <select name="size" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary">
                                @foreach($sizes as $size)
                                    <option value="{{ $size }}" @if(old('size') == $size) selected @endif>{{ $size }}</option>
                                @endforeach
                            </select>
                            <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.8">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                                    </g>
                                </svg>
                            </span>
                        </div>
                        @if($errors->has('size'))
                            <span class="text-red-500">{{ $errors->first('size') }}</span>
                        @endif
                    </div>

                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Price
                        </label>
                        <input name="default_price" value="{{ old('default_price') }}" type="text" placeholder="Enter Price" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">{{ old('default_price') }}</input>
                        @if($errors->has('default_price'))
                            <span class="text-red-500">{{ $errors->first('default_price') }}</span>
                        @endif
                    </div>
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Stock Quantity
                        </label>
                        <input name="default_stock_quantity" value="{{ old('default_stock_quantity') }}" type="number" placeholder="Enter Stock quantity" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                        @if($errors->has('default_stock_quantity'))
                            <span class="text-red-500">{{ $errors->first('default_stock_quantity') }}</span>
                        @endif
                    </div>
                    <div class="mb-5 relative z-20 bg-transparent">
                        <label class="mb-2.5 block text-black font-bold">
                            Brand
                        </label>
                        <select name="brand_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary">
                            @foreach($brands as $br)
                                <option value="{{ $br->brand_id }}" @if(old('brand_id') == $br->brand_id) selected @endif>{{ $br->brand_name }}</option>
                            @endforeach
                        </select>
                        <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.8">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                            </g>
                            </svg>
                        </span>
                    </div>

                    <div class="mb-5 relative z-20 bg-transparent">
                        <label class="mb-2.5 block text-black font-bold">
                            Category
                        </label>
                        <select name="category_id" class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary">
                            @foreach($categories as $ct)
                                <option value="{{ $ct->category_id }}" @if(old('category_id') == $ct->category_id) selected @endif>{{ $ct->category_name }}</option>
                            @endforeach
                        </select>
                        <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.8">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z" fill=""></path>
                            </g>
                            </svg>
                        </span>
                    </div>
                    <div class="mb-5">
                        <label class="mb-2.5 block text-black font-bold">
                            Desciption
                        </label>
                        <textarea name="desciption" rows="2" placeholder="Enter Desciption" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">{{ old('desciption') }}</textarea>
                        @if($errors->has('desciption'))
                            <span class="text-red-500">{{ $errors->first('desciption') }}</span>
                        @endif
                    </div>

                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white transition duration-300 hover:bg-[#0B5ED7]">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection