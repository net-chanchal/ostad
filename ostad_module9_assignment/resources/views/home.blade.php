@extends("layouts.master")

@section("title", "Home")
@section("content")
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="shap_pattern d-none d-lg-block">
                <img src="{{ asset("img/about/grid.png") }}" alt="">
            </div>
            <div class="social_links">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i> </a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i> </a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i> </a></li>
                </ul>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="slider_text text-center">
                            <h3>
                                Hi, I'm Chanchal
                            </h3>
                            <span>Web Developer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ slider_area_end -->

    <!-- service_area  -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-65">
                        <span>Service Provided</span>
                        <h3>Build brands campaigns <br>
                            & digital projects</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ asset("img/svg_icon/1.svg") }}" alt="">
                        </div>
                        <h3>Web Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ asset("img/svg_icon/2.svg") }}" alt="">
                        </div>
                        <h3>Web Development</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service text-center">
                        <div class="icon">
                            <img src="{{ asset("img/svg_icon/3.svg") }}" alt="">
                        </div>
                        <h3>Mobile app</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area  -->

    <!-- portfolio_area -->
    <div class="portfolio_area portfolio_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title white_text text-center">
                        <span>Projects</span>
                        <h3>Some of my awesome <br>
                            stuffs here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ portfolio_area -->

    <!-- portfolio_image_area  -->
    <div class="portfolio_image_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-5">
                    <div class="single_Portfolio">
                        <div class="portfolio_thumb">
                            <img src="{{ asset("img/portfolio/1.png") }}" alt="">
                        </div>
                        <a href="{{ asset("img/portfolio/1.png") }}" class="popup popup-image"></a>
                        <div class="portfolio_hover">
                            <div class="title">
                                <h3>Product Design</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-7">
                    <div class="single_Portfolio">
                        <div class="portfolio_thumb">
                            <img src="{{ asset("img/portfolio/2.png") }}" alt="">
                        </div>
                        <a href="{{ asset("img/portfolio/2.png") }}" class="popup popup-image"></a>
                        <div class="portfolio_hover">
                            <div class="title">
                                <h3>Product Design</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio">
                        <div class="portfolio_thumb">
                            <img src="{{ asset("img/portfolio/3.png") }}" alt="">
                        </div>
                        <a href="{{ asset("img/portfolio/3.png") }}" class="popup popup-image"></a>
                        <div class="portfolio_hover">
                            <div class="title">
                                <h3>Product Design</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_Portfolio">
                        <div class="portfolio_thumb">
                            <img src="{{ asset("img/portfolio/4.png") }}" alt="">
                        </div>
                        <a href="{{ asset("img/portfolio/4.png") }}" class="popup popup-image"></a>
                        <div class="portfolio_hover">
                            <div class="title">
                                <h3>Product Design</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 col-lg-4">
                    <div class="single_Portfolio">
                        <div class="portfolio_thumb">
                            <img src="{{ asset("img/portfolio/5.png") }}" alt="">
                        </div>
                        <a href="{{ asset("img/portfolio/5.png") }}" class="popup popup-image"></a>
                        <div class="portfolio_hover">
                            <div class="title">
                                <h3>Product Design</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="more_portfolio text-center">
                        <a class="line_btn" href="#">More Folio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ portfolio_image_area  -->

    <!-- about_me  -->
    <div class="about_me">
        <div class="about_large_title d-none d-lg-block">
            About
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    @include("components.about")
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="about_img">
                        <div class="color_pattern d-none d-lg-block">
                            <img src="{{ asset("img/about/color_grid.png") }}" alt="">
                        </div>
                        <div class="my_Pic">
                            <img src="{{ asset("img/about/about.png") }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ about_me  -->

    @include("components.counter")
    @include("components.testimonial")
    @include("components.discuss_projects")
@endsection
