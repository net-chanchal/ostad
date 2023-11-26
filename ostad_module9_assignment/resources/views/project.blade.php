@extends("layouts.master")

@section("title", "Projects")
@section("content")
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Projects</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <!-- portfolio_image_area  -->
    <div class="portfolio_image_area dec_margin">
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

    @include("components.testimonial")
@endsection
