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
                                    <h4 class="card-title "><strong><u>
                                                {{ $file->phone }} </u></strong>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th>Phone</th>
                                        <th>Count of invoices</th>
                                        <th>Careted at</th>
                                        <th>updated at</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td>{{ $file->phone }}</td>
                                        <td>{{ $file->invoices->count() }}</td>
                                        <td>{{ $file->created_at->format('d M Y') }}</td>
                                        <td>{{ $file->updated_at->format('d M Y') }}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('files.destroy', $file) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                @can('invoices-delete')
                                                    <button class="btn btn-danger btn-fab btn-icon btn-round btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this {{ $file->phone }}?')"
                                                        type="submit">
                                                        <i class="tim-icons icon-trash-simple"> </i>
                                                    </button>
                                                @endcan
                                                <a href="{{ route('files.edit', $file) }}" rel="tooltip"
                                                    class="btn btn-success btn-sm btn-round btn-icon">
                                                    <i class="tim-icons icon-pencil"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="table-responsive">
                                <form action="{{ route('invoices.destroyMultiple') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <table class="table " style="background-color:#f2d3ed; border-radius: 10px;">
                                        <thead>
                                            <tr>
                                                <th>Invoices</th>
                                                <th></th>
                                                <th></th>
                                                <th class="text-right">
                                                </th>
                                                <th class="td-actions text-right">
                                                    <div class="col-12 text-right">
                                                        @can('invoices-delete')
                                                            <button class="btn btn-danger btn-fab btn-icon btn-round"
                                                                type="submit">
                                                                <i class="tim-icons icon-trash-simple"> </i>
                                                            </button>
                                                        @endcan
                                                        <a href="{{ route('invoices.create', $file) }}"
                                                            class="btn btn-primary btn-fab btn-icon btn-round">
                                                            <i class="tim-icons icon-simple-add"> </i>
                                                        </a>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>

                                            </th>

                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Client
                                            </th>
                                            <th>
                                                Statua
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                            <th>
                                                Created_at
                                            </th>
                                            <th class="text-right">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($file->invoices as $invoice)
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="ids[]" id="inlineCheckbox1"
                                                                    value="{{ $invoice->id }}">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td>

                                                        {{ $invoice->name }}
                                                    </td>
                                                    <td>
                                                        {{ $invoice->client }}
                                                    </td>
                                                    <td>
                                                        {{ $invoice->status }}
                                                    </td>
                                                    <td class="text-primary">
                                                        {{ $invoice->price }}
                                                    </td>
                                                    <td>

                                                        {{ $invoice->created_at->format('d M Y') }}
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        @can('invoices-list')
                                                            <a href="{{ route('invoices.show', $invoice) }}" rel="tooltip"
                                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-tv-2"></i>
                                                            </a>
                                                        @endcan
                                                        @can('invoices-update')
                                                            <a href="{{ route('invoices.edit', $invoice) }}" rel="tooltip"
                                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-pencil"></i>
                                                            </a>
                                                        @endcan

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </form>
                            </div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 text-right">
                                        <a href="{{ route('files.index') }}" class="btn btn-sm btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
