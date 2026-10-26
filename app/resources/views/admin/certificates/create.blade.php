@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Enter Certificate Details</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($certificate))
                            <form class="form-valide"
                                  action="{{ route('certificates.update', $certificate->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('certificates.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                        @endif
                            @csrf

                            <div class="form-row mb-3">

                                <div class="col-md-12 mb-3">
                                    <label>Certificate Name <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        value="{{ old('name', $certificate->name ?? '') }}"
                                    >
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Certificate Image</label>
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    >

                                    @if(isset($certificate->image))
                                        <img
                                            src="{{ asset('website/adminproduct/certificates/'.$certificate->image) }}"
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
                                {{ isset($certificate) ? 'Update Certificate' : 'Create Certificate' }}
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
