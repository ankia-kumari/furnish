<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/logo/favicon-16x16.png')}}">
    <title>{{$title ?? 'Admin Panel'}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/cloud-admin.css')}}" >
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/css/themes/default.css')}}" id="skin-switcher" >
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/css/responsive.css')}}" >
    <!-- STYLESHEETS --><!--[if lt IE 9]>
    <script type="text/javascript" src="{{asset('assets/js/flot/excanvas.min.js')}}">

    </script><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- ANIMATE -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animatecss/animate.min.css')}}" />
    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
    <!-- TODO -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/jquery-todo/css/styles.css')}}" />
    <!-- FULL CALENDAR -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/fullcalendar/fullcalendar.min.css')}}" />
    <!-- GRITTER -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

    <!-- HUBSPOT MESSENGER -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/hubspot-messenger/css/messenger.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/hubspot-messenger/css/messenger-spinner.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/hubspot-messenger/css/messenger-theme-air.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/hubspot-messenger/css/messenger-theme-block.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/hubspot-messenger/css/messenger-theme-flat.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/hubspot-messenger/css/messenger-theme-future.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/js/hubspot-messenger/css/messenger-theme-ice.min.css')}}" />

    <!-- DropeZone  -->
    <link rel="stylesheet" href="{{asset('dropzone/dist/min/dropzone.min.css')}}">
<style>
    .buttonload {
        background-color: #4CAF50; /* Green backgrbuttonLoaderound */
        border: none; /* Remove borders */
        color: white; /* White text */
        padding: 12px 24px; /* Some padding */
        font-size: 16px; /* Set a font-size */
    }

    /* Add a right margin to each icon */
    .buttonload+fa {
        margin-left: -12px;
        margin-right: 8px;
    }
</style>
</head>
<body>
<!-- HEADER -->
@include('admin.include.header')
<!--/HEADER -->

<!-- PAGE -->
<section id="page">
    <!-- SIDEBAR -->
    @include('admin.include.sidebar')
    <!-- /SIDEBAR -->
    <div id="main-content">
        <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->

        <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-12">
                    <!-- PAGE HEADER-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header">
                                <!-- STYLER -->

                                <!-- /STYLER -->
                                <!-- BREADCRUMBS -->
                                <ul class="breadcrumb">
                                    <li>
                                        <i class="fa fa-home"></i>
                                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                    </li>
                                    @if(is_array($breadcrum))
                                    <li>{{$breadcrum[0] ?? ''}}</li>
                                    <li>{{$breadcrum[1] ?? ''}}</li>
                                    @endif
                                </ul>
                                <!-- /BREADCRUMBS -->


                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- DASHBOARD CONTENT -->
                    <!-- /DASHBOARD CONTENT -->
                    <!-- HERO GRAPH -->
                    <!-- /HERO GRAPH -->
                    <!-- NEW ORDERS & STATISTICS -->
                    <!-- /NEW ORDERS & STATISTICS -->
                    <!-- CALENDAR & CHAT -->
                    <!-- /CALENDAR & CHAT -->
                    <!-- Validation Error -->
                    @include('admin.include.validation-errors')
                    <!-- Validation Error -->

                    <!-- content -->
                    @yield('content')
                    <!-- content -->

                    @include('admin.include.footer')

                </div><!-- /CONTENT-->
            </div>
        </div>
    </div>

</section>
<!--/PAGE -->
<!-- JAVASCRIPTS -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JQUERY -->
<script src="{{asset('assets/js/jquery/jquery-2.0.3.min.js')}}"></script>
<!-- JQUERY UI-->
<script src="{{asset('assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
<!-- BOOTSTRAP -->
<script src="{{asset('assets/bootstrap-dist/js/bootstrap.min.js')}}"></script>


<!-- DATE RANGE PICKER -->
<script src="{{asset('assets/js/bootstrap-daterangepicker/moment.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap-daterangepicker/daterangepicker.min.js')}}"></script>
<!-- SLIMSCROLL -->
<script type="text/javascript" src="{{asset('assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js')}}"></script>
<!-- SLIMSCROLL -->

<script type="text/javascript" src="{{asset('assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js')}}"></script>
<!-- BLOCK UI -->
<script type="text/javascript" src="{{asset('assets/js/jQuery-BlockUI/jquery.blockUI.min.js')}}"></script>
<!-- SPARKLINES -->
<script type="text/javascript" src="{{asset('assets/js/sparklines/jquery.sparkline.min.js')}}"></script>
EASY PIE CHART
<script src="{{asset('assets/js/jquery-easing/jquery.easing.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/easypiechart/jquery.easypiechart.min.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{asset('assets/js/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.selection.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.stack.min.js')}}"></script>
<script src="{{asset('assets/js/flot/jquery.flot.crosshair.min.js')}}"></script>

<!-- TODO -->
<script type="text/javascript" src="{{asset('assets/js/jquery-todo/js/paddystodolist.js')}}"></script>
<!-- TIMEAGO -->
<script type="text/javascript" src="{{asset('assets/js/timeago/jquery.timeago.min.js')}}"></script>
<!-- FULL CALENDAR -->
<script type="text/javascript" src="{{asset('assets/js/fullcalendar/fullcalendar.min.js')}}"></script>
<!-- COOKIE -->
<script type="text/javascript" src="{{asset('assets/js/jQuery-Cookie/jquery.cookie.min.js')}}"></script>
<!-- GRITTER -->
<script type="text/javascript" src="{{asset('assets/js/gritter/js/jquery.gritter.min.js')}}"></script>
<!-- TABLE CLOTH -->
<script type="text/javascript" src="{{asset('assets/js/tablecloth/js/jquery.tablecloth.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tablecloth/js/jquery.tablesorter.min.js')}}"></script>

{{--FORMS--}}
<!-- TYPEHEAD -->
<script type="text/javascript" src="{{asset('assets/js/typeahead/typeahead.min.js')}}"></script>
<!-- AUTOSIZE -->
<script type="text/javascript" src="{{asset('assets/js/autosize/jquery.autosize.min.js')}}"></script>
<!-- COUNTABLE -->
<script type="text/javascript" src="{{asset('assets/js/countable/jquery.simplyCountable.min.js')}}"></script>
<!-- INPUT MASK -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
<!-- FILE UPLOAD -->
<script type="text/javascript" src="{{asset('assets/js/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
<!-- SELECT2 -->
<script type="text/javascript" src="{{asset('assets/js/select2/select2.min.js')}}"></script>
<!-- UNIFORM -->
<script type="text/javascript" src="{{asset('assets/js/uniform/jquery.uniform.min.js')}}"></script>
<!-- JQUERY UPLOAD -->
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="{{asset('assets/js/blueimp/javascript-template/tmpl.min.js')}}"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="{{asset('assets/js/blueimp/javascript-loadimg/load-image.min.js')}}"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src=""></script>{{asset('assets/js/blueimp/javascript-canvas-to-blob/canvas-to-blob.min.js')}}
<!-- blueimp Gallery script -->
<script src="{{asset('assets/js/blueimp/gallery/jquery.blueimp-gallery.min.js')}}"></script>
<!-- The basic File Upload plugin -->
<script src="{{asset('assets/js/jquery-upload/js/jquery.fileupload.min.js')}}"></script>
<!-- The File Upload processing plugin -->
<script src="{{asset('assets/js/jquery-upload/js/jquery.fileupload-process.min.js')}}"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="{{asset('assets/js/jquery-upload/js/jquery.fileupload-image.min.js')}}"></script>
<!-- The File Upload audio preview plugin -->
<script src="{{asset('assets/js/jquery-upload/js/jquery.fileupload-audio.min.js')}}"></script>
<!-- The File Upload video preview plugin -->
<script src="{{asset('assets/js/jquery-upload/js/jquery.fileupload-video.min.js')}}"></script>
<!-- The File Upload validation plugin -->
<script src="{{asset('assets/js/jquery-upload/js/jquery.fileupload-validate.min.js')}}"></script>
<!-- The File Upload user interface plugin -->
<script src="{{asset('assets/js/jquery-upload/js/jquery.fileupload-ui.min.js')}}"></script>
<!-- The main application script -->
<script src="{{asset('assets/js/jquery-upload/js/main.js')}}"></script>

<!-- ISOTOPE -->
<script type="text/javascript" src="{{asset('assets/js/isotope/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/isotope/imagesloaded.pkgd.min.js')}}"></script>
<!-- COLORBOX -->
<script type="text/javascript" src="{{asset('assets/js/colorbox/jquery.colorbox.min.js')}}"></script>

<!-- HUBSPOT MESSENGER -->
<script type="text/javascript" src="{{asset('assets/js/hubspot-messenger/js/messenger.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/hubspot-messenger/js/messenger-theme-flat.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/hubspot-messenger/js/messenger-theme-future.js')}}"></script>

@yield('scripts')
<!-- CUSTOM SCRIPT -->
<script src="{{asset('assets/js/script.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
     //  App.setPage("gallery");  //Set current page
       App.init(); //Initialise plugins and elements
    });
</script>
<!-- /JAVASCRIPTS -->
</body>
</html>
