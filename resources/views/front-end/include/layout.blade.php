<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title ?? 'Furnish'}}</title>
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/logo/favicon-16x16.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content=" Furnish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- css files -->
    <link href="{{asset('front-end/css/bootstrap.css')}}" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="{{asset('front-end/css/style.css')}}" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="{{asset('front-end/css/font-awesome.min.css')}}" rel="stylesheet"><!-- fontawesome css -->
    <!-- //css files -->

    <link href="{{asset('front-end/css/css_slider.css')}}" type="text/css" rel="stylesheet" media="all">

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <!-- //google fonts -->

</head>
<body>
<!-- //header -->
@include('front-end.include.header')
<!-- //header -->

@yield('content')

<!-- footer -->
@include('front-end.include.footer')
<!-- //footer -->

<!-- copyright -->

<!-- copyright -->

<!-- move top icon -->

<!-- //move top icon -->

</body>
</html>