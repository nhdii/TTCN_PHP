@extends('layouts.master')
@section('content')
@include('layouts.notifySuccess')
@include('layouts.notifyError')
<div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="mb-2 mt-5 flex">
        <div class="ml-4 mr-2">
            <form action="" method="GET" class="flex items-center space-x-4">
                <label for="search_by" class="font-bold">Tìm kiếm theo:</label>
                <select name="search_by" id="search_by" class="p-2 border rounded">
                    <option value="order_date" @if($column == 'order_date') selected @endif>Order Date</option>
                    <option value="status" @if($column == 'status') selected @endif>Status</option>
                </select>
                <input type="text" name="keywords" value="{{ $keywords }}" placeholder="Enter Keyword" class="p-2 border rounded">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out cursor-pointer">
                    Search
                </button>
            </form>
        </div>
        <a href="{{ route('orders.index') }}" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Reset
        </a>  

    </div>
    <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
        <h6 class="font-bold text-xl">ORDER</h6>
    </div>
    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ID</th>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Customer Name</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Order Date</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Delivery Date</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($orders as $index=> $item)
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 ml-4 font-semibold leading-tight text-xss">{{ $startIndex + $index }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 ml-4 font-semibold leading-tight text-xsss">{{ $item->getCustomer->fullName }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-xsss">{{ \Carbon\Carbon::parse($item->order_date)->format('m/d/Y') }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <form action="{{ route('orders.update-delivery-date', $item->order_id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="date" name="delivery_date" value="{{ $item->delivery_date }}" required>
                                <button type="submit" class="font-semibold leading-tight text-xss text-slate-400">
                                </button>
                            </form>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            @if($item->status === \App\Models\Order::STATUS_PENDING)
                                <form action="{{ route('orders.approve', $item->order_id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="font-bold leading-tight text-xss text-slate-400 text-red-500" style="color: red;">
                                        PENDING
                                    </button>
                                </form>
                            @else
                                <p class="mb-0 font-semibold leading-tight text-xsss" style="color: rgb(25, 174, 25);">{{ $item->status }}</p>
                            @endif
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <a href="{{ route('detail_orders.show', $item->order_id) }}" class="font-semibold leading-tight text-xss text-slate-400">
                                <i class="fas fa-info-circle text-lg"></i> 
                            </a> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2 px-2">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

