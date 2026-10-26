@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="card">

            <div class="card-header">
                <h3>
                    {{ isset($blog) ? 'Edit Blog' : 'Create Blog' }}
                </h3>
            </div>

            <div class="card-body">

                <form action="{{ isset($blog) ? route('blogs.update', $blog->id) : route('blogs.store') }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    @if(isset($blog))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label>Title</label>

                        <input type="text" name="title" class="form-control" value="{{ $blog->title ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Main Image</label>

                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Gallery Images</label>

                        <input type="file" name="gallery[]" multiple class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>

                        <textarea id="editor" name="description">
        {{ old('description', $blog->description ?? '') }}
        </textarea>
                    </div>

                    <div class="mb-3">
                        <label>Meta Title</label>

                        <input type="text" name="meta_title" class="form-control" value="{{ $blog->meta_title ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label>Meta Description</label>

                        <textarea name="meta_description"
                            class="form-control">{{ $blog->meta_description ?? '' }}</textarea>
                    </div>

                    <button class="btn btn-primary">
                        Save Blog
                    </button>

                </form>

            </div>

        </div>

    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {

                ckfinder: {
                    uploadUrl: "{{ route('blogs.upload') }}?_token={{ csrf_token() }}"
                }

            })
            .then(editor => {
                console.log('Editor loaded');
            })
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection