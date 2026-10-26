@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Phone Number</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($phone))
                            <form class="form-valide"
                                  action="{{ route('phones.update', $phone->id) }}"
                                  method="POST">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('phones.store') }}"
                                  method="POST">
                        @endif
                            @csrf

                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label>Phone Number <span class="text-danger">*</span></label>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        placeholder="Enter phone number..."
                                        value="{{ old('phone', $phone->phone ?? '') }}"
                                    >

                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ isset($phone) ? 'Update Phone' : 'Save Phone' }}
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
