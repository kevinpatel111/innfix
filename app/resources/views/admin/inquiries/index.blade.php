@extends('layouts.admin')

@section('content')


 

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Inquiries List</h2>
                    </div>

                    <div class="card-body">                        

                        <div class="hoverable-data-table">
                            <table id="hoverable-data-table" class="table table-bordered table-hover table-striped text-center nowrap" style="width:100%; margin-top: 0px!important;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Box</th>
                                        <th>Profession</th>
                                        <th>Message</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($inquiries as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->number }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->box }}</td>
                                        <td>{{ $user->profession }}</td>
                                        <td>{{ $user->message }}</td>
                                        
                                        <td> 
                                             <form action="{{ route('inquires.destroy', $user->id) }}"
      method="POST"
      style="display:inline;"
      onsubmit="return confirm('Are you sure you want to delete this subcategory?')">
    @csrf
    @method('DELETE')

    <button type="submit"
            style="background:none;border:none;padding:0;"
            data-toggle="tooltip"
            title="Delete">
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


 