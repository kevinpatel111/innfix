@extends('layouts.admin')

@section('content')

<style>

.feature-preview{
    width:120px;
    height:120px;
    border-radius:16px;
    object-fit:cover;
    border:1px solid #e5e5e5;
    background:#f8f8f8;
    padding:10px;
}

.upload-box{
    border:2px dashed #dcdcdc;
    border-radius:16px;
    padding:30px;
    text-align:center;
    cursor:pointer;
    transition:.3s;
    background:#fafafa;
}

.upload-box:hover{
    border-color:#1ca084;
    background:#f4fffc;
}

.upload-box input{
    display:none;
}

.upload-icon{
    font-size:40px;
    margin-bottom:10px;
    color:#1ca084;
}

.card{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.card-header{
    background:#fff;
    padding:25px 30px;
}

.card-body{
    padding:30px;
}

.form-control{
    height:52px;
    border-radius:12px;
}

.btn-primary{
    height:50px;
    padding:0 30px;
    border-radius:12px;
    background:#1ca084;
    border:none;
}

.btn-primary:hover{
    background:#168f77;
}

.status-switch{
    display:flex;
    align-items:center;
    gap:10px;
}

</style>

<div class="content-wrapper">

    <div class="content">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card">

                    <div class="card-header card-header-border-bottom">

                        <h2>
                            {{ isset($feature) ? 'Edit Feature' : 'Create Feature' }}
                        </h2>

                    </div>

                    <div class="card-body">

                        @if(isset($feature))

                            <form
                                action="{{ route('features.update',$feature->id) }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                                @method('PUT')

                        @else

                            <form
                                action="{{ route('features.store') }}"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                        @endif

                            @csrf

                            {{-- TITLE --}}

                            <div class="mb-4">

                                <label class="mb-2">
                                    Feature Title
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title',$feature->title ?? '') }}"
                                    placeholder="Enter feature title"
                                >

                                @error('title')

                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                            {{-- IMAGE --}}

                            <div class="mb-4">

                                <label class="mb-3">
                                    Feature Image
                                </label>

                                <label class="upload-box w-100">

                                    <input
                                        type="file"
                                        name="image"
                                        id="imageInput"
                                    >

                                    <div class="upload-icon">
                                        <i class="mdi mdi-cloud-upload"></i>
                                    </div>

                                    <h5>
                                        Click to Upload Image
                                    </h5>

                                    <p class="text-muted mb-0">
                                        PNG, JPG, WEBP
                                    </p>

                                </label>

                                @error('image')

                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>

                                @enderror

                            </div>

                            {{-- PREVIEW --}}

                            <div class="mb-4">

                                <img
                                    id="previewImage"

                                    src="
                                    @if(isset($feature->image))
                                        {{ asset('uploads/features/'.$feature->image) }}
                                    @else
                                        https://placehold.co/120x120?text=Preview
                                    @endif
                                    "

                                    class="feature-preview"
                                >

                            </div>

                            {{-- STATUS --}}

                            <div class="mb-5">

                                <div class="status-switch">

                                    <input
                                        type="checkbox"
                                        name="status"
                                        value="1"

                                        {{ isset($feature) && $feature->status ? 'checked' : '' }}
                                    >

                                    <label class="mb-0">
                                        Active Feature
                                    </label>

                                </div>

                            </div>

                            {{-- BUTTON --}}

                            <button class="btn btn-primary">

                                {{ isset($feature) ? 'Update Feature' : 'Create Feature' }}

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

document
    .getElementById('imageInput')
    ?.addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){

            const reader = new FileReader();

            reader.onload = function(event){

                document
                    .getElementById('previewImage')
                    .src = event.target.result;
            }

            reader.readAsDataURL(file);
        }
    });

</script>

@endsection