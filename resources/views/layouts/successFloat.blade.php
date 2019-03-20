@if(session()->has('success'))
    <div class="alert alert-success success-float">
        {{ session('success') }}
    </div>
@endif