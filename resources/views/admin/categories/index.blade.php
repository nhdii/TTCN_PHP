@extends('layouts.master')
@section('content')
    @include('layouts.notifySuccess')
    <div class="mb-2 flex">
        <a href="{{route('categories.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Create
        </a>
        <div class="ml-4 mr-2">
            <form action="" method="GET" class="flex items-center space-x-4">
                <label for="search_by" class="font-bold">Seach by:</label>
                <select name="search_by" id="search_by" class="p-2 border rounded">
                    <option value="category_name" @if($column == 'category_name') selected @endif>Category Name</option>
                    <option value="category_id" @if($column == 'category_id') selected @endif>Category Id</option>
                </select>
                <input type="text" name="keywords" value="{{ $keywords }}" placeholder="Nhập từ khóa" class="p-2 border rounded">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded duration-300 ease-in-out cursor-pointer">
                    Tìm kiếm
                </button>
            </form>
        </div>
        <a href="{{ route('categories.index') }}" class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Reset
        </a>

        {{-- <a href="{{ route('categories.export') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer duration-300 ease-in-out">
            Export <i class="fas fa-file-excel fa-lg ml-2"></i>
        </a>  --}}

    </div>
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <h6 class="font-bold text-xl">Category</h6>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                    <tr>
                        <th data-column="category_id" class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Category ID</th>
                        <th data-column="category_name" class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Category Name</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $ct)
                    <tr>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 ml-4 font-semibold leading-tight text-x1">{{ $ct->category_id }}</p>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <p class="mb-0 font-semibold leading-tight text-x1">{{ $ct->category_name }}</p>
                        </td>

                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <form class="inline-block mr-1" action="{{ route('categories.destroy', $ct->category_id) }}" method="post" id="deleteForm{{$ct->category_id}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="font-semibold leading-tight text-xss text-slate-400 delete-btn" data-type-categ-id="{{ $ct->category_id }}">
                                    <i class="fas fa-trash-alt"></i> 
                                </button>
                            </form>
                            |
                            <a href="{{ route('categories.edit', $ct->category_id) }}" class="font-semibold leading-tight text-xss text-slate-400">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-2 px-2">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            //xử lý nút xóa
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const category_id = this.getAttribute('data-type-categ-id');

                    Swal.fire({
                        title: 'Confirm Delete',
                        html: `Are you sure you want to remove this Category?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Delete',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const deleteForm = document.getElementById('deleteForm' + category_id);
                            deleteForm.submit();
                        }
                    });
                });
            });   
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
