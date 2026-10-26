@extends('layouts.public')
@section('content-company')

<section class="position-relative overflow-hidden">
    <div class="container-fluid h-100 position-relative">
        <div class="row g-0">
            <div class="col-xl-4 col-lg-5 d-flex justify-content-center align-items-center ps-10 xxl-ps-6 xl-ps-4 md-ps-4 sm-ps-0 position-relative order-2 order-lg-1" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="vertical-title-center align-items-center justify-content-center flex-shrink-0 w-75px sm-w-50px">
                    <h1 class="title fs-15 alt-font text-dark-gray fw-700 text-uppercase ls-1px text-uppercase d-flex w-auto align-items-center m-0" data-fancy-text='{ "opacity": [0, 1], "translateY": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["Infrastructure"], "duration": 400, "delay": 0, "speed": 50, "easing": "easeOutQuad" }'></h1>
                </div>
                <div class="border-start border-color-extra-medium-gray ps-40px sm-ps-20px position-relative z-index-9">
                    <h2 class="text-dark-gray fw-600 alt-font outside-box-right-10 xl-outside-box-right-15 lg-outside-box-right-20 md-me-0 sm-mb-0 ls-minus-3px">Advanced Manufacturing Infrastructure for Precision Components</h2>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 position-relative one-half-screen order-1 order-lg-2 md-mb-50px"> 
                <div class="overflow-hidden position-relative">
                    <div class="w-100" data-anime='{ "effect": "slide", "direction": "lr", "color": "#f7f7f7", "duration": 1000, "delay": 0 }'>
                        <img src="{{ asset('website/assets/images/infrastructure_hero_image.png') }}" alt="" class="w-100 liquid-parallax" data-parallax-liquid="true" data-parallax-position="top" data-parallax-scale="1.05">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="down-section" class="pt-0">
    <div class="container">
        <div class="row align-items-center justify-content-center" data-anime='{ "perspective": [1200,1200] }'>
            <div class="col-lg-6 md-mb-40px" data-anime='{ "translateY": [0, 0], "zoom": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <figure class="position-relative m-0">
                    <img src="{{ asset('website/assets/images/CNC_machining_workshop.png') }}" alt="" class="w-100 border-radius-5px">
                </figure>
            </div>
            <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-10" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                <div class="mb-10px">
                    <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                    <span class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Manufacturing Facility</span>
                </div>
                <h3 class="fw-600 text-dark-gray mb-20px ls-minus-2px alt-font">Modern Infrastructure Supporting Precision Engineering</h3>
                <p class="w-95 md-w-100 mb-35px">At Innfix, our advanced manufacturing infrastructure enables us to produce high-quality brass precision components with accuracy and consistency. Our facility is equipped with modern CNC machines, advanced tooling, and precision inspection equipment to support efficient production and superior quality. From raw material processing to final dispatch, every stage is managed with strict process control to meet customer requirements.</p>
                <div class="pt-20px pb-20px ps-30px pe-30px xs-p-15px border border-color-extra-medium-gray border-radius-6px mb-15px icon-with-text-style-08 w-90 lg-w-100">
                    <div class="feature-box feature-box-left-icon-middle d-inline-flex align-middle">
                        <div class="feature-box-icon me-10px">
                            <i class="bi bi-people icon-very-medium text-dark-gray"></i>
                        </div>
                        <div class="feature-box-content">
                            <span class="alt-font fs-19 ls-minus-05px fw-600 text-dark-gray d-block lh-26">Advanced CNC Machining & Quality Inspection Facility</span>
                        </div>
                    </div>
                </div>
                <p class="fs-13 mb-0">Our infrastructure supports precision machining, dimensional inspection, surface finishing, and customized component manufacturing as per customer drawings.</p>
            </div>
        </div>
    </div>
