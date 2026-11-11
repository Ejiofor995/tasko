<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Todo List</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pricing-Yearly--Monthly-badges.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Pricing-Yearly--Monthly-icons.css') }}">
</head>

<body>
    <form class="form-control m-4 w-75 mx-auto"  action="{{ route('create_task') }}" method="POST">
        @csrf
    <p class="h2 text-center">Write down Your Goals</p>
        <div class="input-group mb-3">
            <input class="form-control form-control" name="task" type="text" placeholder="I'm ready to note down your tasks :)" aria-label="Search" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" id="button-addon2-1">Write Down</button>
            
        </div>
            <div style="display: inline">
                @error('task') <p class="h4 text-center" style="display: block; color: red">{{ $message }}</p> @enderror
                @if(session('success'))
                    <p class="h4 text-center" style="display: block; color: green">{{ session('success') }}</p>
                @endif
            </div>
    </form>

        
    <p class="h4 text-center my-4">Your Listed Goals</p>
    @include('components.list_tasks')
    {{-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> --}}
</body>

</html>