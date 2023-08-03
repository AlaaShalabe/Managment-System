@extends('layouts.app', ['page' => __('Typography'), 'pageSlug' => 'Users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-5">
                    <div class="card-header">
                        <div class="row">

                            <div class="col-12 text-right">
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn btn-danger animation-on-hover"
                                        type="submit">Delete</button>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-success">Edit</a>

                                </form>
                            </div>

                        </div>

                    </div>
                    <h5 class="card-category"></h5>
                    <h3 class="card-title"><strong>{{ $user->name }} </strong></h3>
                    <h5 class="card-category"></h5>

                </div>
                <div class="card-body">
                    <div class="typography-line">

                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Name</span>{{ $user->name }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Email</span>{{ $user->email }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Role</span>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    {{ $v }}
                                @endforeach
                            @endif
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Created at</span>{{ $user->created_at->format('d M Y') }}
                        </h4>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
