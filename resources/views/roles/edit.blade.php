@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'Roles'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Ediat the {{ $role->name }} role</h5>
                </div>
                <form method="post" action="{{ route('roles.update', $role->id) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        @include('alerts.success')

                        {{-- Role --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Role') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="Enter the name " value="{{ old('name', $role->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        {{-- Permission --}}
                        <div class="form-check @error('permission')is-danger @enderror">
                            @foreach ($permission as $value)
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="permission[]"
                                        value="{{ $value->id }}" class="name"
                                        {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                    {{ $value->name }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                <br>
                            @endforeach
                            @error('permission')
                                <span style="color:#ff8d72; font-size:0.3cm ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-fill btn-primary">{{ _('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
