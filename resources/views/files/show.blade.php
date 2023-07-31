@extends('layouts.app', ['page' => __('Files'), 'pageSlug' => 'files'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 text-right">
                                <form action="{{ route('files.destroy', $file) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn btn-danger animation-on-hover"
                                        type="submit">Delete</button>
                                    <a href="{{ route('files.edit', $file) }}" class="btn btn-sm btn-success">Edit</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-category"></h5>
                    <h3 class="card-title"><strong><u>{{ $file->phone }} </u> File</strong></h3>
                </div>
                <div class="card-body">
                    <div class="typography-line">
                        <h4>
                            <span>Phone</span>{{ $file->phone }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Created at</span>{{ $file->created_at->format('D M Y') }}
                        </h4>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
