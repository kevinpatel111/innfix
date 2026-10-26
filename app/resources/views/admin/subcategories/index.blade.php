@extends('layouts.admin')

@section('content')


 

<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2>Sub Category List</h2>
                    </div>
                    <div class="card-header card-header-border-bottom d-block justify-content-between">  
                        <div class="row align-items-center">
                            <div class="col-12 col-md-4">
                                <h2>Apply Filter</h2>
                            </div>
                            <div class="col-12 col-md-4">
                                <form id="categoryForm">
                                    <div class="form-group mb-0">
                                        <select class="form-control" id="categorySelect" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
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
                                <a href="{{ route('subcategories.create') }}" class="ladda-button btn btn-primary btn-square btn-ladda" title="View">Create Sub Category</a>
                            </div>
                          </div>

                          

                        <div class="hoverable-data-table" >
                            <table id="hoverable-data-table" class="table table-bordered table-hover table-striped text-center nowrap" style="width:100%; margin-top: 0px!important;">
                                <thead>
                                    <tr>
                                        <th class="sorting_asc1">@sortablelink('id')</th>
                                        <th>@sortablelink('category_name','Category Name')</th>
                                        <th>@sortablelink('title', 'Title')</th>
                                        <th>Short Description </th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="subcategoryList">
                                    @foreach ($subcategories as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->category?->name ?? 'No Category' }}</td>
                                        <td>{{ $user->title }} MM</td>
                                        <td>{{ $user->short_description }}</td>
                                        <td>
                                            <img src="{{ asset('website/adminproduct/subcategories/'.$user->image) }}" height="30px" width="70px">
                                        </td>
                                       
                                        <td>   
                                            <label class="switch switch-text switch-primary switch-pill form-control-label">
                                                <input type="checkbox" class="toggle-class switch-input form-check-input" data-id="{{ $user->id }}" data-style="slow" data-on="Out Stock" data-off="In Stock" {{ $user->status == true ? 'checked' : ''}}>
                                                <span class="switch-label" data-on="Off" data-off="on "></span>
                                                <span class="switch-handle"></span>
                                            </label> 
                                        </td>
                                        <td>
                                            <a href="{{ route('subcategories.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <span class="mdi mdi-pencil h4"></span>
                                            </a>
                                            <form action="{{ route('subcategories.destroy', $user->id) }}"
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
                                    {{-- {!! $subcategories->links() !!} --}}
                                    {!! $subcategories->appends(\Request::except('page'))->render() !!}
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
<script>
    $(document).ready(function() {
        $('#categorySelect').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: '/filtersubcategoriessize/'+categoryId,
                    type: 'GET',
                    success: function(response) {
                        var tbody = $('#subcategoryList');
                        tbody.empty(); // Clear existing table rows

                        // Loop through the response data and append rows to the table
                        $.each(response, function(index, item) {
                            var row = '<tr>' +
                                '<td>' + item.id + '</td>' +
                                '<td>' + item.category.name + '</td>' +
                                '<td>' + item.size + '</td>' +
                                '<td>' + item.thickness + '</td>' +
                                '<td>' + item.tilesbox + '</td>' +
                                '<td>' + item.areabox + '</td>' +
                                '<td>' + item.application + '</td>' +
                                '<td><img src="' + '{{ asset('website/adminproduct/subcategories/') }}' + '/' + item.image + '" height="30px" width="70px"></td>'+
                                
                                '<td>' +
                                '<label class="switch switch-text switch-primary switch-pill form-control-label">' +
                                '<input type="checkbox" class="toggle-class switch-input form-check-input" data-id="' + item.id + '" data-style="slow" data-on="Out Stock" data-off="In Stock" ' + (item.status == true ? 'checked' : '') + '>' +
                                '<span class="switch-label" data-on="Off" data-off="on "></span>' +
                                '<span class="switch-handle"></span>' +
                                '</label>' +
                                '</td>' +
                                '<td>' +
                                '<a href="/subcategories/edit/' + item.id + '" data-toggle="tooltip" data-placement="top" title="Edit">' +
                                '<span class="mdi mdi-pencil h4"></span>' +
                                '</a>' +
                                '<a href="/subcategories/delete/' + item.id + '" data-toggle="tooltip" data-placement="top" title="Delete">' +
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


 