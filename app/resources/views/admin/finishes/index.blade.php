@extends('layouts.admin')

@section('content')


 

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Finish List</h2>
                    </div>
                    <div class="card-header card-header-border-bottom d-block justify-content-between">  
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <h2>Apply Filter</h2>
                            </div>
                            <div class="col-12 col-md-4">
                                <form id="categoryForm">
                                    <div class="form-group mb-0">
                                        <select class="form-control" id="categorySelect" name="categorySelect">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-4">
                                <form id="categoryForm">
                                    <div class="form-group mb-0">
                                        <select class="form-control" id="categorySelectsize" name="categorySelectsize">
                                            <option value="">Select Size</option>
                                            {{-- @foreach($subcategories as $size)
                                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </form>
                            </div>
                          </div>
                    </div>

                    <div class="card-body">
                        <div class="breadcrumb-wrapper breadcrumb-contacts mb-3">
                            <div>
                            </div>
                            <div>
                                <a href="{{ route('finishes.create') }}" class="ladda-button btn btn-primary btn-square btn-ladda" title="View">Create Finish</a>
                            </div>
                          </div>

                        <div class="hoverable-data-table">
                            <table id="hoverable-data-table" class="table table-bordered table-hover table-striped text-center nowrap" style="width:100%; margin-top: 0px!important;">
                                <thead>
                                    <tr>
                                        <th class="sorting_asc1">@sortablelink('id')</th>
                                        <th>@sortablelink('category_name','Category Name')</th>
                                        <th>@sortablelink('category_size','Category Size')</th>
                                        <th>@sortablelink('finish', 'Finish')</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="subcategoryList">
                                    @foreach ($finishes as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->category_name }}</td>
                                        <td>{{ $user->category_size }} MM</td>
                                        <td>{{ $user->finish }}</td>
                                                                             
                                        <td>   
                                            <label class="switch switch-text switch-primary switch-pill form-control-label">
                                                <input type="checkbox" class="toggle-class switch-input form-check-input" data-id="{{ $user->id }}" data-style="slow" data-on="Out Stock" data-off="In Stock" {{ $user->status == true ? 'checked' : ''}}>
                                                <span class="switch-label" data-on="Off" data-off="on "></span>
                                                <span class="switch-handle"></span>
                                            </label> 
                                        </td>
                                        <td>
                                            <a href="{{ route('finishes.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="mdi mdi-pencil h4"></span>
                                            </a>
                                              <form action="{{ route('finishes.destroy', $user->id) }}"
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>  
     $(document).ready(function() {
      $('#categorySelect').on('change', function() {
        var catID = $(this).val();
        if(catID) {
          $.ajax({
            url: '/finishWithCatID/'+catID,
            type: "post",
            data : {"_token":"{{ csrf_token() }}"},
            dataType: "json",
            success:function(data) {
              //console.log(data);

            
            if(data){
              $('#categorySelectsize').empty();
              $('#categorySelectsize').focus;
              $('#categorySelectsize').append('<option value="">-- Select Size --</option>'); 

              $.each(data, function(key, value){
              $('select[name="categorySelectsize"]').append('<option value="'+ value.id +'">' + value.size + 'MM' + '</option>');

              });
            }else{
              $('#categorySelectsize').empty();
            }

          }
          });
        }else{
        $('#categorySelectsize').empty();
        }
      });

    });

  
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script>
    $(document).ready(function() {
        $('#categorySelect').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/filtersubcategories/'+categoryId,
                    type: 'GET',
                    success: function(response) {
                        var tbody = $('#subcategoryList');
                        tbody.empty(); // Clear existing table rows

                        // Loop through the response data and append rows to the table
                        $.each(response, function(index, item) {
                            var row = '<tr>' +
                                '<td>' + item.id + '</td>' +
                                '<td>' + item.category_name + '</td>' +
                                '<td>' + item.category_size + ' MM ' + '</td>' +
                                '<td>' + item.finish + '</td>' +
                                '<td>' +
                                '<label class="switch switch-text switch-primary switch-pill form-control-label">' +
                                '<input type="checkbox" class="toggle-class switch-input form-check-input" data-id="' + item.id + '" data-style="slow" data-on="Out Stock" data-off="In Stock" ' + (item.status == true ? 'checked' : '') + '>' +
                                '<span class="switch-label" data-on="Off" data-off="on "></span>' +
                                '<span class="switch-handle"></span>' +
                                '</label>' +
                                '</td>' +
                                '<td>' +
                                '<a href="/finishes/edit/' + item.id + '" data-toggle="tooltip" data-placement="top" title="Edit">' +
                                '<span class="mdi mdi-pencil h4"></span>' +
                                '</a>' +
                                '<a href="/finishes/delete/' + item.id + '" data-toggle="tooltip" data-placement="top" title="Delete">' +
                                '<span class="mdi mdi-delete h4"></span>' +
                                '</a>' +
                                '</td>' +
                                '</tr>';
                            tbody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } // If no category is selected, do nothing
        });
    });
    $(document).ready(function() {
        $('#categorySelectsize').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/filterfinishsize/'+categoryId,
                    type: 'GET',
                    success: function(response) {
                        var tbody = $('#subcategoryList');
                        tbody.empty(); // Clear existing table rows

                        // Loop through the response data and append rows to the table
                        $.each(response, function(index, item) {
                            var row = '<tr>' +
                                '<td>' + item.id + '</td>' +
                                '<td>' + item.category_name + '</td>' +
                                '<td>' + item.category_size + ' MM '  + '</td>' +
                                '<td>' + item.finish + '</td>' +
                                '<td>' +
                                '<label class="switch switch-text switch-primary switch-pill form-control-label">' +
                                '<input type="checkbox" class="toggle-class switch-input form-check-input" data-id="' + item.id + '" data-style="slow" data-on="Out Stock" data-off="In Stock" ' + (item.status == true ? 'checked' : '') + '>' +
                                '<span class="switch-label" data-on="Off" data-off="on "></span>' +
                                '<span class="switch-handle"></span>' +
                                '</label>' +
                                '</td>' +
                                '<td>' +
                                '<a href="/finishes/edit/' + item.id + '" data-toggle="tooltip" data-placement="top" title="Edit">' +
                                '<span class="mdi mdi-pencil h4"></span>' +
                                '</a>' +
                                '<a href="/finishes/delete/' + item.id + '" data-toggle="tooltip" data-placement="top" title="Delete">' +
                                '<span class="mdi mdi-delete h4"></span>' +
                                '</a>' +
                                '</td>' +
                                '</tr>';
                            tbody.append(row);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } // If no category is selected, do nothing
        });
    });
</script>
@endsection


 