<!-- footer -->
<footer class="footer py-5">
    <div class="container py-md-3">
        <div class="footer-grid_section text-center">
            <div class="footer-title mb-3">
                <h2> <a href="index.html"><span class="fa fa-meetup"></span> {{$footer_data['furnish']->title ?? ''}}</a></h2>
            </div>
            <div class="footer-text">
                <p>{{$footer_data['furnish']->value ?? ''}}</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 mb-lg-0 mb-4 footer-top">
                <h4 class="mb-4 w3f_title text-uppercase">Contact Info</h4>
                <div class="footer-style-w3ls my-2">
                    <p> {{$footer_data['visit_us']->value ?? ''}}</p>
                </div>
                <div class="footer-style-w3ls my-2">
                    <p>{{$footer_data['call_us']->value ?? ''}}</p>
                </div>
                <div class="footer-style-w3ls">
                    <p> <a href="mailto:info@examplemail.com">{{$footer_data['mail_us']->value ?? ''}}</a></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6 footv3-left">
                <h4 class="mb-md-4 mb-3 w3f_title text-uppercase">Company</h4>
                <ul class="list-agileits">
                    <li class="my-2">
                        <a href="about.html">
                            About Us
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#">
                            Terms of use
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="#">
                            Faq's
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="#">
                            Privacy Ploicy
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            Get In Touch
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <h4 class="mb-md-4 mb-3 w3f_title text-uppercase">Categories</h4>
                <ul class="list-agileits">
                    <li class="my-2">
                        <a href="#">
                            Furniture Chairs
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#">
                            Three Seater Sofas
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="#">
                            Dining Tables
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="#">
                            Office Chairs
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Kitchen Cabinets
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mt-md-0 mt-sm-5 mt-4">
                <h4 class="mb-md-4 mb-3 w3f_title text-uppercase">Resources</h4>
                <ul class="list-agileits">
                    <li class="my-2">
                        <a href="#">
                            Getting Started
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#">
                            Best Collections
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="categories.html">
                            All Categories
                        </a>
                    </li>
                    <li class="my-2">
                        <a href="#">
                            24/7 Support
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Contact for Help
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mt-md-0 mt-sm-5 mt-4">
                <h4 class="mb-md-4 mb-3 w3f_title text-uppercase">Account</h4>
                <ul class="list-agileits">
                    <li class="my-2">
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <a href="{{route('admin.dashboard')}}">
                                Dashboard
                            </a>
                        @else
                            <a href="login.html">
                                Sign In
                            </a>
                            @endif

                    </li>
                    @if(! \Illuminate\Support\Facades\Auth::check())
                    <li class="">
                        <a href="register.html">
                            Create Account
                        </a>
                    </li>
                        @endif
                </ul>
            </div>



        </div>
    </div>
    <!-- //footer bottom -->
</footer>
<!-- //footer -->

<!-- copyright -->
<section class="copy-right py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="">© {{date('Y')}} Furnish. All rights reserved | Design by
                    <a href="http://w3layouts.com"> W3layouts.</a> | Developed by Ankita Kumari
                </p>
            </div>
            <div class="col-md-4 mt-md-0 mt-4">
                <div class="subscribe-form">
                    <form action="#" method="post" class="newsletter">
                        <input class="subscribe" type="text" placeholder="Subscribe..." required="">
                        <button class="form-control btn" value=""><span class="fa fa-long-arrow-right"></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- copyright -->

<!-- move top icon -->
<a href="#home" class="move-top text-center"></a>
<!-- //move top icon -->