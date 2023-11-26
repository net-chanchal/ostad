<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="menu_links">
                        <ul>
                            <li><a href="{{ route("projects") }}">Projects</a></li>
                            <li><a href="{{ route("about") }}">About Me</a></li>
                            <li><a href="{{ route("contact") }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="socail_links">
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        Copyright &copy; {{ date("Y") }} All rights reserved | Developed by
                        <a href="https://chanchal.net" target="_blank">chanchal.net</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
