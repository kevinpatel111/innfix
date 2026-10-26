@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Email Details</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($email))
                            <form class="form-valide"
                                  action="{{ route('emails.update', $email->id) }}"
                                  method="POST">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('emails.store') }}"
                                  method="POST">
                        @endif
                            @csrf

                            <div class="form-row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label>Email <span class="text-danger">*</span></label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        placeholder="Enter email..."
                                        value="{{ old('email', $email->email ?? '') }}"
                                    >

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ isset($email) ? 'Update Email' : 'Save Email' }}
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
