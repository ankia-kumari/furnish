<header class="py-sm-3 pt-3 pb-2" id="home">
    <div class="container">
        <!-- nav -->
        <div class="top d-md-flex">
            <div id="logo">
                <h1> <a href="{{route('home')}}"><span class="fa fa-meetup"></span> Furnish</a></h1>
            </div>
            <div class="search-form mx-md-auto">
                <div class="n-right-w3ls">
                    <form action="#" method="post" class="newsletter">
                        <input class="search" type="text" placeholder="Search..." required="">
                        <button class="form-control btn" value=""><span class="fa fa-search"></span></button>
                    </form>
                </div>
            </div>

            @guest
            <div class="forms mt-md-0 mt-2">
                <a href="{{route('login')}}" class="btn"><span class="fa fa-user-circle-o"></span> Sign In</a>
                <a href="{{route('register')}}" class="btn"><span class="fa fa-pencil-square-o"></span> Create Account</a>
            </div>
             @else
                <div><a href="{{route('admin.dashboard')}}">{{\Illuminate\Support\Facades\Auth::user()->name ?? ''}}</a> </div>

                <div class="" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>


           @endguest
        </div>
        <nav class="text-center">
            <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
            <input type="checkbox" id="drop" />
            <ul class="menu">
                <li class="mr-lg-4 mr-2 active"><a href="{{route('home')}}">Home</a></li>
                <li class="mr-lg-4 mr-2"><a href="{{route('about')}}">About Us</a></li>
                <li class="mr-lg-4 mr-2"><a href="{{route('services')}}">Services</a></li>
                <li class="mr-lg-4 mr-2"><a href="{{route('categories')}}">Categories</a></li>
                <li class="mr-lg-4 mr-2"><a href="{{route('blog.view')}}">Blog</a></li>
                <li class=""><a href="{{route('contact.view')}}">Contact</a></li>
            </ul>
        </nav>
        <!-- //nav -->
    </div>
</header>