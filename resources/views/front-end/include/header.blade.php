<header class="py-sm-3 pt-3 pb-2" id="home">
    <div class="container">
        <!-- nav -->
        <div class="top d-md-flex">
            <div id="logo">
                <h1> <a href="{{route('home')}}"><span class="fa fa-meetup"></span> Furnish</a></h1>
            </div>

            <div class="search-form mx-md-auto">
                    <div class="n-right-w3ls">
                        <input class="search" type="text" name="search" placeholder="Search..." required="" id="search">
                        <button type="button" class="form-control btn" value=""><span class="fa fa-search"></span></button>
                        <ul id="myUL">
                            
                        </ul>
                    </div>
            </div>

            @guest
            <div class="forms mt-md-0 mt-2">
                <a href="{{route('login')}}" class="btn"><span class="fa fa-user-circle-o"></span> Sign In</a>
                <a href="{{route('register')}}" class="btn"><span class="fa fa-pencil-square-o"></span> Create Account</a>
            </div>
             @else
                <div><a href="{{route('admin.dashboard')}}">{{\Illuminate\Support\Facades\Auth::user()->name ?? 'Admin'}}</a> </div>

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
                <li class="mr-lg-4 mr-2 {{ menu_active_front('home') }}">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="mr-lg-4 mr-2 {{ menu_active_front('about') }}">
                    <a href="{{route('about')}}">About Us</a>
                </li>
                <li class="mr-lg-4 mr-2 {{ menu_active_front('services') }}">
                    <a href="{{route('services')}}">Services</a>
                </li>
                <li class="mr-lg-4 mr-2 {{ menu_active_front('categories') }}">
                    <a href="{{route('categories')}}">Categories</a>
                </li>
                <li class="mr-lg-4 mr-2 {{ menu_active_front('blog.view') }}">
                    <a href="{{route('blog.view')}}">Blog</a>
                </li>
                <li class="{{ menu_active_front('contact.view') }}">
                    <a href="{{route('contact.view')}}">Contact</a>
                </li>
            </ul>
        </nav>
        <!-- //nav -->
    </div>
</header>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

{{-- for frontend search  --}}
<script type="text/javascript">

// $('#search').change(function () {
//     alert($('#selector').val());
// });
$('#search').keyup(function() {

    var search = $('#search').val();

    $.ajax({

        type: "POST",
        url: "{{ route('search') }}",

        data: {"search": search, "_token":"{{ csrf_token() }}"},

        success: function(response){
           
           if(response.status == true) {
            // var post_data_array = [];

            // $.each(response.post_title_data,function(id, title){
            //     var obj = {}
            //     // post_data_array.push({
            //     //     "lable" : title,
            //     //     "link_url" : "{{ url('blog/') }}"+id
            //     // });

            //     obj["label"] = title,
            //     obj["link_url"] = "{{ url('blog') }}"+"/"+id
            //     post_data_array.push(obj)
                
            // });
               // console.log(response.post_title_data)
            $("#search").autocomplete({
                source: response.post_title_data,
                select:function(e,ui) {
                window.location.href = ui.item.the_link;
                }
            });
           }
         
        },
        error: function(){
            console.log('fghj')
        }
    });
});

// {{-- for frontend search  --}}
</script>