@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Enter Product Details</h2>
                        </div>

                        <div class="card-body">

                            @if(isset($homeproduct))
                                <form class="form-valide" action="{{ route('homeproducts.update', $homeproduct->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                            @else
                                    <form class="form-valide" action="{{ route('homeproducts.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                @endif
                                    @csrf

                                    <div class="form-row mb-3">
                                        <div class="col-md-12 mb-3">
                                            <label>Product Title <span class="text-danger">*</span></label>
                                            <input type="text" name="title"
                                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                                value="{{ old('title', $homeproduct->title ?? '') }}">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Product Description <span class="text-danger">*</span></label>
                                            <textarea name="description"
                                                class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description', $homeproduct->description ?? '') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Product Link <span class="text-danger">*</span></label>
                                            <input type="text" name="product_link"
                                                class="form-control {{ $errors->has('product_link') ? 'is-invalid' : '' }}"
                                                value="{{ old('product_link', $homeproduct->product_link ?? '') }}">
                                            @error('product_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label>Product Image</label>
                                            <input type="file" name="image"
                                                class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}">

                                            @if(isset($homeproduct->image))
                                                <img src="{{ asset('website/adminproduct/homeproducts/' . $homeproduct->image) }}"
                                                    height="50" class="mt-2">
                                            @endif

                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">
                                        {{ isset($homeproduct) ? 'Update Product' : 'Create Product' }}
                                    </button>
                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection