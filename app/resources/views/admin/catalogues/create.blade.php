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
                                action="{{ isset($catalogue) ? route('catalogues.update', ['id' => $catalogue->id]) : route('catalogues.store') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row mb-3">

                                    <div class="col-md-12 mb-3">
                                        <label for="name">Name <span class="text-danger">*</span></label>

                                        <input type="text"
                                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                            id="name" placeholder="Enter a product name..."
                                            value="{{ isset($catalogue) ? $catalogue->name : old('name') }}">

                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>


                                    <div class="col-md-12 mb-3">
                                        <label for="image">Catalogue Image <span class="text-danger">*</span></label>

                                        <div class="input-group mb-3">
                                            <input type="file" name="image"
                                                class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                id="image"
                                                value="{{ isset($catalogue) ? $catalogue->image : old('image') }}"
                                                @if(!isset($image)) @endif>

                                            @if(isset($catalogue->image))
                                                <img src="{{asset('website/adminproduct/catalogues/' . $catalogue->image)}}"
                                                    height="50px" width="50px">
                                            @endif

                                            @if($errors->has('image'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('image') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="catalogue">Catalogue Pdf <span class="text-danger">*</span></label>

                                        <div class="input-group mb-3">
                                            <input type="file" name="catalogue"
                                                class="form-control {{ $errors->has('catalogue') ? ' is-invalid' : '' }}"
                                                id="catalogue"
                                                value="{{ isset($catalogue) ? $catalogue->catalogue : old('catalogue') }}"
                                                @if(!isset($catalogue)) @endif>

                                            @if(isset($catalogue->catalogue))
                                                <a href="{{ asset('website/adminproduct/catalogues/' . $catalogue->catalogue) }}"
                                                    target="_blank" data-toggle="tooltip" data-placement="top" title="eye">
                                                    <i class="mdi mdi-download h4" style="font-size:40px;"></i>
                                                </a>
                                            @endif

                                            @if($errors->has('catalogue'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('catalogue') }}
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        $(document).ready(function () {
            $('#category_name').on('change', function () {
                var catID = $(this).val();
                if (catID) {
                    $.ajax({
                        url: '/finishWithCatID/' + catID,
                        type: "post",
                        data: { "_token": "{{ csrf_token() }}" },
                        dataType: "json",
                        success: function (data) {
                            //console.log(data);


                            if (data) {
                                $('#category_size').empty();
                                $('#category_size').focus;
                                $('#category_size').append('<option value="">-- Select Size --</option>');

                                $.each(data, function (key, value) {
                                    $('select[name="category_size"]').append('<option value="' + value.id + '">' + value.size + 'MM' + '</option>');

                                });
                            } else {
                                $('#category_size').empty();
                            }

                        }
                    });
                } else {
                    $('#category_size').empty();
                }
            });

        });


    </script>
@endsection