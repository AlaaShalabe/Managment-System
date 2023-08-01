@extends('layouts.app', ['page' => __('Typography'), 'pageSlug' => 'invoices'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mb-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                {{-- <h4 class="card-title ">All invoices</h4>
                                <p class="card-category"> Here is a subtitle for this table</p> --}}
                                {{-- <h4 class="card-title">Users</h4> --}}
                            </div>

                            <div class="col-4 text-right">
                                <form action="{{ route('invoices.destroy', $invoice) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn btn-danger animation-on-hover"
                                        type="submit">Delete</button>
                                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-sm btn-success">Edit</a>

                                </form>
                            </div>


                        </div>

                    </div>
                    <h5 class="card-category"></h5>
                    <h3 class="card-title"><strong><u>{{ $invoice->file->phone }} </u> Invoice</strong></h3>
                    <h5 class="card-category"></h5>
                    <h3 class="card-title">{{ $invoice->phone }}</h3>
                </div>
                <div class="card-body">
                    <div class="typography-line">

                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>name</span>{{ $invoice->name }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Glasses type</span>{{ $invoice->glasses_type }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Client</span>{{ $invoice->client }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Degree of lenses</span>{{ $invoice->degree }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>Lenses type</span>{{ $invoice->Lenses_type }}
                        </h4>
                    </div>
                    <div class="typography-line">
                        <h4>
                            <span>status</span>{{ $invoice->status }}
                        </h4>
                    </div>

                    <div class="typography-line">
                        <span>Comments</span>
                        <blockquote>
                            <p class="blockquote blockquote-primary">
                                {{ $invoice->comments }}
                                <br>
                                <br>

                            </p>
                        </blockquote>
                    </div>

                    <div class="typography-line">
                        <span>Lists</span>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Price</h5>
                                <ul class="list-unstyled">
                                    <li>{{ $invoice->price }}</li>

                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h5>paid_up</h5>
                                <ul class="list-unstyled">
                                    <li>{{ $invoice->paid_up }}</li>

                                </ul>

                            </div>
                            <div class="col-md-3">
                                <h5>the_rest</h5>
                                <ul class="list-unstyled">
                                    <li>{{ $invoice->the_rest }}</li>

                                </ul>
                            </div>
                            {{-- <div class="col-md-3">
                                <h5>Inline List</h5>
                                <ul class="list-inline">
                                    <li class="list-inline-item">List1</li>
                                    <li class="list-inline-item">List2</li>
                                    <li class="list-inline-item">List3</li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">
                                {{-- <h4 class="card-title ">All invoices</h4>
                                <p class="card-category"> Here is a subtitle for this table</p> --}}
                                {{-- <h4 class="card-title">Users</h4> --}}
                            </div>

                            <div class="col-4 text-right">


                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
