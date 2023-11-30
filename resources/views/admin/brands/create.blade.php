@extends('layouts.master')
@section('content')
    <a href="{{ route('brands.index') }}">
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
                <h2 class="font-semibold text-black" style="font-size: 24px;">
                    Create Brand
                </h2>
            </div>
            <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="p-6.5">
                    <div class="mb-6 flex flex-col gap-6 xl:flex-row">
                        <div class="w-full xl:w-1/2">
                            <label class="mb-2.5 block text-black font-bold">
                                Brand Name <span class="text-meta-1">*</span>
                            </label>
                            <input name="brand_name" value="{{ old('brand_name') }}" type="text" placeholder="Brand Name" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            @if($errors->has('brand_name'))
                                <span class="text-red-500">{{ $errors->first('brand_name') }}</span>
                            @endif
                        </div>

                    </div>
          
                    <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-white transition duration-300 hover:bg-[#0B5ED7]">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
