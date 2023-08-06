@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List'), 'pageSlug' => 'files'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="card-title "><strong>All files</strong> </h4>
                                    <p class="card-category"> Click on the<u> number </u> to view all bills .. </p>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('files.create') }}" class="btn btn-sm btn-primary">Add file</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>

                                            </th>
                                            <th>
                                                Phone
                                            </th>
                                            <th>
                                                Count of invoices
                                            </th>
                                            <th>
                                                Created at
                                            </th>
                                            <th class="text-right">Actions</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($files as $file)
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('files.files', $file) }}"> {{ $file->phone }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $file->invoices->count() }}
                                                    </td>
                                                    <td>
                                                        {{ $file->created_at->format('D M Y') }}
                                                    </td>

                                                    <form action="{{ route('files.destroy', $file) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <td class="td-actions text-right">
                                                            @can('invoices-list')
                                                                <a href="{{ route('files.files', $file) }}" rel="tooltip"
                                                                    class="btn btn-info btn-sm btn-round btn-icon">
                                                                    <i class="tim-icons icon-tv-2"></i>
                                                                </a>
                                                            @endcan
                                                            <a href="{{ route('files.edit', $file) }}" rel="tooltip"
                                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-pencil"></i>
                                                            </a>
                                                            <button type="submit" rel="tooltip"
                                                                class="btn btn-danger btn-sm btn-round btn-icon"
                                                                onclick="return confirm('Are you sure you want to delete this {{ $file->phone }}?')">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
