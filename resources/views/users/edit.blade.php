@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'Users'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit User') }}</h5>
                </div>
                <form method="post" action="{{ route('users.update', $user) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        @include('alerts.success')

                        {{-- name --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="Enter the name " value="{{ old('name', $user->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        {{-- Email --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('Email') }}</label>
                            <input type="email" name="email"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Enter the name " value="{{ old('email', $user) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        {{-- Role --}}
                        <div class="form-group col-md-3 @error('roles_name')is-danger @enderror">
                            <label>{{ _('Role') }}</label>
                            @foreach ($roles as $role)
                                <select name="roles_name[]" class="form-control" multiple>
                                    <option value="{{ $role }}"
                                        {{ in_array($role, $userRole) ? 'selected' : '' }}>{{ $role }}
                                    </option>
                                </select>
                            @endforeach
                            @error('roles_name')
                                <span style="color:#ff8d72; font-size:0.3cm ">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                            <a href="{{ route('users.index') }}" class="btn btn-fill btn-primary">{{ _('Cancel') }}</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
