@if (session($key ?? 'warning'))
    <div class="alert alert-default" role="alert">
        {{ session($key ?? 'warning') }}<a href='{{ session($key ?? 'route') }}' class='alert-link'> here</a>..
    </div>
@endif
