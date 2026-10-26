@extends('layouts.admin')

@section('content')




    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom d-flex justify-content-between">
                            <h2>Social Media List</h2>
                        </div>

                        <div class="card-body">
                            <div class="breadcrumb-wrapper breadcrumb-contacts mb-3">
                                <div>
                                </div>
                                <div>
                                    <a href="{{ route('socials.create') }}"
                                        class="ladda-button btn btn-primary btn-square btn-ladda" title="View">Create
                                        Link</a>
                                </div>
                            </div>

                            <div class="hoverable-data-table">
                                <table id="hoverable-data-table"
                                    class="table table-bordered table-hover table-striped text-center nowrap"
                                    style="width:100%; margin-top: 0px!important;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Instagram</th>
                                            <th>Facebook</th>
                                            <th>Twitter</th>
                                            <th>You Tube</th>
                                            <th>Pinterest</th>
                                            <th>Linkedin</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($socials as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <a href="{{ $user->instagram  }}" target="_blank" data-toggle="tooltip"
                                                        data-placement="top" title="instagram">
                                                        <span class="mdi mdi-instagram h4"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ $user->facebook  }}" target="_blank" data-toggle="tooltip"
                                                        data-placement="top" title="facebook">
                                                        <span class="mdi mdi-facebook h4"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ $user->twitter  }}" target="_blank" data-toggle="tooltip"
                                                        data-placement="top" title="twitter">
                                                        <span class="mdi mdi-twitter h4"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ $user->youtube  }}" target="_blank" data-toggle="tooltip"
                                                        data-placement="top" title="youtube">
                                                        <span class="mdi mdi-youtube h4"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ $user->linkedin  }}" target="_blank" data-toggle="tooltip"
                                                        data-placement="top" title="linkedin">
                                                        <span class="mdi mdi-linkedin h4"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ $user->pinterest  }}" target="_blank" data-toggle="tooltip"
                                                        data-placement="top" title="pinterest">
                                                        <span class="mdi mdi-pinterest h4"></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('socials.edit', $user->id) }}" data-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        <span class="mdi mdi-pencil h4"></span>
                                                    </a>
                                                    <form action="{{ route('socials.destroy', $user->id) }}" method="POST"
                                                        style="display:inline;"
                                                        onsubmit="return confirm('Are you sure you want to delete this subcategory?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" style="background:none;border:none;padding:0;"
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



    <!--status-->

    <script>
        $(function () {
            $('#toggle-two').bootstrapToggle({
                on: 'Enabled',
                off: 'Disabled'
            });
        })
    </script>


    <script>
        $('.toggle-class').on('change', function () {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('changeStatus') }}',
                data: {
                    'status': status,
                    'user_id': user_id
                },
                success: function (data) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Status Updated Successfully');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            });
        });
    </script>
@endsection