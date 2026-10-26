@extends('layouts.admin')

@section('content')


 

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Packings List</h2>
                    </div>

                    <div class="card-body">
                        <div class="breadcrumb-wrapper breadcrumb-contacts mb-3">
                            <div>
                            </div>
                            <div>
                                <a href="{{ route('packings.create') }}" class="ladda-button btn btn-primary btn-square btn-ladda" title="View">Create pdf</a>
                            </div>
                          </div>

                        <div class="hoverable-data-table">
                            <table id="hoverable-data-table" class="table table-bordered table-hover table-striped text-center nowrap" style="width:100%; margin-top: 0px!important;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pdf Name</th>
                                        <th>Pdf</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($packings as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td> 
                                            <a href="{{ asset('website/adminproduct/packings/'.$user->pdf) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="eye">
                                                <i class="mdi mdi-download h4"></i> 
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('packings.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="mdi mdi-pencil h4"></span>
                                            </a>
                                            <a href="{{ route('packings.delete',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <span class="mdi mdi-delete h4"></span>
                                            </a>
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
    $(function() {
      $('#toggle-two').bootstrapToggle({
        on: 'Enabled',
        off: 'Disabled'
      });
    })
  </script>
  
  
  <script>
    $('.toggle-class').on('change', function() {
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
            success:function(data) {
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


 