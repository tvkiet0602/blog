@include('frontend.layouts.partials.css')

{{--Nav--}}
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>KeitBlog</h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li class="dropdown"><a><span>Danh mục bài viết</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        {{--                            <li><a href="@yield('nav-cat-id')">@yield('nav-cat-name')</a></li>--}}
                        @yield('nav-cat')
                    </ul>
                </li>
                <li><a href="@yield('posts-add')">Tạo bài viết</a></li>
                <li><a href="{{route('logout-user')}}">Đăng xuất</a></li>
                <li><a>~ Xin chào <b> {{auth()->user()->fullname}}</b></a></li>
            </ul>
        </nav>
        <div class="position-relative" style="display: none;">
            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
            <a href="#" class="mx-2"><span class="bi-instagram"></span></a>
            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="search-result.html" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->
        </div>
    </div>
</header><!-- End Navbar -->
<body>

