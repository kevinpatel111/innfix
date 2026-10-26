@extends('layouts.public')

@section('content-company')

    <section class=" position-relative overflow-hidden">
        <div class="container-fluid  h-100 position-relative">
            <div class="row g-0">
                <div class="col-xl-4 col-lg-5 d-flex justify-content-center align-items-center ps-10 xxl-ps-6 xl-ps-4 md-ps-4 sm-ps-0 position-relative order-2 order-lg-1"
                    data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div
                        class="vertical-title-center align-items-center justify-content-center flex-shrink-0 w-75px sm-w-50px">
                        <h1 class="title fs-15 alt-font text-dark-gray fw-700 text-uppercase ls-1px text-uppercase d-flex w-auto align-items-center m-0"
                            data-fancy-text='{ "opacity": [0, 1], "translateY": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["Brass Auto Components"], "duration": 400, "delay": 0, "speed": 50, "easing": "easeOutQuad" }'>
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
                            <img src="{{ asset('website/assets/images/brass_products_hero.png') }}" alt=""
                                class="w-100 liquid-parallax" data-parallax-liquid="true" data-parallax-position="top"
                                data-parallax-scale="1.05">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-100px pb-100px">
        <div class="container">
            <div class="row align-items-center">
                <!-- Product Images -->
                <div class="col-lg-6 mb-40px">
                    <div class="swiper product-image-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('website/assets/images/scrolling-effects.jpg') }}"
                                    class="w-100 border-radius-5px" alt="Brass Auto Set Screw">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('website/assets/images/services-box.jpg') }}"
                                    class="w-100 border-radius-5px" alt="Brass Components">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('website/assets/images/modal-vimeo-video.jpg') }}"
                                    class="w-100 border-radius-5px" alt="Precision Brass Parts">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('website/assets/images/sliding-box.jpg') }}"
                                    class="w-100 border-radius-5px" alt="CNC Brass Components">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Content -->
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="mb-10px">
                        <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>

                        <span class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase">
                            Product Details
                        </span>
                    </div>
                    <h3 class="fw-600 text-dark-gray mb-20px ls-minus-2px alt-font">
                        Brass Auto Set Screw
                    </h3>
                    <p class="mb-25px">
                        Innfix manufactures high-quality Brass Auto Set Screws and customized automotive brass components
                        using advanced CNC machining technology. Our components are designed for excellent dimensional
                        accuracy, durability, and reliable performance in automotive and industrial applications. With
                        modern manufacturing facilities and strict quality control processes, we deliver
                        precision-engineered brass parts according to customer drawings, specifications, and international
                        standards.
                    </p>
                    <ul class="list-style-04 ps-0 mb-30px">
                        <li>High dimensional accuracy</li>
                        <li>Excellent surface finish</li>
                        <li>Customized sizes available</li>
                        <li>Suitable for OEM applications</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn btn-large btn-dark-gray btn-box-shadow btn-rounded">
                        Request A Quote
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-100px pb-100px bg-very-light-gray">
        <div class="container">
            <div class="text-center mb-50px">
                <span class="text-gradient-base-color fs-15 alt-font fw-700 text-uppercase">
                    Technical Specification
                </span>
                <h3 class="fw-600 text-dark-gray alt-font ls-minus-2px mt-10px">
                    Product Specifications
                </h3>
            </div>
            <div class="table-responsive">
               
            </div>
        </div>
    </section>
    <section class="pt-100px pb-100px">
        <div class="container">
            <div class="text-center mb-50px">
                <span class="text-gradient-base-color fs-15 alt-font fw-700 text-uppercase">
                    Applications
                </span>
                <h3 class="fw-600 text-dark-gray alt-font">
                    Industries We Serve
                </h3>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="text-center p-30px border-radius-5px border transition box-shadow-hover">
                        <img src="{{ asset('website/assets/images/car-manufacturing.png') }}" width="60" alt="Automotive"
                            class="mb-15px" style="width:60px; height:60px; object-fit:contain;">
                        <h5 class="fw-600 text-dark-gray mb-0 fs-18">Automotive</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center p-30px border-radius-5px border transition box-shadow-hover">
                        <img src="{{ asset('website/assets/images/electrical-panel.png') }}" width="60" alt="Electrical"
                            class="mb-15px" style="width:60px; height:60px; object-fit:contain;">
                        <h5 class="fw-600 text-dark-gray mb-0 fs-18">Electrical</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center p-30px border-radius-5px border transition box-shadow-hover">
                        <img src="{{ asset('website/assets/images/car-engine.png') }}" width="60" alt="Engineering"
                            class="mb-15px" style="width:60px; height:60px; object-fit:contain;">
                        <h5 class="fw-600 text-dark-gray mb-0 fs-18">Engineering</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center p-30px border-radius-5px border transition box-shadow-hover">
                        <img src="{{ asset('website/assets/images/electric-factory.png') }}" width="60" alt="Industrial"
                            class="mb-15px" style="width:60px; height:60px; object-fit:contain;">
                        <h5 class="fw-600 text-dark-gray mb-0 fs-18">Industrial</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection