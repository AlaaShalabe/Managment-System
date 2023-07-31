@extends('layouts.app', ['pageSlug' => 'welcome'])

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">

            <div class="header-body text-center ">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 style="color: darkmagenta">{{ __('Welcome Back!') }}</h1>
                        <p style="color: black">
                            {{ __('Optical Store is a system to Manage your files and bills.') }}
                        </p>
                    </div>
                </div>
            </div>
            @include('alerts.success')
            @if (session($key ?? 'warning'))
                <div class="alert alert-default" role="alert">
                    {{ session($key ?? 'warning') }} <a href="{{ route('files.create') }}" class="alert-link">Add
                        File</a>.
                </div>
            @endif

        </div>
    </div>
@endsection
