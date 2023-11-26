@extends("layouts.master")

@section("title", "About Me")
@section("content")
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>About Me</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="video_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video_wrap">
                        <div class="thumb">
                            <img src="{{ asset("img/video/video_bg.png") }}" alt="">
                            <div class="video_icon">
                                <a class="popup-video" href="https://www.youtube.com/watch?v=1Prw90PRiJE"> <i class="fa fa-play"></i> </a>
                            </div>
                        </div>
                        <div class="video_text text-center">
                            <p>Hi there, I am Milan. I am designer, artist, cat  <br>
                                lover and I would like to share with you some of <br>
                                my ideas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
