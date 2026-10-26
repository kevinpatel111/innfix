@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom d-flex justify-content-between">
                            <h2>Certificates List</h2>
                        </div>

                        <div class="card-body">
                            <div class="breadcrumb-wrapper breadcrumb-contacts mb-3">
                                <div>
                                </div>
                                <div>
                                    <a href="{{ route('certificates.create') }}"
                                        class="ladda-button btn btn-primary btn-square btn-ladda" title="View">Create
                                        Certificate</a>
                                </div>
                            </div>

                            <div class="hoverable-data-table">
                                <table id="hoverable-data-table"
                                    class="table table-bordered table-hover table-striped text-center nowrap"
                                    style="width:100%; margin-top: 0px!important;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($certificates as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    <img src="{{ asset('website/adminproduct/certificates/' . $user->image) }}"
                                                        height="30px" width="70px">
                                                </td>

                                                <td>
                                                    <a href="{{ route('certificates.edit', $user->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <span class="mdi mdi-pencil h4"></span>
                                                    </a>
                                                    <form action="{{ route('certificates.destroy', $user->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this subcategory?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            style="background:none;border:none;padding:0;"
                                                            data-toggle="tooltip" title="Delete">
                                                            <span class="mdi mdi-delete h4 text-danger"></span>
                                                        </button>
                                                    </form>
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
        <!-- End Content -->
    </div>
@endsection
