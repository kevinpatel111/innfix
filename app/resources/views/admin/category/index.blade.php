@extends('layouts.admin')

@section('content')


 

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Category List</h2>
                    </div>

                    <div class="card-body">
                        <div class="breadcrumb-wrapper breadcrumb-contacts mb-3">
                            <div>
                            </div>
                            <div>
                                <a href="{{ route('categories.create') }}" class="ladda-button btn btn-primary btn-square btn-ladda" title="View">Create Category</a>
                            </div>
                          </div>

                        <div class="hoverable-data-table">
                            <table id="hoverable-data-table" class="table table-bordered table-hover table-striped text-center nowrap" style="width:100%; margin-top: 0px!important;">
                                <thead>
                                    <tr>
                                        <th class="sorting_asc1">@sortablelink('id')</th>
                                        <th>@sortablelink('name','Category Name')</th>
                                        <th>Category Image</th>
                                        <th>Status</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <img src="{{ asset('website/adminproduct/categories/'.$user->image) }}" height="30px" width="70px">
                                        </td>
                                       
                                        <td>   
                                            <label class="switch switch-text switch-primary switch-pill form-control-label">
                                                <input type="checkbox" class="toggle-class switch-input form-check-input" data-id="{{ $user->id }}" data-style="slow" data-on="Out Stock" data-off="In Stock" {{ $user->status == true ? 'checked' : ''}}>
                                                <span class="switch-label" data-on="Off" data-off="on "></span>
                                                <span class="switch-handle"></span>
                                            </label> 
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="mdi mdi-pencil h4"></span>
                                            </a>
                                              <form action="{{ route('categories.destroy', $user->id) }}"
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
                            <nav aria-label="Page navigation example ">
                                <ul class="pagination border-rounded justify-content-end">
                                </ul>
                            </nav>
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


 