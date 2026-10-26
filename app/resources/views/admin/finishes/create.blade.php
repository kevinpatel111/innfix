@extends('layouts.admin')

@section('content')


<div class="content-wrapper">
    <div class="content">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Enter a Details</h2>
                    </div>

                    <div class="card-body">
                        <form class="form-valide" action="{{ isset($finish) ? route('finishes.update',['id' => $finish->id]) : route('finishes.store') }}" method="post" enctype="multipart/form-data">       
                            @csrf 
                            <div class="form-row mb-3">

                                <div class="col-md-12 mb-3">
                                    <label for="title">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('category_name') ? ' is-invalid' : '' }}" id="category_name" name="category_name" value="{{isset($finish) ? $finish->category_name : old('category_name') }}">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $user)
                                            @if(isset($user))
                                                <option value="{{ $user->id }}" @if(isset($finish) && $finish->category_name == $user->id ) selected @endif>{{ $user->name }}</option>                                            
                                            @else
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('category_name') }}
                                        </div> 
                                    @endif
                                </div> 

                                <div class="col-md-12 mb-3">
                                    <label for="title">Select Size <span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('category_size') ? ' is-invalid' : '' }}" id="category_size" name="category_size" value="{{isset($finish) ? $finish->category_size : old('category_size') }}">
                                        <option value="">Select Size</option>
                                        @foreach ($subcategories as $user)
                                            @if(isset($user))
                                                <option value="{{ $user->id }}" @if(isset($finish) && $finish->category_size == $user->id ) selected @endif>{{ $user->size }}</option>                                            
                                            @else
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_size'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('category_size') }}
                                        </div> 
                                    @endif
                                </div> 

                                <div class="col-md-12 mb-3">
                                    <label for="finish">Finish <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control {{ $errors->has('finish') ? ' is-invalid' : '' }}" name="finish" id="finish" placeholder="Enter a finish..." value="{{ isset($finish) ? $finish->finish : old('finish') }}"> 

                                    @if($errors->has('finish'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('finish') }}
                                        </div> 
                                    @endif
                                </div>
 
                            </div>
 

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>  
     $(document).ready(function() {
      $('#category_name').on('change', function() {
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
              $('#category_size').empty();
              $('#category_size').focus;
              $('#category_size').append('<option value="">-- Select Size --</option>'); 

              $.each(data, function(key, value){
              $('select[name="category_size"]').append('<option value="'+ value.id +'">' + value.size + 'MM' + '</option>');

              });
            }else{
              $('#category_size').empty();
            }

          }
          });
        }else{
        $('#category_size').empty();
        }
      });

    });

  
</script>
@endsection