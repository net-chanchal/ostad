<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="{{ route("home") }}">
                                <img src="{{ asset("img/logo.png") }}" class="w-75" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{ route("home") }}">home</a></li>
                                    <li><a href="{{ route("projects") }}">Projects</a></li>
                                    <li><a href="{{ route("about") }}">About Me</a></li>
                                    <li><a href="{{ route("contact") }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
