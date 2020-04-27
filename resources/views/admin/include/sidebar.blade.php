<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <!-- SEARCH BAR -->
        <div id="search-bar">
            <input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
        </div>
        <!-- /SEARCH BAR -->

        <!-- SIDEBAR QUICK-LAUNCH -->
        <!-- <div id="quicklaunch">
        <!-- /SIDEBAR QUICK-LAUNCH -->

        <!-- SIDEBAR MENU -->
        <ul>
            <li class="{{menu_active('admin.dashboard')}}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            @if(is_admin())
            <li class="has-sub {{menu_collapse('app-configuration')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">App Configuration</span>
                    <span class="arrow {{menu_collapse('app-configuration')}}"></span>
                </a>
                <ul class="sub" style="display:{{sub_menu('app-configuration')}}" >
                    <li class="{{menu_active('admin.app-configuration')}}"><a href="{{route('admin.app-configuration')}}"><span class="sub-menu-text">Add App Configuration</span></a></li>
                    <li class="{{menu_active('admin.app-configuration.list')}}"><a href="{{route('admin.app-configuration.list')}}"><span class="sub-menu-text">List App Configuration</span></a></li>
                </ul>
            </li>

            <li class="has-sub {{menu_collapse('category')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-bars"></i> <span class="menu-text">Category</span>
                    <span class="arrow {{menu_collapse('category')}}"></span>
                </a>
                <ul class="sub" style="display:{{sub_menu('category')}}">
                    <li class="{{menu_active('admin.category.view')}}"><a href="{{route('admin.category.view')}}"><span class="sub-menu-text">Add Category</span></a></li>
                    <li class="{{menu_active('admin.category.list')}}"><a href="{{route('admin.category.list')}}"><span class="sub-menu-text">List Of Category</span></a></li>
                </ul>
            </li>

            <li class="has-sub {{menu_collapse('service')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-truck"></i> <span class="menu-text">Service</span>
                    <span class="arrow {{menu_collapse('service')}}"></span>
                </a>
                <ul class="sub" style="display: {{sub_menu('service')}}">
                    <li class="{{menu_active('admin.service.view')}}"><a href="{{route('admin.service.view')}}"><span class="sub-menu-text">Add Service</span></a></li>
                    <li class="{{menu_active('admin.service.list')}}"><a href="{{route('admin.service.list')}}"><span class="sub-menu-text">List Of Service</span></a></li>
                </ul>
            </li>

            <li class="has-sub {{menu_collapse('enquiry')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-question"></i> <span class="menu-text">Enquiry</span>
                    <span class="arrow {{menu_collapse('enquiry')}}"></span>
                </a>
                <ul class="sub" style="display: {{sub_menu('enquiry')}}">
                    <li class="{{menu_active('admin.enquiry.list')}}"><a href="{{route('admin.enquiry.list')}}"><span class="sub-menu-text">List Of Enquiry</span></a></li>
                </ul>
            </li>

            <li class="has-sub {{menu_collapse('setting')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-cog"></i> <span class="menu-text">Setting</span>
                    <span class="arrow {{menu_collapse('setting')}}"></span>
                </a>
                <ul class="sub" style="display: {{sub_menu('setting')}}">
                    <li class="{{menu_active('admin.setting.view')}}"><a href="{{route('admin.setting.view')}}"><span class="sub-menu-text">Add Setting</span></a></li>
                    <li class="{{menu_active('admin.setting.list')}}"><a href="{{route('admin.setting.list')}}"><span class="sub-menu-text">List Of Setting</span></a></li>
                </ul>
            </li>
            <li class="has-sub {{menu_collapse('testimonial')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-user"></i> <span class="menu-text">Testimonial</span>
                    <span class="arrow {{menu_collapse('testimonial')}}"></span>
                </a>
                <ul class="sub" style="display: {{sub_menu('testimonial')}}">
                    <li class="{{menu_active('admin.testimonial.view')}}"><a href="{{route('admin.testimonial.view')}}"><span class="sub-menu-text">Add Testimonial</span></a></li>
                    <li class="{{menu_active('admin.testimonial.list')}}"><a href="{{route('admin.testimonial.list')}}"><span class="sub-menu-text">List Of Testimonial</span></a></li>
                </ul>
            </li>

            <li class="has-sub {{menu_collapse('team')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i> <span class="menu-text">Team</span>
                    <span class="arrow {{menu_collapse('team')}}"></span>
                </a>
                <ul class="sub" style="display: {{sub_menu('team')}}">
                    <li class="{{menu_active('admin.team.view')}}"><a href="{{route('admin.team.view')}}"><span class="sub-menu-text">Add Team</span></a></li>
                    <li class="{{menu_active('admin.team.list')}}"><a href="{{route('admin.team.list')}}"><span class="sub-menu-text">List Of Team</span></a></li>
                </ul>
            </li>

            <li class="has-sub {{menu_collapse('slider')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-camera"></i> <span class="menu-text">Slider</span>
                    <span class="arrow {{menu_collapse('slider')}}"></span>
                </a>
                <ul class="sub" style="display:{{sub_menu('slider')}}">
                    <li class="{{menu_active('admin.slider.view')}}"><a href="{{route('admin.slider.view')}}"><span class="sub-menu-text">Add Slider</span></a></li>
                    <li class="{{menu_active('admin.slider.list')}}"><a href="{{route('admin.slider.list')}}"><span class="sub-menu-text">List Of Slider</span></a></li>
                </ul>
            </li>

            <li class="has-sub {{menu_collapse('post')}}">
                <a href="javascript:;" class="">
                    <i class="fa fa-book"></i> <span class="menu-text">Post</span>
                    <span class="arrow {{menu_collapse('post')}}"></span>
                </a>
                <ul class="sub" style="display:{{sub_menu('post')}}">
                    <li class="{{menu_active('admin.post.view')}}"><a href="{{route('admin.post.view')}}"><span class="sub-menu-text">Add Post</span></a></li>
                    <li class="{{menu_active('admin.post.list')}}"><a href="{{route('admin.post.list')}}"><span class="sub-menu-text">List Of Post</span></a></li>
                </ul>
            </li>

           @else
                <li class="has-sub {{menu_collapse('post')}}">
                    <a href="javascript:;" class="">
                        <i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text">Post</span>
                        <span class="arrow {{menu_collapse('post')}}"></span>
                    </a>
                    <ul class="sub" style="display:{{sub_menu('post')}}">
                        <li class="{{menu_active('admin.post.view')}}"><a href="{{route('admin.post.view')}}"><span class="sub-menu-text">Add Post</span></a></li>
                        <li class="{{menu_active('admin.post.list')}}"><a href="{{route('admin.post.list')}}"><span class="sub-menu-text">List Of Post</span></a></li>
                    </ul>
                </li>

          @endif

                </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div>
<!-- /SIDEBAR -->