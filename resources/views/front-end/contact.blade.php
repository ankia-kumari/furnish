@extends('front-end.include.layout')
@section('content')

    <!-- inner banner -->
    <section class="inner-banner">
        <div class="container">
            <h3 class="text-center">Contact Page</h3>
        </div>
    </section>
    <!-- //inner banner -->

    <!-- page details -->
    <div class="breadcrumb-agile">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Contact Us</li>
            </ol>
        </div>
    </div>
    <!-- //page details -->

    <!-- contact -->
    <section class="contact py-5">
        <!-- contact content -->
        <div class="contact-cont pb-3">
            <div class="container">
                <div class="row mail-w3l-w3pvt-">
                    <div class="col-lg-6">
                        <div class="w3pvt-info_mail_grid_right">
                            <form action="{{route('contact')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email Id" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Enter Message Here" required=""></textarea>
                                </div>
                                <button type="submit" class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-lg-0 mt-5">
                        <div class="contact-left-w3ls">
                            <h3>Contact Info</h3>
                            <div class="row visit">
                                <div class="col-md-1 col-sm-2 col-2 contact-icon-wthree  pl-2 pr-0">
                                    <span class="fa fa-home" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-11 col-sm-10 col-10 contact-text-w3pvt-info">
                                    <h4>{{$footer_data['visit_us']->title ?? ''}}</h4>
                                    <p>{{$footer_data['visit_us']->value ?? ''}}</p>
                                </div>
                            </div>
                            <div class="row mail-w3 my-4">
                                <div class="col-md-1 col-sm-2 col-2 contact-icon-wthree pl-2 pr-0">
                                    <span class="fa fa-envelope-open-o" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-11 col-sm-10 col-10 contact-text-w3pvt-info">
                                    <h4>{{$footer_data['mail_us']->title ?? ''}}</h4>
                                    <p><a href="mailto:info@examplemail.com">{{$footer_data['mail_us']->value ?? ''}}</a></p>
                                </div>
                            </div>
                            <div class="row call">
                                <div class="col-md-1 col-sm-2 col-2 contact-icon-wthree pl-2 pr-0">
                                    <span class="fa fa-phone" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-11 col-sm-10 col-10 contact-text-w3pvt-info">
                                    <h4>{{$footer_data['call_us']->title ?? ''}}</h4>
                                    <p>{{$footer_data['call_us']->value ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //contact content -->
    </section>
    <!-- //contact -->

    <!-- map -->
    <div class="map p-2">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28477.39549865911!2d75.80039678584092!3d26.85030537187197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db67377871437%3A0x6d191b0b94eae76b!2sMalviya%20Nagar%2C%20Jaipur%2C%20Rajasthan%20302017!5e0!3m2!1sen!2sin!4v1587985172172!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
    <!-- //map -->


@endsection