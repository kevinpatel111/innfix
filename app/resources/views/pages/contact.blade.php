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
                            data-fancy-text='{ "opacity": [0, 1], "translateY": [50, 0], "filter": ["blur(20px)", "blur(0px)"], "string": ["contact us"], "duration": 400, "delay": 0, "speed": 50, "easing": "easeOutQuad" }'>
                        </h1>
                    </div>
                    <div class="border-start border-color-extra-medium-gray ps-40px sm-ps-20px position-relative z-index-9">
                        <h2
                            class="text-dark-gray fw-600 alt-font outside-box-right-10 xl-outside-box-right-15 lg-outside-box-right-20 md-me-0 sm-mb-0 ls-minus-3px">
                            Get in Touch with InnFix for Precision Brass Components Solutions</h2>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 position-relative one-half-screen order-1 order-lg-2 md-mb-50px">
                    <div class="overflow-hidden position-relative">
                        <div class="w-100"
                            data-anime='{ "effect": "slide", "direction": "lr", "color": "#f7f7f7", "duration": 1000, "delay": 0 }'>
                            <img src="{{ asset('website/assets/images/contact_hero.png') }}" alt=""
                                class="w-100 liquid-parallax" data-parallax-liquid="true" data-parallax-position="top"
                                data-parallax-scale="1.05">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-0">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-xl-6 col-lg-7 cover-background md-h-500px sm-h-400px md-mb-50px"
                    style="background-image:url({{ asset('website/assets/images/contact_form.png') }});">

                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 position-relative">
                    <div class="contact-form-style-03 position-relative ps-15 pe-15 xxl-ps-10 xxl-pe-10 lg-ps-5 lg-pe-5 overflow-hidden last-paragraph-no-margin"
                        data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="mb-10px">
                            <span class="w-25px h-1px d-inline-block bg-base-color me-5px align-middle"></span>
                            <span
                                class="text-gradient-base-color fs-15 alt-font fw-700 ls-05px text-uppercase d-inline-block align-middle">Get
                                in touch with us</span>
                        </div>
                        <h2 class="text-dark-gray alt-font fw-600 w-90 xxl-w-100 ls-minus-2px">Request a Quote or Contact
                            Our Manufacturing Team</h2>
                        <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-person icon-extra-medium text-dark-gray"></i></span>
                                <input class="ps-0 border-radius-0px border-color-extra-medium-gray form-control required"
                                    type="text" name="name" placeholder="Your name*" />
                            </div>
                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i
                                        class="bi bi-envelope icon-extra-medium text-dark-gray"></i></span>
                                <input
                                    class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control required"
                                    type="email" name="email" placeholder="Your email address*" />
                            </div>

                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-phone icon-extra-medium text-dark-gray"></i></span>
                                <input
                                    class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control required"
                                    type="tel" name="number" placeholder="Your phone number*" />
                            </div>

                            <div class="position-relative form-group mb-20px">
                                <span class="form-icon"><i class="bi bi-pen icon-extra-medium text-dark-gray"></i></span>
                                <input
                                    class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control required"
                                    type="text" name="subject" placeholder="Your subject*" />
                            </div>
                            <div class="position-relative form-group form-textarea mt-15px mb-0">
                                <textarea
                                    class="ps-0 border-radius-0px border-bottom border-color-extra-medium-gray form-control"
                                    name="comment" placeholder="Your message" rows="3"></textarea>
                                <span class="form-icon"><i
                                        class="bi bi-chat-square-dots icon-extra-medium text-dark-gray"></i></span>
                                <input type="hidden" name="redirect" value="">
                                <button
                                    class="btn btn-medium btn-dark-gray btn-round-edge btn-box-shadow mb-20px mt-25px submit w-100 left-icon"
                                    type="submit"><i class="fa-regular fa-envelope"></i>Send message</button>
                                <p class="fs-14 lh-24 w-100 mb-0 text-center text-lg-start">InnFix manufactures precision
                                    brass components, CNC turned parts, and custom brass products for automotive,
                                    electrical, and industrial applications. Contact us today for reliable manufacturing
                                    solutions.</p>
                                <div class="form-results mt-20px d-none"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center elements-social social-icon-style-06">
                    <div class="fs-22 mb-30px text-dark-gray">
                        Connect with <span class="fw-600">InnFix</span>
                    </div>
                    <ul class="extra-large-icon fw-600"
                        data-anime='{ "el": "childs", "translateX": [10, 0], "opacity": [0,1], "duration": 300, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <!-- LinkedIn -->
                        @foreach ($socials as $links)


                            <li>
                                <a class="linkedin" href="{{ $links['linkedin'] }}" target="_blank">
                                    <span class="brand-label text-dark-gray">In</span>
                                    <span class="brand-icon fa-brands fa-linkedin-in"></span>
                                </a>
                            </li>
                            <!-- Facebook -->
                            <li>
                                <a class="facebook" href="{{ $links['facebook'] }}" target="_blank">
                                    <span class="brand-label text-dark-gray">Fb</span>
                                    <span class="brand-icon fa-brands fa-facebook-f"></span>
                                </a>
                            </li>
                            <!-- Instagram -->
                            <li>
                                <a class="instagram" href="{{ $links['instagram'] }}" target="_blank">
                                    <span class="brand-label text-dark-gray">Ig</span>
                                    <span class="brand-icon fa-brands fa-instagram"></span>
                                </a>
                            </li>
                            <!-- YouTube -->
                            <li>
                                <a class="youtube" href="{{ $links['youtube'] }}" target="_blank">
                                    <span class="brand-label text-dark-gray">Yt</span>
                                    <span class="brand-icon fa-brands fa-youtube"></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Map Section -->
    <section class="pt-0px">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-md-12">
                    @foreach ($map as $link)
                        <iframe src="{{ $link->map }}" width="100%" height="800" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
                    @endforeach
                </div>
            </div>
    </section>


@endsection