@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Enter Details</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($slider))
                            <form class="form-valide"
                                  action="{{ route('sliders.update', $slider->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('sliders.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                        @endif
                            @csrf

                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label>Slider Title <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        value="{{ old('title', $slider->title ?? '') }}"
                                    >
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Slider Image</label>
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    >

                                    @if(isset($slider->image))
                                        <img
                                            src="{{ asset('website/adminproduct/sliders/'.$slider->image) }}"
                                            height="50"
                                            class="mt-2"
                                        >
                                    @endif

                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ isset($slider) ? 'Update' : 'Submit' }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
