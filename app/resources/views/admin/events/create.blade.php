@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Enter Event Details</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($event))
                            <form class="form-valide"
                                  action="{{ route('events.update', $event->id) }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('events.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                        @endif
                            @csrf

                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label>Event Title <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        value="{{ old('title', $event->title ?? '') }}"
                                    >
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Event Image</label>
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                                    >

                                    @if(isset($event->image))
                                        <img
                                            src="{{ asset('website/adminproduct/events/'.$event->image) }}"
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
                                {{ isset($event) ? 'Update Event' : 'Create Event' }}
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
