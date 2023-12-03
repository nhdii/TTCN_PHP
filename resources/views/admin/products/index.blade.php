@extends('layouts.master')
@section('content')
    @include('layouts.notifySuccess')
    <div class="mb-2 flex">
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Create
        </a>        
        {{-- <div class="ml-4 mr-2">
            <form action="" method="GET" class="flex items-center space-x-4">
                <label for="search_by" class="font-bold">Tìm kiếm theo:</label>
                <select name="search_by" id="search_by" class="p-2 border rounded">
                    <option value="product_name" @if($column == 'product_name') selected @endif>Tên dịch vụ</option>
                    <option value="gender" @if($column == 'gender') selected @endif>Số điện thoại</option>
                    <option value="default_stock_quantity" @if($column == 'default_stock_quantity') selected @endif>Xếp loại</option>
                    <option value="default_price" @if($column == 'default_price') selected @endif>Địa chỉ</option>
                </select>
                <input type="text" name="keywords" value="{{ $keywords }}" placeholder="Nhập từ khóa" class="p-2 border rounded">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out cursor-pointer">
                    Tìm kiếm
                </button>
            </form>
        </div> --}}
        <a href="{{ route('products.index') }}" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Reset
        </a>
    </div>
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6 class="font-bold text-xl">Product</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                    <tr>
                        <th data-column="product_id" class="sortable-column cursor-pointer px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mã DV </th>
                        <th data-column="product_name" class="sortable-column cursor-pointer px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tên Dịch Vụ</th>
                        <th data-column="gender" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">SDT</th>
                        <th data-column="default_price" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Địa Chỉ</th>
                        <th data-column="default_stock_quantity" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Xếp Loại </th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Mô tả</th>
                        <th data-column="brand_id" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Loại dịch vụ</th>
                        <th data-column="category_id" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Loại dịch vụ</th>
                        <th data-column="size" class="sortable-column cursor-pointer px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b
                        border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Loại dịch vụ</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $dv)
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 ml-4 font-semibold leading-tight text-xs">{{ $dv->product_id }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <div class="flex px-2 py-1">
                                <div>
                                    <img src="{{ asset('storage/images/service_pic/' . $dv->product_id . '/' . $dv->image) }}" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-sm h-9 w-9 rounded-xl" alt="user1" />
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 leading-normal text-sm">{{ $dv->product_name }}</h6>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-xs">{{ $dv->gender }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="w-[100px] text-ellipsis overflow-hidden mb-0 font-semibold leading-tight text-xs">{{ $dv->default_price }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-xs">{{ $dv->default_stock_quantity }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="w-[100px] text-ellipsis overflow-hidden mb-0 font-semibold leading-tight text-xs">{{ $dv->moTa }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-xs">{{ $dv->getproduct_name->brand_id }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <form class="inline-block mr-1" action="{{ route('products.destroy', $dv->product_id) }}" method="post" id="deleteForm{{$dv->product_id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-semibold leading-tight text-x1 text-slate-400 delete-btn" data-service-id="{{ $dv->product_id }}">Xoá</button>
                            </form>|
                            <a href="{{ route('products.edit', $dv->product_id) }}" class="font-semibold leading-tight text-xs text-slate-400"> Sửa </a> |
                            <a href="{{ route('products.show', $dv->product_id) }}" class="font-semibold leading-tight text-xs text-slate-400"> Chi Tiết </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-2 px-2">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy dimage sách các cột có thể sắp xếp
            const sortableColumns = document.querySelectorAll('.sortable-column');

            // Đặt sự kiện click cho mỗi cột
            sortableColumns.forEach(column => {
                column.addEventListener('click', function () {
                    const columnType = this.dataset.column;
                    const currentOrder = this.dataset.order;
                    const newOrder = currentOrder === 'asc' ? 'desc' : 'asc';

                    // Chuyển đến trang index với tham số sắp xếp
                    window.location.href = `{{ route('products.index') }}?sort_by=${columnType}&order=${newOrder}`;
                });
            });

            //xử lý nút xóa
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const product_id = this.getAttribute('data-service-id');

                    Swal.fire({
                        title: 'Xác nhận xóa dịch vụ',
                        html: `Bạn có chắc chắn muốn xóa dịch vụ này không?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xóa',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const deleteForm = document.getElementById('deleteForm' + product_id);
                            deleteForm.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
@endsection
