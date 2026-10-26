<!DOCTYPE html>
<html lang="en" dir="ltr">
 
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content=" ">

    <title>Velcore International</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />

    <link href="{{ URL::to('admin_panel/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ URL::to('admin_panel/assets/plugins/simplebar/simplebar.html') }}" rel="stylesheet" />
    <link href="{{ URL::to('admin_panel/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    <!-- No Extra plugin used -->
    <link href="{{ URL::to('admin_panel/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel='stylesheet'>
    <link href="{{ URL::to('admin_panel/assets/plugins/daterangepicker/daterangepicker.css') }}" rel='stylesheet'>


    <link href="{{ URL::to('admin_panel/assets/plugins/toastr/toastr.min.css') }}" rel='stylesheet'>
 
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ URL::to('admin_panel/assets/css/sleek.css') }}" />

    <!-- FAVICON -->
    <link href="{{ URL::to('admin_panel/assets/img/favicon.png') }}" rel="shortcut icon" />

    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ URL::to('admin_panel/assets/plugins/nprogress/nprogress.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    @toastr_css
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    {{-- <div id="toaster"></div> --}}

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

        <!-- Github Link -->
        <a href="javascript:void(0);" class="github-link">
            <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
          <defs>
            <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
              <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
              <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
            </linearGradient>
          </defs>
          <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
        </svg>
            <i class="mdi mdi-github-circle"></i>
        </a>




        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="https://demo.themefisher.com/index.html" title="Sleek Dashboard">
                        <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                            <g fill="none" fill-rule="evenodd">
                                <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                            </g>
                        </svg>

                        <span class="brand-name text-truncate">Madhuram Dashboard</span>
                    </a>
                </div>

                <!-- begin sidebar scrollbar -->
                <div class="" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="has-sub {{ request()->routeIs('admin.dashboard') ? ' active' : '' }} expand">
                            <a class="sidenav-item-link" href="{{ route('dashboard') }}" aria-expanded="false" aria-controls="dashboard">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span> 
                            </a> 
                        </li>
 

                        <li class="has-sub {{ \Request::is('sliders','sliders/create','events','events/create','homeproducts','homeproducts/create','breadcrumbpages','breadcrumbpages/create','breadcrumbimages','breadcrumbimages/create','certificates','certificates/create') ? 'active expand' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#components" aria-expanded="false" aria-controls="components">
                                <i class="mdi mdi-folder-multiple-outline"></i>
                                <span class="nav-text">Image Gallery</span> <b class="caret"></b>
                            </a>

                            <ul class="collapse {{ \Request::is('sliders','sliders/create','events','events/create','homeproducts','homeproducts/create','breadcrumbpages','breadcrumbpages/create','breadcrumbimages','breadcrumbimages/create','certificates','certificates/create') ? 'show' : '' }}" id="components" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li class="{{ (\Request::is('sliders','sliders/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('sliders.index') }}">
                                            <span class="nav-text">Home Slider</span>
                                        </a>
                                    </li>

                                    <li class="{{ (\Request::is('events','events/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('events.index') }}">
                                            <span class="nav-text">Event Exhibition</span>
                                        </a>
                                    </li>

                                    <li class="{{ (\Request::is('homeproducts','homeproducts/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('homeproducts.index') }}">
                                            <span class="nav-text">Home Product</span>
                                        </a>
                                    </li>

                                    <li class="has-sub {{ \Request::is('breadcrumbpages','breadcrumbpages/create','breadcrumbimages','breadcrumbimages/create') ? 'active expand' : '' }}">
                                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#buttons" aria-expanded="false" aria-controls="buttons">
                                            <span class="nav-text">Breadcrumb Images</span> <b class="caret"></b>
                                        </a>

                                        <ul class="collapse {{ \Request::is('breadcrumbpages','breadcrumbpages/create','breadcrumbimages','breadcrumbimages/create') ? 'show' : '' }}" id="buttons">
                                            <div class="sub-menu">
                                                <li class="{{ (\Request::is('breadcrumbpages','breadcrumbpages/create') ? 'active' : '') }}">
                                                    <a href="{{ route('breadcrumbpages.index') }}">Breadcrumb Pages Name</a>
                                                </li>

                                                <li class="{{ (\Request::is('breadcrumbimages','breadcrumbimages/create') ? 'active' : '') }}">
                                                    <a href="{{ route('breadcrumbimages.index') }}">Breadcrumb Pages Images</a>
                                                </li>
 
                                            </div>
                                        </ul>
                                    </li>

                                    <li class="{{ (\Request::is('certificates','certificates/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('certificates.index') }}">
                                            <span class="nav-text">Certificate</span>
                                        </a>
                                    </li>
 
                                </div>
                            </ul>
                        </li>
 

                        <li class="has-sub {{ \Request::is('addresses','addresses/create','emails','emails/create','phones','phones/create','maps','maps/create','socials','socials/create') ? 'active expand' : '' }}">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forms" aria-expanded="false" aria-controls="forms">
                                <i class="mdi mdi-email-mark-as-unread"></i>
                                <span class="nav-text">Manage Contact Details</span> <b class="caret"></b>
                            </a>

                            <ul class="collapse {{ \Request::is('addresses','addresses/create','emails','emails/create','phones','phones/create','maps','maps/create','socials','socials/create') ? 'show' : '' }}" id="forms" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li class="{{ (\Request::is('addresses','addresses/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('addresses.index') }}">
                                            <span class="nav-text">Address</span>
                                        </a>
                                    </li>

                                    <li class="{{ (\Request::is('emails','emails/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('emails.index') }}">
                                            <span class="nav-text">Email</span>
                                        </a>
                                    </li>

                                    <li class="{{ (\Request::is('phones','phones/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('phones.index') }}">
                                            <span class="nav-text">Phone Number</span>
                                        </a>
                                    </li>

                                    <li class="{{ (\Request::is('maps','maps/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('maps.index') }}">
                                            <span class="nav-text">Map</span>
                                        </a>
                                    </li>

                                    <li class="{{ (\Request::is('socials','socials/create') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('socials.index') }}">
                                            <span class="nav-text">Social Media Link</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
    

                        <li class="{{ (\Request::is('categories','categories/create') ? 'active' : '') }}">
                            <a class="sidenav-item-link" href="{{ route('categories.index') }}">
                                <i class="mdi mdi-image-filter-none"></i>
                                <span class="nav-text">Category Management</span>
                            </a> 
                        </li>

                        <li class="{{ (\Request::is('subcategories','subcategories/create') ? 'active' : '') }}">
                            <a class="sidenav-item-link" href="{{ route('subcategories.index') }}">
                                <i class="mdi mdi-image-filter-none"></i>
                                <span class="nav-text">Size Management</span>
                            </a> 
                        </li>

                        <li class="{{ (\Request::is('finishes','finishes/create') ? 'active' : '') }}">
                            <a class="sidenav-item-link" href="{{ route('finishes.index') }}" >
                                <i class="mdi mdi-image-filter-none"></i>
                                <span class="nav-text">Surface Management</span>
                            </a> 
                        </li>

                        <li class="{{ (\Request::is('products','products/create') ? 'active' : '') }}">
                            <a class="sidenav-item-link" href="{{ route('products.index') }}">
                                <i class="mdi mdi-image-filter-none"></i>
                                <span class="nav-text">Design Management</span>
                            </a> 
                        </li>

                        <li class="has-sub {{ (\Request::is('catalogues','catalogues/create') ? 'active' : '') }}">
                            <a class="sidenav-item-link" href="{{ route('catalogues.index') }}">
                                <i class="mdi mdi-image-filter-none"></i>
                                <span class="nav-text">Catalogue Management</span>
                            </a> 
                        </li>

                        <li class="has-sub {{ (\Request::is('packings','packings/create') ? 'active' : '') }}">
                            <a class="sidenav-item-link" href="{{ route('packings.index') }}">
                                <i class="mdi mdi-image-filter-none"></i>
                                <span class="nav-text">Packing Details</span>
                            </a> 
                        </li>
  
                        <li class="has-sub {{ \Request::is('contacts','downloadinquiries') ? 'active expand' : '' }}  ">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation" aria-expanded="false" aria-controls="documentation">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span class="nav-text">Inquiry</span> <b class="caret"></b>
                            </a>

                            <ul class="collapse {{ \Request::is('contacts','downloadinquiries') ? 'show' : '' }}" id="documentation" data-parent="#sidebar-menu">
                                <div class="sub-menu"> 
                                    <li class="{{ (\Request::is('contacts') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('contacts.index') }}">
                                            <span class="nav-text">Contact Inquiry</span>
                                        </a>
                                    </li>

                                    <li class="{{ (\Request::is('downloadinquiries') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('downloadinquiries.index') }}">
                                            <span class="nav-text">Catalogue Inquiry</span>
                                        </a>
                                    </li> 

                                    <li class="{{ (\Request::is('inquiries') ? 'active' : '') }}">
                                        <a class="sidenav-item-link" href="{{ route('inquiries.index') }}">
                                            <span class="nav-text">Inquiry</span>
                                        </a>
                                    </li> 

                                </div>
                            </ul>
                        </li>
 
                    </ul>
                </div>

            </div>
        </aside>


        <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg justify-content-between">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
               

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                             
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ URL::to('admin_panel/assets/img/user/user.png') }}" class="user-image" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">Velcore International</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    

                                    <li class="dropdown-footer">
                                        {{-- <a href="index.html"> <i class="mdi mdi-logout"></i> Log Out </a> --}}
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="mdi mdi-logout"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>


            <!-- JS (ORDER MATTERS) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('admin_panel/assets/js/sleek.js') }}"></script>

</body>
</html>

       

           

        