@if (session($key ?? 'status'))
    <div class="alert alert-default" role="alert">
        {{ session($key ?? 'status') }}
    </div>
@endif