</section>
<section class="pt-100px pb-100px">
    <div class="container">
        <div class="text-center mb-50px">
            <div class="mb-10px">
                <span class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase">
                    Manufacturing Capabilities
                </span>
            </div>
            <h3 class="fw-600 text-dark-gray ls-minus-2px alt-font">
                Our Infrastructure Advantages
            </h3>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4">
            <div class="col">
                <div class="p-35px border border-color-extra-medium-gray border-radius-5px h-100 transition">
                    <img src="{{ asset('website/assets/images/Advanced Machinery.png') }}" width="60" alt="Advanced Machinery" class="icon-image mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-10px">
                        Advanced Machinery
                    </h5>
                    <p class="mb-0">
                        Modern CNC turning machines and advanced tools ensure accurate machining and consistent component quality.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="p-35px border border-color-extra-medium-gray border-radius-5px h-100 transition">
                    <img src="{{ asset('website/assets/images/Efficient Production.png') }}" width="60" alt="Efficient Production" class="icon-image mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-10px">
                        Efficient Production
                    </h5>
                    <p class="mb-0">
                        Well-planned manufacturing processes help achieve high productivity with timely delivery and reliable output.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="p-35px border border-color-extra-medium-gray border-radius-5px h-100 transition">
                    <img src="{{ asset('website/assets/images/Precision Inspection.png') }}" width="60" alt="Precision Inspection" class="icon-image mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-10px">
                        Precision Inspection
                    </h5>
                    <p class="mb-0">
                        Advanced measuring instruments ensure every component meets required dimensions and quality standards.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="p-35px border border-color-extra-medium-gray border-radius-5px h-100 transition">
                    <img src="{{ asset('website/assets/images/Modern Facility.png') }}" width="60" alt="Modern Facility" class="icon-image mb-20px">
                    <h5 class="fw-600 text-dark-gray mb-10px">
                        Modern Facility
                    </h5>
                    <p class="mb-0">
                        A well-organized production environment supports safe, efficient, and quality-driven manufacturing operations.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-100px pb-100px bg-very-light-gray">
    <div class="container">
        <div class="text-center mb-50px">
            <div class="mb-10px">
                <span class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase">
                    Our Infrastructure
                </span>
            </div>
            <h3 class="fw-600 text-dark-gray ls-minus-2px alt-font">
                Inside Our Manufacturing Facility
            </h3>
            <p class="w-60 mx-auto md-w-100">
                Explore our modern production facility equipped with CNC machining technology, inspection systems, and efficient manufacturing processes designed for precision component production.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <figure class="m-0 overflow-hidden border-radius-5px">
                    <img src="{{ asset('website/assets/images/CNC_turning_machine.png') }}" 
                    class="w-100 hover-effect" 
                    alt="CNC Turning Machine">
                </figure>
            </div>
            <div class="col-lg-4 col-md-6">
                <figure class="m-0 overflow-hidden border-radius-5px">
                    <img src="{{ asset('website/assets/images/precision_brass_machining.png') }}" 
                    class="w-100" 
                    alt="Precision Brass Machining">
                </figure>
            </div>
            <div class="col-lg-4 col-md-6">
                <figure class="m-0 overflow-hidden border-radius-5px">
                    <img src="{{ asset('website/assets/images/automatic_bar_feeder.png') }}" 
                    class="w-100" 
                    alt="Automatic Bar Feeder">
                </figure>
            </div>
            <div class="col-lg-4 col-md-6">
                <figure class="m-0 overflow-hidden border-radius-5px">
                    <img src="{{ asset('website/assets/images/finished_brass_components_tray.png') }}" 
                    class="w-100" 
                    alt="Finished Brass Components Tray">
                </figure>
            </div>
            <div class="col-lg-4 col-md-6">
                <figure class="m-0 overflow-hidden border-radius-5px">
                    <img src="{{ asset('website/assets/images/quality_inspection_equipment.png') }}" 
                    class="w-100" 
                    alt="Quality Inspection Equipment">
                </figure>
            </div>
            <div class="col-lg-4 col-md-6">
                <figure class="m-0 overflow-hidden border-radius-5px">
                    <img src="{{ asset('website/assets/images/vertical_machining_center.png') }}" 
                    class="w-100" 
                    alt="Vertical Machining Center">
                </figure>
            </div>
        </div>
    </div>
</section>

@endsection