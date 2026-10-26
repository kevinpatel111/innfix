@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <div class="content">

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Social Links</h2>
                    </div>

                    <div class="card-body">

                        @if(isset($social))
                            <form class="form-valide"
                                  action="{{ route('socials.update', $social->id) }}"
                                  method="POST">
                                @method('PUT')
                        @else
                            <form class="form-valide"
                                  action="{{ route('socials.store') }}"
                                  method="POST">
                        @endif
                            @csrf

                            <div class="form-row mb-3">

                                <div class="col-md-12 mb-3">
                                    <label>Instagram</label>
                                    <input type="text"
                                           name="instagram"
                                           class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}"
                                           placeholder="Instagram link"
                                           value="{{ old('instagram', $social->instagram ?? '') }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Facebook</label>
                                    <input type="text"
                                           name="facebook"
                                           class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
                                           placeholder="Facebook link"
                                           value="{{ old('facebook', $social->facebook ?? '') }}">
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Twitter</label>
                                    <input type="text"
                                           name="twitter"
                                           class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}"
                                           placeholder="Twitter link"
                                           value="{{ old('twitter', $social->twitter ?? '') }}">
                                    @error('twitter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>You Tube</label>
                                    <input type="text"
                                           name="youtube"
                                           class="form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}"
                                           placeholder="You Tube link"
                                           value="{{ old('youtube', $social->youtube ?? '') }}">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Pinterest</label>
                                    <input type="text"
                                           name="pinterest"
                                           class="form-control {{ $errors->has('pinterest') ? 'is-invalid' : '' }}"
                                           placeholder="Pinterest link"
                                           value="{{ old('pinterest', $social->pinterest ?? '') }}">
                                    @error('pinterest')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>LinkedIn</label>
                                    <input type="text"
                                           name="linkedin"
                                           class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}"
                                           placeholder="LinkedIn link"
                                           value="{{ old('linkedin', $social->linkedin ?? '') }}">
                                    @error('linkedin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <button class="btn btn-primary" type="submit">
                                {{ isset($social) ? 'Update Social Links' : 'Save Social Links' }}
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
