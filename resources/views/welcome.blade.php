@extends('layouts.app', ['pageSlug' => 'welcome'])

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">

            <div class="header-body text-center ">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-6">
                        <h1 style="color: darkmagenta">Welcome Back {{ Auth::user()->name }}!</h1>
                        <p style="color: black">
                            {{ __('Optical Store is a system to Manage your files and bills.') }}
                        </p>
                    </div>
                </div>
            </div>
            @include('alerts.success')
            @include('alerts.warning')
        </div>
    </div>
@endsection
