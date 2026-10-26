@extends('layouts.public')

@section('content-company')

    <!-- start banner -->
    <section class="p-0 full-screen ipad-top-space-margin position-relative overflow-hidden md-h-auto">
        <div class="container-fluid p-0 h-100 position-relative">
            <div class="row h-100 g-0">
                <div
                    class="col-xl-5 col-lg-6 d-flex justify-content-center flex-column  xl-ps-2 md-ps-0 position-relative order-2 order-lg-1">
                    <div
                        class="vertical-title-center align-items-center w-75px justify-content-center position-absolute h-auto d-none d-md-flex">
                        <div class="title fs-16 alt-font text-dark-gray fw-700 text-uppercase ls-05px text-uppercase"
                            data-fancy-text='{ "opacity": [0, 1], "translateY": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["precision engineering solutions"], "duration": 400, "delay": 0, "speed": 50, "easing": "easeOutQuad" }'>
                        </div>
                    </div>
                    <div class="border-start border-color-extra-medium-gray ps-60px ms-65px lg-ps-30px lg-ms-70px position-relative z-index-9 sm-ps-30px sm-pe-30px sm-ms-0 border-0"
                        data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1
                            class="text-dark-gray fw-600 alt-font  ls-minus-4px sm-ls-minus-2px md-me-0">
                            Precision Brass Components For Industries.
                        </h1>
                        <p class="w-75 mb-35px lg-w-90 sm-w-100">Manufacturing high-quality brass precision components with
                            advanced technology, accuracy, and reliable solutions for various industries.</p>
                        <a href="#" class="btn btn-extra-large btn-gradient-fuel-yellow-blue fw-400">
                            <span>
                                <span class="btn-double-text" data-text="Explore More">Explore More</span>
                                <span><i class="feather icon-feather-arrow-right"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
                <div
                    class="col-xl-7 col-lg-6 position-relative swiper-number-pagination-progress md-h-500px order-1 order-lg-2 md-mb-50px">
                    <div class="swiper h-100 banner-slider magic-cursor drag-cursor"
                        data-slider-options='{ "slidesPerView": 1, "loop": true, "pagination": { "el": ".swiper-number-line-pagination", "clickable": true }, "navigation": { "nextEl": ".slider-one-slide-next-1", "prevEl": ".slider-one-slide-prev-1" }, "autoplay": { "delay": 4000, "stopOnLastSlide": true, "disableOnInteraction": false },"keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "fade" }'
                        data-swiper-number-pagination-progress="true">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="position-absolute left-0px top-0px w-100 h-100 cover-background background-position-center-top"
                                    style="background-image:url({{ asset('website/assets/images/hero_image_03.png') }});"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="position-absolute left-0px top-0px w-100 h-100 cover-background background-position-center-top"
                                    style="background-image:url({{ asset('website/assets/images/hero_image_05.png') }});"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="position-absolute left-0px top-0px w-100 h-100 cover-background background-position-center-top"
                                    style="background-image:url({{ asset('website/assets/images/hero_image_06.png') }});"></div>
                            </div>
                        </div>
                        <div
                            class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets d-block d-sm-none">
                        </div>
                    </div>
                    <div
                        class="swiper-pagination-wrapper d-none d-lg-flex align-items-center justify-content-center position-absolute md-bottom-30px sm-bottom-20px left-minus-45 md-left-30px sm-left-20px z-index-9 pt-3">
                        <div class="number-prev fs-14 fw-600 text-dark-gray"></div>
                        <div class="swiper-pagination-progress bg-extra-medium-gray">
                            <span class="swiper-progress"></span>
                        </div>
                        <div class="number-next fs-14 fw-600 text-dark-gray"></div>
                    </div>
                    <!-- end slider pagination -->
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 position-relative">
                    <div class="row align-items-center position-relative md-mb-15"
                        data-anime='{ "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="col-md-5 sm-mb-30px" data-bottom-top="transform: translateY(50px)"
                            data-top-bottom="transform: translateY(-50px)">
                            <img class="w-100" src="{{ asset('website/assets/images/brass_and_machinery_workshop.png') }}" alt="" />
                        </div>
                        <div class="col-lg-7 col-md-7 sm-mb-30px text-end" data-bottom-top="transform: translateY(-30px)"
                            data-top-bottom="transform: translateY(30px)">
                            <img src="{{ asset('website/assets/images/Industrial_InnFix_complex.png') }}" alt=""
                                class="box-shadow-quadruple-large md-w-100" />
                        </div>
                        <div class="w-50 sm-w-100 overflow-hidden position-absolute sm-position-relative left-140px bottom-minus-200px sm-bottom-0px sm-left-0px p-0 sm-ps-15px sm-pe-15px"
                            data-shadow-animation="true" data-animation-delay="100"
                            data-bottom-top="transform: translateY(20px)" data-top-bottom="transform: translateY(-20px)">
                            <img src="{{ asset('website/assets/images/Industrial_facility_entrance.png') }}" alt=""
                                class="box-shadow-quadruple-large w-100" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 offset-xl-1 md-mt-20 sm-mt-0"
                    data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="mb-10px">
                        <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                        <span
                            class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">About
                            Innfix</span>
                    </div>
                    <h4 class="text-dark-gray alt-font fw-600 ls-minus-2px mb-20px">Delivering precision brass components
                        with quality and reliability.</h4>
                    <p class="w-90 md-w-100 mb-35px sm-mb-20px">Innfix specializes in manufacturing high-quality brass
                        precision components with advanced technology, skilled professionals, and customer-focused
                        solutions.</p>
                    <a href="{{ route('about') }}"
                        class="btn btn-extra-large btn-gradient-fuel-yellow-blue fw-400">
                        <span>
                            <span class="btn-double-text" data-text="Explore details">Explore details</span>
                            <span><i class="feather icon-feather-arrow-right"></i></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="overflow-hidden position-relative pt-0 lg-pb-0">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col swiper swiper-width-auto feather-shadow text-center"
                    data-slider-options='{ "slidesPerView": "auto", "spaceBetween":40, "speed": 20000, "loop": true, "allowTouchMove": false, "autoplay": { "delay":0, "disableOnInteraction": false, "reverseDirection": true }, "effect": "slide" }'>
                    <div class="swiper-wrapper pb-30px marquee-slide">
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div
                                class="fs-130 md-fs-90 sm-fs-70 alt-font text-dark-gray fw-600 ls-minus-6px sm-ls-minus-2px word-break-normal">
                                Precision Brass Components For Industrial Excellence <span class="ms-20px">-</span></div>
                        </div>
                        <!-- end client item -->
                        <!-- start client item -->
                        <div class="swiper-slide">
                            <div
                                class="fs-130 md-fs-90 sm-fs-70 alt-font text-dark-gray fw-600 ls-minus-6px sm-ls-minus-2px word-break-normal">
                                Customized Engineering Solutions With Superior Quality <span class="ms-20px">-</span>
                            </div>
                        </div>
                        <!-- end client item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="stack-box py-0 z-index-99">
        <div class="stack-box-contain">
            <!-- start stack item -->
            <div class="stack-item stack-item-01 bg-white lg-pt-8 lg-pb-8 md-pb-0">
                <div class="stack-item-wrapper">
                    <div class="container-fluid">
                        <div class="row align-items-center full-screen md-h-auto">
                            <div class="col-lg-6 cover-background overflow-visible h-100 md-h-500px"
                                style="background-image: url({{ asset('website/assets/images/brass_CNC_turned.png') }})">
                                <div
                                    class="mix-bland-mode position-absolute right-minus-130px top-60px md-top-auto md-bottom-minus-50px fs-170 lg-fs-120 lg-right-minus-80px md-right-0px md-left-0px text-center text-lg-start alt-font z-index-9 fw-600 text-dark-gray ">
                                    01</div>
                                <div class="position-absolute right-0px bottom-minus-1px">
                                    <div class="vertical-title-center">
                                        <div
                                            class="title fw-700 fs-15 alt-font text-uppercase text-dark-gray bg-white pt-30px pb-30px ps-10px pe-10px">
                                            <span class="d-inline-block">Latest projects</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 ps-12 pe-14 xxl-ps-10 xxl-pe-10 xl-pe-8 lg-ps-6 lg-pe-4 md-p-50px sm-ps-30px sm-pe-30px position-relative align-self-center text-md-start text-center">
                                <div class="mb-15px">
                                    <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                                    <span
                                        class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Our
                                        Products</span>
                                </div>
                                <h1 class="text-dark-gray alt-font fw-600 ls-minus-4px mb-25px">Explore Our Quality
                                    Engineering Components.</h1>
                                <p class="w-95 md-w-100 mb-35px">We manufacture precision brass components with advanced
                                    technology, superior quality, and customized solutions for various industrial
                                    applications.</p>
                                <a href="demo-branding-agency-single-project-slider.html"
                                    class="btn btn-extra-large btn-gradient-fuel-yellow-blue fw-400">
                                    <span>
                                        <span class="btn-double-text" data-text="Explore project">Explore Products</span>
                                        <span><i class="feather icon-feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end stack item -->
            <!-- start stack item -->
            <div class="stack-item stack-item-02 bg-linen md-pt-0 md-pb-0">
                <div class="stack-item-wrapper">
                    <div class="container-fluid">
                        <div class="row align-items-center full-screen md-h-auto">
                            <div class="col-lg-6 cover-background overflow-visible h-100 md-h-500px"
                                style="background-image: url({{ asset('website/assets/images/stainless_steel_components.png') }})">
                                <div
                                    class="mix-bland-mode position-absolute right-minus-130px top-60px md-top-auto md-bottom-minus-50px fs-170 lg-fs-120 lg-right-minus-80px md-right-0px md-left-0px text-center text-lg-start alt-font z-index-9 fw-600 text-dark-gray ">
                                    02</div>
                                <div class="position-absolute right-0px bottom-minus-1px">
                                    <div class="vertical-title-center">
                                        <div
                                            class="title fw-700 fs-15 alt-font text-uppercase text-dark-gray bg-linen pt-30px pb-30px ps-10px pe-10px">
                                            <span class="d-inline-block">Latest Solutions</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 ps-12 pe-14 xxl-ps-10 xxl-pe-10 xl-pe-8 lg-ps-6 lg-pe-4 md-p-50px sm-ps-30px sm-pe-30px position-relative align-self-center text-md-start text-center">
                                <div class="mb-15px">
                                    <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                                    <span
                                        class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Customized
                                        Manufacturing</span>
                                </div>
                                <h1 class="text-dark-gray alt-font fw-600 ls-minus-4px mb-25px">Components As Per Customer
                                    Requirements.</h1>
                                <p class="w-95 md-w-100 mb-35px">We provide customized brass components manufactured
                                    according to customer drawings and specifications with accurate machining and consistent
                                    quality.</p>
                                <a href="demo-branding-agency-single-project-slider.html"
                                    class="btn btn-extra-large btn-gradient-fuel-yellow-blue fw-400">
                                    <span>
                                        <span class="btn-double-text" data-text="Explore project">Explore Products</span>
                                        <span><i class="feather icon-feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end stack item -->
            <!-- start stack item -->
            <div class="stack-item stack-item-03 bg-white lg-pt-8 md-pb-0 md-pt-0">
                <div class="stack-item-wrapper">
                    <div class="container-fluid">
                        <div class="row align-items-center full-screen md-h-auto">
                            <div class="col-lg-6 cover-background overflow-visible h-100 md-h-500px"
                                style="background-image: url({{ asset('website/assets/images/brass_auto_parts.png') }})">
                                <div
                                    class="mix-bland-mode position-absolute right-minus-130px top-60px md-top-auto md-bottom-minus-50px fs-170 lg-fs-120 lg-right-minus-80px md-right-0px md-left-0px text-center text-lg-start alt-font z-index-9 fw-600 text-dark-gray ">
                                    03</div>
                                <div class="position-absolute right-0px bottom-minus-1px">
                                    <div class="vertical-title-center">
                                        <div
                                            class="title fw-700 fs-15 alt-font text-uppercase text-dark-gray bg-white pt-30px pb-30px ps-10px pe-10px">
                                            <span class="d-inline-block">Quality Excellence</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-lg-6 ps-12 pe-14 xxl-ps-10 xxl-pe-10 xl-pe-8 lg-ps-6 lg-pe-4 md-p-50px sm-ps-30px sm-pe-30px sm-pb-0 position-relative align-self-center text-md-start text-center">
                                <div class="mb-15px">
                                    <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                                    <span
                                        class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Precision
                                        Engineering</span>
                                </div>
                                <h1 class="text-dark-gray alt-font fw-600 ls-minus-4px mb-25px">Reliable Components With
                                    Superior Finish.</h1>
                                <p class="w-95 md-w-100 mb-35px">Our advanced manufacturing process ensures high-quality
                                    brass components with excellent accuracy, durability, and performance for various
                                    industries.</p>
                                <a href="demo-branding-agency-single-project-slider.html"
                                    class="btn btn-extra-large btn-gradient-fuel-yellow-blue fw-400">
                                    <span>
                                        <span class="btn-double-text" data-text="Explore project">Explore Products</span>
                                        <span><i class="feather icon-feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end stack item -->
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="pb-1">
        <div class="container">
            <div class="row mb-6">
                <div class="col-xl-5 col-md-6"
                    data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <div class="mb-10px">
                        <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                        <span
                            class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Why
                            Choose Us</span>
                    </div>
                    <h4 class="text-dark-gray alt-font fw-600 w-90 ls-minus-2px">Delivering precision, quality, and reliable
                        brass components for every industry.</h4>
                </div>
                <div class="offset-xl-1 col-xl-5 col-md-6">
                    <div class="accordion accordion-style-02" id="accordion-style-02" data-active-icon="icon-feather-minus"
                        data-inactive-icon="icon-feather-plus"
                        data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <!-- start accordion item -->
                        <div class="accordion-item active-accordion">
                            <div class="accordion-header border-bottom border-color-dark-gray">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-01"
                                    aria-expanded="true" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="feather icon-feather-minus"></i><span
                                            class="fw-600 alt-font fs-18">Advanced Manufacturing</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-01" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion-style-02">
                                <div class="accordion-body last-paragraph-no-margin border-bottom border-color-dark-gray">
                                    <p> We use modern machinery and advanced production techniques to manufacture
                                        high-quality brass components with accurate dimensions and excellent finish.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="accordion-item">
                            <div class="accordion-header border-bottom border-color-dark-gray">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-02"
                                    aria-expanded="false" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="feather icon-feather-plus"></i><span class="fw-600 alt-font fs-18">Quality
                                            Assurance</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-02" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-style-02">
                                <div class="accordion-body last-paragraph-no-margin border-bottom border-color-dark-gray">
                                    <p>Every component undergoes strict quality checks to ensure durability, precision, and
                                        compliance with industry standards.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                        <!-- start accordion item -->
                        <div class="accordion-item">
                            <div class="accordion-header border-bottom border-color-transparent">
                                <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-02-03"
                                    aria-expanded="false" data-bs-parent="#accordion-style-02">
                                    <div class="accordion-title mb-0 position-relative text-dark-gray">
                                        <i class="feather icon-feather-plus"></i><span
                                            class="fw-600 alt-font fs-18">Customer Support</span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-02-03" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-style-02">
                                <div class="accordion-body last-paragraph-no-margin border-bottom border-color-transparent">
                                    <p>We provide reliable support, customized solutions, and timely delivery to meet the
                                        specific requirements of our customers.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion item -->
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 counter-style-04"
                data-anime='{ "el": "childs", "translateX": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <!-- start counter item -->
                <div class="col last-paragraph-no-margin md-mb-30px text-center text-md-start">
                    <span class="alt-font fw-600 d-block mb-5px text-dark-gray fs-18">Years Of Experience</span>
                    <p class="w-90 sm-w-100 sm-ps-15 sm-pe-15">Expertise in manufacturing precision brass components with
                        consistent quality.</p>
                    <div class="separator-line-1px bg-extra-medium-gray w-90 mt-25px mb-25px sm-w-100"></div>
                    <h3 class="vertical-counter d-inline-flex alt-font text-dark-gray fw-700 ls-minus-2px sm-ls-minus-1px sm-mb-0"
                        data-text="+" data-to="25"></h3>
                </div>
                <!-- end counter item -->
                <!-- start counter item -->
                <div class="col last-paragraph-no-margin md-mb-30px text-center text-md-start">
                    <span class="alt-font fw-600 d-block mb-5px text-dark-gray fs-18">Happy Clients</span>
                    <p class="w-90 sm-w-100 sm-ps-15 sm-pe-15">Trusted by customers across multiple industries worldwide
                        with confidence.</p>
                    <div class="separator-line-1px bg-extra-medium-gray w-90 mt-25px mb-25px sm-w-100"></div>
                    <h3 class="vertical-counter d-inline-flex alt-font text-dark-gray fw-700 ls-minus-2px sm-ls-minus-1px sm-mb-0"
                        data-text="+" data-to="500"></h3>
                </div>
                <!-- end counter item -->
                <!-- start counter item -->
                <div class="col last-paragraph-no-margin sm-mb-30px text-center text-md-start">
                    <span class="alt-font fw-600 d-block mb-5px text-dark-gray fs-18">Products Range</span>
                    <p class="w-90 sm-w-100 sm-ps-15 sm-pe-15"> Wide range of brass components designed for industrial
                        applications.</p>
                    <div class="separator-line-1px bg-extra-medium-gray w-90 mt-25px mb-25px sm-w-100"></div>
                    <h3 class="vertical-counter d-inline-flex alt-font text-dark-gray fw-700 ls-minus-2px sm-ls-minus-1px sm-mb-0"
                        data-text="+" data-to="1000"></h3>
                </div>
                <!-- end counter item -->
                <!-- start counter item -->
                <div class="col last-paragraph-no-margin text-center text-md-start">
                    <span class="alt-font fw-600 d-block mb-5px text-dark-gray fs-18"> On Time Delivery</span>
                    <p class="w-90 sm-w-100 sm-ps-15 sm-pe-15">Efficient production and supply chain management for timely
                        delivery.</p>
                    <div class="separator-line-1px bg-extra-medium-gray w-90 mt-25px mb-25px sm-w-100"></div>
                    <h3 class="vertical-counter d-inline-flex alt-font text-dark-gray fw-700 ls-minus-2px sm-ls-minus-1px sm-mb-0"
                        data-text="+" data-to="98"></h3>
                </div>
                <!-- end counter item -->
            </div>
        </div>
    </section>
    <section class="p-0 position-relative">
        <div class="background-position-center-top background-no-repeat position-absolute h-100 w-100 left-0px top-0px"
            style="background-image: url({{ asset('website/assets/images/demo-branding-agency-bg-01.png') }})"></div>
        <div class="container position-relative">
            <div class="row justify-content-center mb-8"
                data-anime='{ "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="col-xl-4 col-md-5">
                    <h2 class="alt-font text-dark-gray mb-30px fw-600 ls-minus-3px">Reliable Industrial Solutions
                    </h2>
                </div>
                <div class="col-xl-6 col-md-7 overflow-hidden offset-xl-2">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- start review item -->
                            <div class="swiper-slide">
                                <h5 class="text-dark-gray mb-15px w-95 xl-w-100 lh-40 ls-minus-1px alt-font">We deliver
                                    <span class="text-decoration-line-bottom-medium fw-700">customized brass
                                        solutions</span>
                                    designed to meet unique industrial requirements with precision, reliability, and
                                    superior quality.</h5>
                                <span class="text-gradient-base-color fw-700 text-uppercase ls-1px">Quality Manufacturing
                                    Partner</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection