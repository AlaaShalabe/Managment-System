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

                        {{-- name --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name"
                                value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        {{-- phone --}}
                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <label>{{ _('Phone') }}</label>
                            <input type="text" name="phone"
                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                placeholder="Enter the phone number" value="{{ old('phone') }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>
                        {{-- glasses_type --}}
                        <div class="form-group @error('glasses_type') is-danger @enderror col-md-4">
                            <label for="inputState">Glasses type</label>
                            <select name="glasses_type" id="inputState" class="form-control">
                                <option value="Lenses" {{ old('glasses_type') == 'Lenses' ? 'selected' : '' }}>Lenses
                                </option>
                                <option value="Eyeglasses" {{ old('glasses_type') == 'Eyeglasses' ? 'selected' : '' }}>
                                    Eyeglasses
                                </option>
                                <option value="Sunglasses" {{ old('glasses_type') == 'Sunglasses' ? 'selected' : '' }}>
                                    Sunglasses</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'glasses_type'])
                        </div>

                        {{-- client --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">Client</label>
                            <select name="client" id="inputState" class="form-control">
                                <option value="local">local</option>
                                <option value="VIP">VIP</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'client'])
                        </div>
                        {{-- degree --}}
                        <div class="form-group{{ $errors->has('degree') ? ' has-danger' : '' }}">
                            <label>{{ _('Degree') }}</label>
                            <input type="text" name="degree"
                                class="form-control{{ $errors->has('degree') ? ' is-invalid' : '' }}" placeholder=" "
                                value="{{ old('degree') }}">
                            @include('alerts.feedback', ['field' => 'degree'])
                        </div>
                        {{-- Lenses type --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">Lenses type</label>
                            <select name="Lenses_type" id="inputState" class="form-control">
                                <option value="Daily transparent medical">Daily transparent medical</option>
                                <option value="Monthly transparent medical">Monthly transparent medical</option>
                                <option value="Daily color medic">Daily color medic</option>
                                <option value="Monthly medical color">Monthly medical color</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'Lenses_type'])
                        </div>


                        {{-- status --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">Status</label>
                            <select name="status" id="inputState" class="form-control">
                                <option value="received">Received</option>
                                <option value="not_received">Not received</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'status'])
                        </div>

                        {{-- price --}}
                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                            <label>{{ _('Price') }}</label>
                            <input type="number" name="price"
                                class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="200000"
                                value="{{ old('price') }}">
                            @include('alerts.feedback', ['field' => 'price'])
                        </div>

                        {{-- paid_up --}}
                        <div class="form-group{{ $errors->has('paid_up') ? ' has-danger' : '' }}">
                            <label>{{ _('paid up') }}</label>
                            <input type="number" name="paid_up"
                                class="form-control{{ $errors->has('paid_up') ? ' is-invalid' : '' }}" placeholder="200000"
                                value="{{ old('paid_up') }}">
                            @include('alerts.feedback', ['field' => 'paid_up'])
                        </div>
                        {{-- the_rest --}}

                        <div class="form-group{{ $errors->has('the_rest') ? ' has-danger' : '' }}">
                            <label>{{ _('The rest') }}</label>
                            <input type="number" name="the_rest"
                                class="form-control{{ $errors->has('the_rest') ? ' is-invalid' : '' }}"
                                placeholder="200000" value="{{ old('the_rest') }}">
                            @include('alerts.feedback', ['field' => 'the_rest'])
                        </div>
                        {{-- comments --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comments</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Leave a note ..."
                                name="comments">{{ old('comments') }}</textarea>
                            @include('alerts.feedback', ['field' => 'comments'])
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
