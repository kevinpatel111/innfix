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
                        <form class="form-valide" action="{{ isset($breadcrumbpage) ? route('breadcrumbpages.update',['id' => $breadcrumbpage->id]) : route('breadcrumbpages.store') }}" method="post" enctype="multipart/form-data">       
                            @csrf 
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="title">Page Name <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" placeholder="Enter a Name..." value="{{ isset($breadcrumbpage) ? $breadcrumbpage->title : old('title') }}"> 

                                    @if($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
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