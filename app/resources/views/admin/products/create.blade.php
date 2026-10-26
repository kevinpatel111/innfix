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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Please fix the following:</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form
                                action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @isset($product)
                                    @method('PUT')
                                @endisset

                                {{-- CATEGORY --}}
                                <div class="mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>

                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ isset($product) && $product->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>

                                            @foreach($cat->children as $child)
                                                <option value="{{ $child->id }}" {{ isset($product) && $product->category_id == $child->id ? 'selected' : '' }}>
                                                    └─ {{ $child->name }}
                                                </option>

                                                @foreach($child->children as $sub)
                                                    <option value="{{ $sub->id }}" {{ isset($product) && $product->category_id == $sub->id ? 'selected' : '' }}>
                                                        └── {{ $sub->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- NAME --}}
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $product->name ?? '') }}" required>
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- YOUTUBE --}}
                                <div class="mb-3">
                                    <label>YouTube Link</label>
                                    <input type="text" name="youtube_link" class="form-control"
                                        value="{{ old('youtube_link', $product->youtube_link ?? '') }}">
                                    @error('youtube_link')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                               <div class="mb-3">
                                    <label>Product Short Description</label>
                                    <input  type="text" name="short_description" class="form-control" value="{{ old('short_description', $product->short_description ?? '') }}" >

                                    @error('short_description')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- product_descripion --}}
                                <div class="mb-3">
                                    <label>Product Descripion</label>
                                    <textarea id="editor" name="product_descripion" class="form-control" rows="6">{{ old('product_descripion', $product->product_descripion ?? '') }}</textarea>
                                    @error('product_descripion')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- FEATURES --}}
                                <div class="mb-4">

                                    <label class="mb-3">
                                        Product Features
                                    </label>

                                    <div class="row">

                                        @foreach($features as $feature)

                                            <div class="col-md-4 mb-3">

                                                <label class="feature-box">

                                                    <input type="checkbox" name="features[]" value="{{ $feature->id }}" {{ isset($product) && isset($product) && optional($product->features)->contains($feature->id) ? 'checked' : '' }}>

                                                    <div class="feature-inner">

                                                        <img src="{{ asset('uploads/features/' . $feature->image) }}" alt="" width="50">

                                                        <span>
                                                            {{ $feature->title }}
                                                        </span>

                                                    </div>

                                                </label>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                                {{-- MAIN IMAGE --}}
                                <div class="mb-3">
                                    <label>Main Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- GALLERY --}}
                                <div class="mb-3">
                                    <label>Gallery Images</label>
                                    <input type="file" name="gallery[]" class="form-control" multiple>
                                    @error('gallery.*')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>


                                <button class="btn btn-primary">
                                    {{ isset($product) ? 'Update Product' : 'Create Product' }}
                                </button>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log('Editor loaded');
            })
            .catch(error => {
                console.error(error);
            });
    </script>

@endsection
