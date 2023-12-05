@if(session('error'))
    <div class="mx-auto w-1/2">
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-200" role="alert">
            <span class="font-medium flex justify-center">{{ session('Error') }}</span>
        </div>
    </div>
@endif