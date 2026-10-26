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
                        <form class="form-valide" action="{{ isset($packing) ? route('packings.update',['id' => $packing->id]) : route('packings.store') }}" method="post" enctype="multipart/form-data">       
                            @csrf 
                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label for="name">Pdf Name <span class="text-danger">*</span></label>

                                    <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" placeholder="Enter a name..." value="{{ isset($packing) ? $packing->name : old('name') }}"> 

                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div> 
                                    @endif
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="pdf">Pdf <span class="text-danger">*</span></label>

                                    <div class="input-group mb-3">
                                        <input type="file" name="pdf" class="form-control {{ $errors->has('pdf') ? ' is-invalid' : '' }}" id="pdf" value="{{ isset($packing) ? $packing->pdf : old('pdf') }}" @if(!isset($packing))  @endif>

                                        @if(isset($packing->pdf))
                                            <a href="{{ asset('website/adminproduct/packings/'.$packing->pdf) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="eye">
                                                <i class="mdi mdi-download h4" style="font-size:40px;"></i> 
                                            </a>
                                        @endif

                                        @if($errors->has('image'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('image') }}
                                            </div> 
                                        @endif
                                    </div>  
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