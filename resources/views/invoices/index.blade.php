@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List'), 'pageSlug' => 'invoices'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        {{-- <div class="card-header card-header-primary">
                            <h4 class="card-title ">Simple Table</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div> --}}
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="card-title "><strong> All invoices </strong></h4>
                                    <p class="card-category"> click on the <u> name </u> to show more details..</p>
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
                                        <a href="{{ route('invoices.create') }}" class="btn btn-sm btn-primary">Add
                                            invoice</a>
                                    </div>
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>

                                            </th>
                                            <th>
                                                created at
                                            </th>
                                            <th>
                                                Phone
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Client
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
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
                                                        {{ $invoice->file->phone }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('invoices.show', $invoice) }}">
                                                            {{ $invoice->name }}</a>
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
                                                    <form action="{{ route('invoices.destroy', $invoice) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <td class="td-actions text-right">
                                                            <a href="{{ route('invoices.show', $invoice) }}" rel="tooltip"
                                                                class="btn btn-info btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-tv-2"></i>
                                                            </a>
                                                            <a href="{{ route('invoices.edit', $invoice) }}" rel="tooltip"
                                                                class="btn btn-success btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-pencil"></i>
                                                            </a>
                                                            <button type="submit" rel="tooltip"
                                                                class="btn btn-danger btn-sm btn-round btn-icon">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
