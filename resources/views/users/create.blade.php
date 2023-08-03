@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'Users'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create User') }}</h5>
                </div>
                <form method="post" action="{{ route('users.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        {{-- name --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="Enter the name " value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        {{-- Email --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('Email') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Enter the name " value="{{ old('email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        {{-- Password --}}
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label>{{ _('password') }}</label>
                            <input type="text" name="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Enter the password " value="{{ old('password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        {{-- Confirm Password --}}
                        <div class="form-group{{ $errors->has('confirm-password') ? ' has-danger' : '' }}">
                            <label>{{ _('confirm-password') }}</label>
                            <input type="text" name="confirm-password"
                                class="form-control{{ $errors->has('confirm-password') ? ' is-invalid' : '' }}"
                                placeholder="Enter the confirm-password " value="{{ old('confirm-password') }}">
                            @include('alerts.feedback', ['field' => 'confirm-password'])
                        </div>
                        {{-- Role --}}
                        <div class="form-group col-md-3 @error('roles_name')is-danger @enderror">
                            <label>{{ _('Role') }}</label>
                            <select name="roles_name[]" class="form-control" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles_name')
                                <span style="color:#ff8d72; font-size:0.3cm ">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                        <a href="{{ route('users.index') }}" class="btn btn-fill btn-primary">{{ _('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
