@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List'), 'pageSlug' => 'files'])

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
                                    <h4 class="card-title "><strong>All files</strong> </h4>
                                    <p class="card-category"> Click on the number to view all bills</p>
                                    {{-- <h4 class="card-title">Users</h4> --}}
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('files.create') }}" class="btn btn-sm btn-primary">Add file</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Phone
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Cleint
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Price
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($files as $file)
                                                <tr>

                                                    <td>
                                                        <a href="{{ route('files.files', $file) }}"> {{ $file->phone }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $file->name }}
                                                    </td>
                                                    <td>
                                                        {{ $file->client }}
                                                    </td>
                                                    <td>
                                                        {{ $file->status }}
                                                    </td>
                                                    <td class="text-primary">
                                                        {{ $file->price }}
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
                                                                    href="{{ route('files.edit', $file) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('files.show', $file) }}">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
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
