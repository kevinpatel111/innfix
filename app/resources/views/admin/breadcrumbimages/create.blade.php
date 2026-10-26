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
                        <form class="form-valide" action="{{ isset($breadcrumbimage) ? route('breadcrumbimages.update',['id' => $breadcrumbimage->id]) : route('breadcrumbimages.store') }}" method="post" enctype="multipart/form-data">       
                            @csrf 
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="title">Select Page Name <span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('breadcrumb_name') ? ' is-invalid' : '' }}" id="breadcrumb_name" name="breadcrumb_name" value="{{isset($breadcrumbimage) ? $breadcrumbimage->breadcrumb_name : old('breadcrumb_name') }}">
                                        <option value="">Select Page</option>
                                        @foreach ($breadcrumbpages as $user)
                                            @if(isset($user))
                                                <option value="{{ $user->id }}" @if(isset($breadcrumbimage) && $breadcrumbimage->breadcrumb_name == $user->id ) selected @endif>{{ $user->title }}</option>
                                             @else 
                                            @endif
                                        @endforeach
                                    </select>

                                    @if($errors->has('breadcrumb_name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('breadcrumb_name') }}
                                        </div> 
                                    @endif
                                </div> 
 

                            <div class="col-md-12 mb-3">
                                <label for="image">Page Image <span class="text-danger">*</span></label>

                                <div class="input-group mb-3">
                                    <input type="file" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" value="{{ isset($breadcrumbimage) ? $breadcrumbimage->image : old('image') }}" @if(!isset($image))  @endif>

                                    @if(isset($breadcrumbimage->image))
                                        <img src="{{asset('website/adminproduct/breadcrumbimages/'.$breadcrumbimage->image)}}" height="50px" width="50px">
                                    @endif

                                    @if($errors->has('image'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('image') }}
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



@endsection