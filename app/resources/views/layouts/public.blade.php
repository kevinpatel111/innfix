<!doctype html>
<html class="no-js" lang="en">


<head>
    <title>InnFix | Brass Precision Components Manufacturer & Exporter</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="InnFix is a manufacturer and exporter of precision brass components, CNC turned parts, brass inserts, electrical components and custom engineered solutions from Jamnagar, Gujarat, India.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/vendors.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/icon.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/css/responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/assets/demos/branding-agency/branding-agency.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.0/css/all.min.css"
        integrity="sha512-ApSLB1Pd3/bZN8fWB/RG9YhN/7bd9Hkf3AGaE2mPfebjrxagjuBtx2GcgdqIlJkUzwylBo61r9Xa9NmgBI0swA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="application/ld+json">
        {
        "@@context": "https://schema.org",
        "@type": "WebSite",
        "name": "InnFix",
        "alternateName": "Innfix",
        "url": "https://innfix.in/"
        }
    </script>

    <script type="application/ld+json">
        {
        "@@context": "https://schema.org",
        "@type": "Organization",
        "name": "InnFix",
        "url": "https://innfix.in/",
        "logo": "{{ asset('website/assets/img/logo-black.png') }}",
        "email": "info@innfix.in",
        "telephone": "+91-94082-48194",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Plot No. 1/29, Heritage Industrial Park, Gali No.2, RS No-90/2, Kansumra",
            "addressLocality": "Jamnagar",
            "postalCode": "361004",
            "addressRegion": "Gujarat",
            "addressCountry": "IN"
        }
        }
    </script>

</head>

<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#1d1d1d">
    <!-- start header -->
    <header>
        <!-- start navigation -->
        <nav class="navbar navbar-expand-lg header-light bg-white header-reverse glass-effect">
            <div class="container-fluid">
                <div class="col-auto col-lg-2 me-lg-0 me-auto">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('website/assets/img/logo-black.png') }}" alt="" width="200"
                            class="default-logo">
                        <img src="{{ asset('website/assets/img/logo-black.png') }}" alt="" width="200" class="alt-logo">
                        <img src="{{ asset('website/assets/img/logo-black.png') }}" alt="" width="200"
                            class="mobile-logo">
                    </a>
                </div>
                <div class="col-auto ms-auto md-ms-0 menu-order position-static">
                    <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav alt-font">
                            <li class="nav-item {{ \Request::is('/') ? 'active' : '' }}"><a href="/"
                                    class="nav-link">Home</a></li>
                            <li class="nav-item {{ \Request::is('about') ? 'active' : '' }}"><a
                                    href="{{ route('about') }}" class="nav-link">About Us</a></li>
                            <li
                                class="nav-item dropdown dropdown-with-icon-style02 {{ \Request::is('product.detail') ? 'active' : '' }}">
                                <a href="#" class="nav-link ">Products</a>
                                <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach($headerCategories ?? [] as $category)
                                        <li class="">
                                            <a href="{{ route('product.category', $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>

                                        <!-- <li>
                                            <a href="{{ route('coming-soon') }}">{{ $category->name }}</a>
                                        </li> -->
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item {{ \Request::is('quality') ? 'active' : '' }}">
                                <a href="{{ route('quality') }}" class="nav-link">Quality</a>
                            </li>
                            <li class="nav-item {{ \Request::is('infrastructure') ? 'active' : '' }}">
                                <a href="{{ route('infrastructure') }}" class="nav-link">Infrastructure</a>
                            </li>
                            <li class="nav-item {{ \Request::is('contact') ? 'active' : '' }}">
                                <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end navigation -->
    </header>
    <!-- end header -->


    @yield('content-company')

    @include('includes.footer')