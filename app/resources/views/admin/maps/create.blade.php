@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Map</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($map))
                            <form class="form-valide"
                                  action="{{ route('maps.update', $map->id) }}"
                                  method="POST">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('maps.store') }}"
                                  method="POST">
                        @endif
                            @csrf

                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label>Map Embed Link <span class="text-danger">*</span></label>

                                    <input
                                        type="text"
                                        name="map"
                                        class="form-control {{ $errors->has('map') ? 'is-invalid' : '' }}"
                                        placeholder="Enter map embed link..."
                                        value="{{ old('map', $map->map ?? '') }}"
                                    >

                                    @error('map')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ isset($map) ? 'Update Map' : 'Save Map' }}
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
