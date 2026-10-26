@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Address Details</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($address))
                            <form class="form-valide"
                                  action="{{ route('addresses.update', $address->id) }}"
                                  method="POST">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('addresses.store') }}"
                                  method="POST">
                        @endif
                            @csrf

                            <div class="form-row mb-3">

                                <!-- Title -->
                                <div class="col-md-12 mb-3">
                                    <label>Address Title <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        value="{{ old('title', $address->title ?? '') }}"
                                    >
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <textarea
                                        name="description"
                                        rows="3"
                                        class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    >{{ old('description', $address->description ?? '') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ isset($address) ? 'Update Address' : 'Save Address' }}
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
