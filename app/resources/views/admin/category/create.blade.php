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
                     <form
    action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf
    @isset($category)
        @method('PUT')
    @endisset

    {{-- CATEGORY NAME --}}
    <div class="mb-3">
        <label>Category Name <span class="text-danger">*</span></label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $category->name ?? '') }}"
               required>
    </div>

    {{-- PARENT CATEGORY --}}
    <div class="mb-3">
        <label>Parent Category</label>
        <select name="parent_id" class="form-control">
            <option value="">— Main Category —</option>

            @foreach($categories as $parent)
                <option value="{{ $parent->id }}"
                    {{ isset($category) && $category->parent_id == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>

                {{-- Child preview (optional visual clarity) --}}
                @foreach($parent->children as $child)
                    <option value="{{ $child->id }}"
                        {{ isset($category) && $category->parent_id == $child->id ? 'selected' : '' }}>
                        └─ {{ $child->name }}
                    </option>
                @endforeach
            @endforeach
        </select>
    </div>

    {{-- IMAGE --}}
    <div class="mb-3">
        <label>Category Image</label>
        <input type="file" name="image" class="form-control">

        @if(isset($category) && $category->image)
            <img src="{{ asset('website/adminproduct/categories/'.$category->image) }}"
                 height="60"
                 class="mt-2">
        @endif
    </div>

    <button class="btn btn-primary">
        {{ isset($category) ? 'Update Category' : 'Create Category' }}
    </button>
</form>


                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> 



@endsection