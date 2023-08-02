@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'Roles'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create File') }}</h5>
                </div>
                <form method="post" action="{{ route('roles.store') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf

                        @include('alerts.success')

                        {{-- Role --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Role') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="Enter the name " value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        {{-- Permission --}}
                        <div class="form-check @error('permission')is-danger @enderror">
                            @foreach ($permission as $value)
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="permission[]"
                                        value="{{ $value->id }}" class="name">
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
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
