@if(session('error'))
    <div class="mx-auto w-1/2">
        <div class="p-4 mb-4 text-lg text-red-800 rounded-lg bg-red-200" role="alert">
            <span class="font-medium flex justify-center">{{ session('error') }}</span>
        </div>
    </div>
@endif