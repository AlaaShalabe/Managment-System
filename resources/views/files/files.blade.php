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
                                    <h4 class="card-title "><strong>{{ $file->invoices->count() }} invoices for
                                            <u>{{ $file->phone }} </u> number</strong></h4>
                                    <p class="card-category"> All bills affiliated with
                                        <strong><u>{{ $file->phone }}</u></strong>
                                        number
                                    </p>
                                    {{-- <h4 class="card-title">Users</h4> --}}
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
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
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('invoices.edit', $invoice) }}">Edit</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-8">
                                        {{-- <h4 class="card-title ">All invoices</h4>
                                        <p class="card-category"> Here is a subtitle for this table</p> --}}
                                        {{-- <h4 class="card-title">Users</h4> --}}
                                    </div>

                                    <div class="col-4 text-right">
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
