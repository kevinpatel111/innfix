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
                       <form method="POST"
      action="{{ isset($subcategory) ? route('subcategories.update',$subcategory->id) : route('subcategories.store') }}"
      enctype="multipart/form-data">
    @csrf
    @isset($subcategory)
        @method('PUT')
    @endisset

    {{-- CATEGORY --}}
    <div class="mb-3">
        <label>Category</label>
        <select name="category_name" class="form-control" required>
            <option value="">Select</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ isset($subcategory) && $subcategory->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- TITLE --}}
    <div class="mb-3">
        <label>Subcategory Title</label>
        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title',$subcategory->title ?? '') }}"
               required>
    </div>

    {{-- SHORT DESCRIPTION --}}
    <div class="mb-3">
        <label>Short Description</label>
        <textarea name="short_description"
                  class="form-control"
                  rows="3">{{ old('short_description',$subcategory->short_description ?? '') }}</textarea>
    </div>

    {{-- IMAGE --}}
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">

        @if(isset($subcategory) && $subcategory->image)
            <img src="{{ asset('website/adminproduct/subcategories/'.$subcategory->image) }}"
                 height="60"
                 class="mt-2">
        @endif
    </div>

    <button class="btn btn-primary">
        {{ isset($subcategory) ? 'Update' : 'Create' }}
    </button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 



@endsection