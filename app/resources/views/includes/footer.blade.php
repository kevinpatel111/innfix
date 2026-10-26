<!-- start footer -->
<footer class="bg-charcoal-blue pb-4 sm-pb-50px">
    <div class="container">
        <div class="row mb-6">
            <div class="col-lg-4 col-md-6 sm-mb-30px order-2 order-md-1">
                <h3 class="text-white fw-500 alt-font ls-minus-1px sm-mb-30px">Precision Manufacturing Solutions
                    for Your Business.</h3>
                <div class="row">
                    <div class="col-lg-5 col-6">
                        <span class="alt-font fs-14 text-uppercase d-block text-white ls-1px lh-24">Phone</span>
                        @foreach ($phone as $number)
                            <a href="tel:{{ $number->phone }}" class="text-medium-gray text-white-hover">{{ $number->phone }}</a>
                        @endforeach
                    </div>
                    <div class="col-lg-5 col-6">
                        <span class="alt-font fs-14 text-uppercase d-block text-white ls-1px lh-24">Email</span>
                        <a href="mailto:info@innfix.com" class="text-medium-gray text-white-hover">info@innfix.com</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 offset-lg-1 col-6 order-3 order-md-2">
                <span class="alt-font fs-14 text-uppercase mb-5px d-block text-white ls-1px">Navigation</span>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('coming-soon') }}">Products</a></li>
                    <li><a href="{{ route('quality') }}">Quality</a></li>
                    <li><a href="{{ route('infrastructure') }}">Infrastructure</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-6 order-3 order-md-3">
                <span class="alt-font fs-14 text-uppercase mb-5px d-block text-white ls-1px">Follow Us</span>
                <ul>
                    @foreach ($socials as $links)
                        <li><a href="{{ $links['linkedin'] }}" target="_blank">LinkedIn</a></li>
                        <li><a href="{{ $links['facebook'] }}" target="_blank">Facebook</a></li>
                        <li><a href="{{ $links['instagram'] }}" target="_blank">Instagram</a></li>
                        <li><a href="{{ $links['youtube'] }}" target="_blank">YouTube</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 order-1 order-md-4 sm-mb-30px">
                <a href="/" class="footer-logo "><img src="{{ asset('website/assets/img/logo-white.png') }}"
                        alt="InnFix Logo" width="160"></a>
                @foreach($addresses as $address)
                    <p class="fs-13 lh-22 w-95 sm-w-100 text-medium-gray mt-10">{{$address->description}}</p>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 last-paragraph-no-margin">
                <p class="fs-13 lh-22 w-95 sm-w-100 text-medium-gray">InnFix is a premier manufacturer & exporter of
                    precision brass components, CNC turned parts, brass inserts, electrical components, and custom
                    engineered solutions.</p>
            </div>
            <div class="col-md-5 text-md-end sm-mt-15px last-paragraph-no-margin">
                <p class="fs-13 lh-22 text-medium-gray">&copy; <?php echo date('Y'); ?> <span
                        class="text-white">InnFix</span>. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- start scroll progress -->
<div class="scroll-progress d-none d-xxl-block">
    <a href="#" class="scroll-top" aria-label="scroll">
        <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
    </a>
</div>
<!-- end scroll progress -->
<!-- javascript libraries -->

<script type="text/javascript" src="{{ asset('website/assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('website/assets/js/vendors.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('website/assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var productSlider = new Swiper(".product-image-slider", {
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        speed: 800,
        slidesPerView: 1,
        spaceBetween: 20,
    });
</script>
</body>

<!-- Mirrored from craftohtml.themezaa.com/demo-branding-agency.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Jul 2026 05:39:38 GMT -->

</html>