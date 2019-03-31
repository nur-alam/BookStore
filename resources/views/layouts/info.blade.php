@if(session()->has('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif