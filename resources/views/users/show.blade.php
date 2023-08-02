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
                                    <h4 class="card-title "><strong>{{ $file->invoices->count() }} bill for phone number<u>
                                                {{ $file->phone }} </u></strong>
                                    </h4>

                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="table-responsive">
                                <form action="{{ route('invoices.destroyMultiple') }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="col-12 text-right">
                                        <button class="btn btn-danger btn-fab btn-icon btn-round" type="submit">
                                            <i class="tim-icons icon-trash-simple"> </i>
                                        </button>
                                        <a href="{{ route('invoices.create', $file) }}"
                                            class="btn btn-primary btn-fab btn-icon btn-round">
                                            <i class="tim-icons icon-simple-add"> </i>
                                        </a>
                                    </div>
                                    <table class="table">
                                        <thead class=" text-primary">

                                            <th>

                                            </th>
                                            <th>
                                                Created_at
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

                                                        {{ $invoice->created_at->format('D M Y') }}
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

                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('invoices.show', $invoice) }}" rel="tooltip"
                                                            class="btn btn-info btn-sm btn-round btn-icon">
                                                            <i class="tim-icons icon-tv-2"></i>
                                                        </a>
                                                        <a href="{{ route('invoices.edit', $invoice) }}" rel="tooltip"
                                                            class="btn btn-success btn-sm btn-round btn-icon">
                                                            <i class="tim-icons icon-pencil"></i>
                                                        </a>

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
