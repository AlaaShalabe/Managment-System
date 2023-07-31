@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create File') }}</h5>
                </div>
                <form method="post" action="{{ route('files.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        {{-- phone --}}
                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label>{{ _('Phone') }}</label>
                            <input type="text" name="phone"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                placeholder="Enter the phone number" value="{{ old('phone') }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
