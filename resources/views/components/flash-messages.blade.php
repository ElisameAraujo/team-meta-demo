@if ($errors->any())
    <div role="alert" class="alert alert-info col-span-12">
        @foreach ($errors->all() as $error)
            <ul>
                <li><i class="fa-solid fa-xmark"></i> {{ $error }}</li>
            </ul>
        @endforeach
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success notification col-span-12" role="alert">
        <i class="fa-regular fa-circle-check"></i> {{ session('success') }}
    </div>
@endif

@if (session()->has('update'))
    <div class="alert alert-info notification col-span-12" role="alert">
        <i class="fa-regular fa-circle-check"></i> {{ session('update') }}
    </div>
@endif

@if (session()->has('delete'))
    <div class="alert alert-error notification col-span-12" role="alert">
        <i class="fa-regular fa-trash-can"></i> {{ session('delete') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-error notification col-span-12 text-white" role="alert">
        <i class="fa-solid fa-xmark"></i> {{ session('error') }}
    </div>
@endif