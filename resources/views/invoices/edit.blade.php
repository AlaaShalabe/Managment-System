@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit invoice') }}</h5>
                </div>
                <form method="post" action="{{ route('invoices.update', $invoice) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('PUT')

                        @include('alerts.success')

                        {{-- name --}}
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ _('Name') }}</label>
                            <input type="text" name="name"
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name"
                                value="{{ old('name', $invoice->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        {{-- phone --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">File</label>
                            <select name="file_id" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                @foreach ($files as $file)
                                    <option value="{{ $file->id }}" {{ $file->id == old('file_id') ? 'selected' : '' }}>
                                        {{ $file->phone }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- glasses_type --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">Glasses type</label>
                            <select name="glasses_type" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="Lenses"
                                    {{ old('glasses_type', $invoice->glasses_type) == 'Lenses' ? 'selected' : '' }}>Lenses
                                </option>
                                <option value="Eyeglasses"
                                    {{ old('glasses_type', $invoice->glasses_type) == 'Eyeglasses' ? 'selected' : '' }}>
                                    Eyeglasses
                                </option>
                                <option value="Sunglasses"
                                    {{ old('glasses_type', $invoice->glasses_type) == 'Sunglasses' ? 'selected' : '' }}>
                                    Sunglasses</option>
                            </select>
                        </div>

                        {{-- client --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">Client</label>
                            <select name="client" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="local" {{ old('client', $invoice->client) == 'local' ? 'selected' : '' }}>
                                    local</option>
                                <option value="VIP" {{ old('client', $invoice->client) == 'VIP' ? 'selected' : '' }}>VIP
                                </option>
                            </select>
                        </div>
                        {{-- degree --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('Degree') }}</label>
                            <input type="text" name="degree"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder=" "
                                value="{{ old('degree', $invoice->degree) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        {{-- Lenses type --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">Lenses type</label>
                            <select name="Lenses_type" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="Daily transparent medical"
                                    {{ old('Lenses_type', $invoice->Lenses_type) == 'Daily transparent medical' ? 'selected' : '' }}>
                                    Daily transparent medical</option>
                                <option value="Monthly transparent medical"
                                    {{ old('Lenses_type', $invoice->Lenses_type) == 'Monthly transparent medical' ? 'selected' : '' }}>
                                    Monthly transparent medical</option>
                                <option value="Daily color medic"
                                    {{ old('Lenses_type', $invoice->Lenses_type) == 'Daily color medic' ? 'selected' : '' }}>
                                    Daily color medic</option>
                                <option value="Monthly medical color"
                                    {{ old('Lenses_type', $invoice->Lenses_type) == 'Monthly medical color' ? 'selected' : '' }}>
                                    Monthly medical color</option>
                            </select>
                        </div>


                        {{-- status --}}
                        <div class="form-group col-md-4">
                            <label for="inputState">Status</label>
                            <select name="status" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="received"
                                    {{ old('status', $invoice->status) == 'received' ? 'selected' : '' }}>Received</option>
                                <option value="not_received"
                                    {{ old('status', $invoice->status) == 'not_received' ? 'selected' : '' }}>Not received
                                </option>
                            </select>
                        </div>

                        {{-- price --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('Price') }}</label>
                            <input type="number" name="price"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="200000"
                                value="{{ old('price', $invoice->price) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        {{-- paid_up --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('paid up') }}</label>
                            <input type="number" name="paid_up"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="200000"
                                value="{{ old('paid_up', $invoice->paid_up) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        {{-- the_rest --}}

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>{{ _('The rest') }}</label>
                            <input type="number" name="the_rest"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="200000"
                                value="{{ old('the_rest', $invoice->the_rest) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        {{-- comments --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comments</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Leave a note ..."
                                name="comments">{{ old('comments', $invoice->comments) }}</textarea>
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
