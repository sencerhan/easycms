<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<!--
THEME: Constra - Construction Html5 Template
VERSION: 1.0.0
AUTHOR: Themefisher

HOMEPAGE: https://themefisher.com/products/constra-construction-template/
DEMO: https://demo.themefisher.com/constra/
GITHUB: https://github.com/themefisher/Constra-Bootstrap-Construction-Template

WEBSITE: https://themefisher.com
TWITTER: https://twitter.com/themefisher
FACEBOOK: https://www.facebook.com/themefisher
-->

<!DOCTYPE html>
<html lang="{{ $lang_code }}">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>
        @if ($settings)
            {{ $settings->meta_title }}
        @endif
    </title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">
    <base href="/">
    <!-- Favicon
================================================== -->
    @if ($settings->favicon)
        <link rel="icon" type="image/png" href="{{ $settings->favicon }}">
    @endif
    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="theme/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="theme/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="theme/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="theme/plugins/slick/slick.css">
    <link rel="stylesheet" href="theme/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="theme/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="theme/css/style.css">
    <script src="theme/plugins/jQuery/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#loading").remove();
        });
    </script>
</head>

<body>
    <div id='loading' style='z-index:999999; position: fixed; width:100%; height:100%; background:#333;'></div>
    <div class="body-inner">

        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <ul class="top-info text-center text-md-left">
                            <li><i class="fas fa-map-marker-alt"></i>
                                @if ($settings)
                                    @if ($settings->address)
                                        <p class="info-text">{{ $settings->address }}</p>
                                    @endif
                                @endif
                            </li>
                        </ul>
                    </div>
                    <!--/ Top info end -->

                    <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                        <ul class="list-unstyled">
                            @if ($settings)
                                <li>
                                    @if ($settings->facebook)
                                        <a title="Facebook" href="{{ $settings->facebook }}" target="_TOP">
                                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                                        </a>
                                    @endif
                                    @if ($settings->twitter)
                                        <a title="twitter" href="{{ $settings->twitter }}" target="_TOP">
                                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                                        </a>
                                    @endif
                                    @if ($settings->instagram)
                                        <a title="instagram" href="{{ $settings->instagram }}" target="_TOP">
                                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                                        </a>
                                    @endif
                                    @if ($settings->whatsapp)
                                        <a title="whatsapp" href="{{ $settings->whatsapp }}" target="_TOP">
                                            <span class="social-icon"><i class="fab fa-whatsapp"></i></span>
                                        </a>
                                    @endif
                                    @foreach ($languages as $item)
                                        <a href="{{ $item->url }}" style="padding: 0;">
                                            <span class="social-icon"><img src="{{ $item->flag }}"
                                                    style="height: 25px;"></span>
                                        </a>
                                    @endforeach

                                </li>
                            @endif
                        </ul>
                    </div>
                    <!--/ Top social end -->
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
        <!-- Header start -->
        <header id="header" class="header-two">
            <div class="site-navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">

                                <div class="logo">
                                    <a class="d-block" href="/{{ $lang_code }}">
                                        <img style="height:50px;" loading="lazy" src="{{ $settings->site_logo }}"
                                            alt="{{ $settings->meta_title }}">
                                    </a>
                                </div><!-- logo end -->

                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div id="navbar-collapse" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav ml-auto align-items-center">
                                        @foreach ($menu as $item)
                                            @if ($item->childs)
                                                <li class="nav-item dropdown active">
                                                    <a href="#" class="nav-link dropdown-toggle"
                                                        data-toggle="dropdown">{{ $item->title }} <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown-menu" role="menu">

                                                        @foreach ($item->childs as $item)
                                                            @if ($item->childs)
                                                                <li class="dropdown-submenu">
                                                                    <a href="#!" class="dropdown-toggle"
                                                                        data-toggle="dropdown">{{ $item->title }}</a>
                                                                    <ul class="dropdown-menu">
                                                                        @foreach ($item->childs as $item)
                                                                            <li><a
                                                                                    href="{{ $item->url }}">{{ $item->title }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @else
                                                                <li><a href="{{ $item->url }}">{{ $item->title }}
                                                                    </a></li>
                                                            @endif
                                                        @endforeach



                                                    </ul>
                                                </li>
                                            @else
                                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ $item->url }}">{{ $item->title }} </a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!--/ Col end -->
                    </div>
                    <!--/ Row end -->
                </div>
                <!--/ Container end -->

            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->

        <section class="content" style="padding:0;">
            <div class="container">
                <div class="row">
                    @yield('content')
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </section><!-- Content end -->


        <footer id="footer" class="footer bg-overlay">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">{{ $settings->footer_left_title }}</h3>

                            <p>{!! $settings->footer_left_content !!}</p>
                        </div><!-- Col end -->

                        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">{{ $settings->footer_center_title }}</h3>
                            <div class="working-hours">
                                {!! $settings->footer_center_content !!}
                            </div>
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                            <h3 class="widget-title">{{ $settings->footer_menu_title }}</h3>
                            <ul class="list-arrow">
                                @if ($footermenu)
                                    @foreach ($footermenu as $item)
                                        <li><a href="{{ $item->url }}">{{ $item->title }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

        </footer><!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->

        <!-- initialize jQuery Library -->
        <!-- Bootstrap jQuery -->

        <script src="theme/plugins/bootstrap/bootstrap.min.js" defer></script>
        <!-- Slick Carousel -->
        <script src="theme/plugins/slick/slick.min.js"></script>
        <script src="theme/plugins/slick/slick-animation.min.js"></script>
        <!-- Color box -->
        <script src="theme/plugins/colorbox/jquery.colorbox.js"></script>
        <!-- shuffle -->
        <script src="theme/plugins/shuffle/shuffle.min.js" defer></script>


        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
        <!-- Google Map Plugin-->
        <script src="theme/plugins/google-map/map.js" defer></script>

        <!-- Template custom -->
        <script src="js/script.js"></script>

    </div><!-- Body inner end -->
</body>

</html>
