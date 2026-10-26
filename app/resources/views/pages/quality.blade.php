@extends('layouts.public')

@section('content-company')

<section class="position-relative overflow-hidden">
            <div class="container-fluid h-100 position-relative">
                <div class="row g-0">
                    <div class="col-xl-4 col-lg-5 d-flex justify-content-center align-items-center ps-10 xxl-ps-6 xl-ps-4 md-ps-4 sm-ps-0 position-relative order-2 order-lg-1" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="vertical-title-center align-items-center justify-content-center flex-shrink-0 w-75px sm-w-50px">
                            <h1 class="title fs-15 alt-font text-dark-gray fw-700 text-uppercase ls-1px text-uppercase d-flex w-auto align-items-center m-0" data-fancy-text='{ "opacity": [0, 1], "translateY": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["Quality Assurance"], "duration": 400, "delay": 0, "speed": 50, "easing": "easeOutQuad" }'></h1>
                        </div>
                        <div class="border-start border-color-extra-medium-gray ps-40px sm-ps-20px position-relative z-index-9">
                            <h2 class="text-dark-gray fw-600 alt-font outside-box-right-10 xl-outside-box-right-15 lg-outside-box-right-20 md-me-0 sm-mb-0 ls-minus-3px">Precision, Quality & Reliability in Every Component</h2>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 position-relative one-half-screen order-1 order-lg-2 md-mb-50px"> 
                        <div class="overflow-hidden position-relative">
                            <div class="w-100" data-anime='{ "effect": "slide", "direction": "lr", "color": "#f7f7f7", "duration": 1000, "delay": 0 }'>
                                <img src="{{ asset('website/assets/images/quality_assurance_main_image.png') }}" alt="" class="w-100 liquid-parallax" data-parallax-liquid="true" data-parallax-position="top" data-parallax-scale="1.05">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <section class="bg-linen">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-xl-8 col-lg-9 col-md-10 text-center">
                        <h3 class="alt-font text-dark-gray fw-600 ls-minus-1px sm-mb-20px" data-anime='{ "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>Why Quality Matters at Innfix</h3>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center" data-anime='{ "el": "childs", "willchange": "transform", "scale":[0.95,1], "opacity": [0, 1], "duration": 800, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-04 transition-inner-all md-mb-30px">
                        <div class="feature-box hover-box transition dark-hover bg-white border-radius-6px pt-17 pb-17 ps-14 pe-14 last-paragraph-no-margin box-shadow-quadruple-large box-shadow-hover overflow-hidden">
                            <div class="feature-box-icon">
                               <img src="{{ asset('website/assets/images/Premium Raw Materials.png') }}" width="60" alt="Premium Raw Materials" class="feature-icon mb-20px">
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-18 mb-5px">Premium Raw Materials</span>
                                <p class="text-light-opacity">We source high-grade brass, stainless steel, and aluminum from trusted suppliers to ensure consistent quality and long-lasting durability.</p>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>  
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-04 transition-inner-all md-mb-30px">
                        <div class="feature-box hover-box transition dark-hover bg-white border-radius-6px pt-17 pb-17 ps-14 pe-14 last-paragraph-no-margin box-shadow-quadruple-large box-shadow-hover overflow-hidden">
                            <div class="feature-box-icon">
                                <img src="{{ asset('website/assets/images/Advanced Inspection.png') }}" width="60" alt="Advanced Inspection" class="feature-icon mb-20px">
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-18 mb-5px">Advanced Inspection</span>
                                <p class="text-light-opacity">Every component is inspected using precision measuring instruments to verify dimensions, accuracy, and surface finish before dispatch.</p>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>  
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-04 transition-inner-all xs-mb-30px">
                        <div class="feature-box hover-box transition dark-hover bg-white border-radius-6px pt-17 pb-17 ps-14 pe-14 last-paragraph-no-margin box-shadow-quadruple-large box-shadow-hover overflow-hidden">
                            <div class="feature-box-icon">
                                <img src="{{ asset('website/assets/images/Skilled Manufacturing.png') }}" width="60" alt="Skilled Manufacturing" class="feature-icon mb-20px">
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-18 mb-5px">Skilled Manufacturing</span>
                                <p class="text-light-opacity">Our experienced engineers and CNC operators manufacture precision components with tight tolerances and consistent quality standards.</p>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>  
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-04 transition-inner-all">
                        <div class="feature-box hover-box transition dark-hover bg-white border-radius-6px pt-17 pb-17 ps-14 pe-14 last-paragraph-no-margin box-shadow-quadruple-large box-shadow-hover overflow-hidden">
                            <div class="feature-box-icon">
                                <img src="{{ asset('website/assets/images/Customer Satisfaction.png') }}" width="60" alt="Customer Satisfaction" class="feature-icon mb-20px">
                            </div>
                            <div class="feature-box-content">
                                <span class="d-inline-block alt-font text-dark-gray fw-500 fs-18 mb-5px">Customer Satisfaction</span>
                                <p class="text-light-opacity">We deliver defect-free products with on-time delivery, reliable service, and continuous quality improvement to exceed customer expectations.</p>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>  
                    </div>
                    <!-- end features box item -->
                </div>
                <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2 align-items-center justify-content-center mt-6 xs-mt-8" data-anime='{ "el": "childs", "translateY":[0, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 100, "easing": "easeOutQuad" }'>
                    <!-- start content box item -->
                    <div class="col border-end xs-border-end-0 border-color-transparent-dark-very-light md-mb-35px">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="flex-shrink-0 me-25px sm-me-15px">
                                <h2 class="mb-0 text-dark-gray fw-700 ls-minus-2px">15+</h2>
                            </div>
                            <div class="text-dark-gray">
                                <div class="fs-14 lh-28">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                </div>
                                <span class="fs-17 lh-26 d-block fw-500">Years of Manufacturing Experience</span>
                            </div>
                        </div>
                    </div>
                    <!-- end content box item -->
                    <!-- start content box item -->
                    <div class="col border-end md-border-end-0 border-color-transparent-dark-very-light md-mb-35px">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="flex-shrink-0 me-25px sm-me-15px">
                                <h2 class="mb-0 text-dark-gray fw-700 ls-minus-2px">100<sup class="fs-30">%</sup></h2>
                            </div>
                            <div class="text-dark-gray">
                                <span class="fs-17 lh-26 d-block fw-500">Quality Inspection <br/>Before Dispatch</span>
                            </div>
                        </div>
                    </div> 
                    <!-- end content box item -->
                    <!-- start content box item -->
                    <div class="col">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="flex-shrink-0 me-25px sm-me-15px">
                                <h2 class="mb-0 text-dark-gray fw-700 ls-minus-2px">500<sup class="fs-30">+</sup></h2>
                            </div>
                            <div class="text-dark-gray">
                                <span class="fs-17 lh-26 d-block fw-500">Customized <br/>Components Developed</span>
                            </div>
                        </div>
                    </div> 
                    <!-- end content box item -->
                </div>
            </div>
        </section>
        <section id="down-section" class="pt-0">
            <div class="container">
                <div class="row align-items-center justify-content-center" data-anime='{ "perspective": [1200,1200] }'>
                    <div class="col-lg-6 md-mb-40px" data-anime='{ "translateY": [0, 0], "zoom": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <figure class="position-relative m-0">
                            <img src="{{ asset('website/assets/images/precision_brass_inspection.png') }}" alt="" class="w-100 border-radius-5px">
                            <!-- <figcaption class="w-190px sm-w-180px xs-w-140px bg-white p-30px xs-p-15px border-radius-6px position-absolute bottom-30px left-30px xs-bottom-20px xs-left-15px overflow-hidden box-shadow-medium animation-float text-center" data-anime='{ "translateY": [0, 0], "opacity": [0,1], "duration": 1000, "delay": 1000, "staggervalue": 300, "easing": "easeOutQuad" }'> 
                                <span class="alt-font fs-90 xs-fs-80 fw-700 text-white d-block position-relative z-index-1">15</span>
                                <div class="alt-font fw-500 fs-20 xs-fs-18 d-block text-dark-gray lh-24 xs-lh-22 ls-minus-05px xs-mb-5px">Years of experience</div>
                                <div class="h-160px w-160px border-radius-100 bg-base-color position-absolute left-minus-5px xs-left-minus-25px top-minus-60px sm-top-minus-80px xs-top-minus-100px z-index-0"></div>
                            </figcaption> -->
                        </figure>
                    </div>
                    <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-10" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="mb-10px">
                            <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                            <span class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Quality Control</span>
                        </div>
                        <h3 class="fw-600 text-dark-gray mb-20px ls-minus-2px alt-font">Delivering Precision Components with International Quality Standards</h3>
                        <p class="w-95 md-w-100 mb-35px">At Innfix, quality is integrated into every stage of manufacturing. From raw material inspection to machining, threading, finishing, plating, and final inspection, every process is carefully monitored to ensure superior performance and consistency. Our quality management system helps us manufacture precision brass components that meet customer drawings and international specifications.</p>
                        <div class="pt-20px pb-20px ps-30px pe-30px xs-p-15px border border-color-extra-medium-gray border-radius-6px mb-15px icon-with-text-style-08 w-90 lg-w-100">
                            <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                                <div class="feature-box-icon me-10px">
                                    <i class="bi bi-people icon-very-medium text-dark-gray"></i>
                                </div>
                                <div class="feature-box-content">
                                    <span class="alt-font fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-26">100% Inspection Using Precision Measuring Instruments</span>
                                </div>
                            </div>
                        </div>
                        <p class="fs-13 mb-0">Every product is inspected for dimensional accuracy, finish, threading, and performance before shipment.</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row align-items-center justify-content-center mb-7 sm-mb-40px">
                    <div class="col-xl-5 col-lg-6 col-md-10 md-mb-50px" data-anime='{ "el": "childs", "translateY": [15, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 100, "easing": "easeOutQuad" }'>
                        <div class="mb-10px">
                            <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                            <span class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Our Quality Commitment</span>
                        </div>
                        <h3 class="fw-600 text-dark-gray ls-minus-2px alt-font" data-anime='{ "el": "lines", "translateY": [15, 0], "opacity": [0,1], "delay": 100, "staggervalue": 100, "easing": "easeOutQuad" }'>How Innfix Ensures Product Excellence</h3>
                        <!-- start features box item -->
                        <div class="icon-with-text-style-08 mb-10px">
                            <div class="feature-box feature-box-left-icon-middle overflow-hidden">
                                <div class="feature-box-icon feature-box-icon-rounded w-35px h-35px bg-linen rounded-circle me-10px">
                                    <i class="fa-solid fa-check fs-14 text-dark-gray"></i> 
                                </div>
                                <div class="feature-box-content"> 
                                    <span class="text-dark-gray">Incoming Raw Material Inspection</span>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="icon-with-text-style-08 mb-10px">
                            <div class="feature-box feature-box-left-icon-middle overflow-hidden">
                                <div class="feature-box-icon feature-box-icon-rounded w-35px h-35px bg-linen rounded-circle me-10px">
                                    <i class="fa-solid fa-check fs-14 text-dark-gray"></i> 
                                </div>
                                <div class="feature-box-content"> 
                                    <span class="text-dark-gray">In-Process Quality Checks</span>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="icon-with-text-style-08 mb-10px">
                            <div class="feature-box feature-box-left-icon-middle overflow-hidden">
                                <div class="feature-box-icon feature-box-icon-rounded w-35px h-35px bg-linen rounded-circle me-10px">
                                    <i class="fa-solid fa-check fs-14 text-dark-gray"></i> 
                                </div>
                                <div class="feature-box-content"> 
                                    <span class="text-dark-gray">Final Dimensional Inspection</span>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                         <!-- start features box item -->
                        <div class="icon-with-text-style-08 mb-10px">
                            <div class="feature-box feature-box-left-icon-middle overflow-hidden">
                                <div class="feature-box-icon feature-box-icon-rounded w-35px h-35px bg-linen rounded-circle me-10px">
                                    <i class="fa-solid fa-check fs-14 text-dark-gray"></i> 
                                </div>
                                <div class="feature-box-content"> 
                                    <span class="text-dark-gray">Material Compliance Verification</span>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                        <!-- start features box item -->
                        <div class="icon-with-text-style-08">
                            <div class="feature-box feature-box-left-icon-middle overflow-hidden">
                                <div class="feature-box-icon feature-box-icon-rounded w-35px h-35px bg-linen rounded-circle me-10px">
                                    <i class="fa-solid fa-check fs-14 text-dark-gray"></i> 
                                </div>
                                <div class="feature-box-content"> 
                                    <span class="text-dark-gray">Process Verification</span>
                                </div>
                            </div>
                        </div>
                        <!-- end features box item -->
                    </div>
                    <div class="col-lg-6 offset-xl-1 position-relative z-index-1" data-anime='{ "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="atropos" data-atropos data-atropos-perspective="2450">
                            <div class="atropos-scale">
                                <div class="atropos-rotate">
                                    <div class="atropos-inner">
                                        <img src="{{ asset('website/assets/images/quality_testing_in_progress.png') }}" alt="" class="border-radius-6px"/>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>

@endsection