@extends('layouts.public')

@section('content-company')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid h-100 position-relative">
            <div class="row g-0">
                <div class="col-xl-4 col-lg-5 d-flex justify-content-center align-items-center ps-10 xxl-ps-6 xl-ps-4 md-ps-4 sm-ps-0 position-relative order-2 order-lg-1"
                    data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div
                        class="vertical-title-center align-items-center justify-content-center flex-shrink-0 w-75px sm-w-50px">
                        <h1 class="title fs-15 alt-font text-dark-gray fw-700 text-uppercase ls-1px text-uppercase d-flex w-auto align-items-center m-0"
                            data-fancy-text='{ "opacity": [0, 1], "translateY": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["Infrastructure"], "duration": 400, "delay": 0, "speed": 50, "easing": "easeOutQuad" }'>
                        </h1>
                    </div>
                    <div class="border-start border-color-extra-medium-gray ps-40px sm-ps-20px position-relative z-index-9">
                        <h2
                            class="text-dark-gray fw-600 alt-font outside-box-right-10 xl-outside-box-right-15 lg-outside-box-right-20 md-me-0 sm-mb-0 ls-minus-3px">
                            Precision Engineered Brass Components for Automotive Applications</h2>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 position-relative one-half-screen order-1 order-lg-2 md-mb-50px">
                    <div class="overflow-hidden position-relative">
                        <div class="w-100"
                            data-anime='{ "effect": "slide", "direction": "lr", "color": "#f7f7f7", "duration": 1000, "delay": 0 }'>
                            <img src="{{ asset('website/assets/images/infrastructure_hero_image.png') }}" alt=""
                                class="w-100 liquid-parallax" data-parallax-liquid="true" data-parallax-position="top"
                                data-parallax-scale="1.05">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-100px pb-100px bg-very-light-gray">
        <div class="container">
            <div class="text-center mb-50px">
                <span class="text-gradient-base-color fs-15 alt-font fw-700 text-uppercase">
                    Our new InnFix website is currently under development.
                    We’re preparing a better digital experience to showcase our precision brass components and manufacturing
                    capabilities.Explore our products, technology, quality standards, and engineering expertise soon.
                    The new InnFix website will be launching shortly.
                </span>
                <h3 class="fw-600 text-dark-gray alt-font ls-minus-2px mt-10px">
                    Coming Soon
                </h3>
            </div>
        </div>
    </section>

@endsection