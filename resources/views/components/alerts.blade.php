@if (session()->has('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
