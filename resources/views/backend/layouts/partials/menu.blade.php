@include('backend.layouts.partials.css')
<body>
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">KeitBlog</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-2">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="{{asset('assets/img/'.auth()->user()->avatar)}}" alt="Profile" class="rounded-circle">
                </a>
            </li>
            <li class="nav-item dropdown pe-4"><a><span>ADMIN: <b>{{auth()->user()->fullname}}</b></span></a></li>
            <li class="nav-item dropdown pe-4">
                <span><a href="{{route('logout')}}">Đăng xuất </a></span>
            </li>
        </ul>
    </nav>


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link" data-bs-target="tables-nav" href="{{route('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('user-manager')}}">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý bài báo</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse ">
                    <li>
                        <a href="{{route('article-manager')}}">
                            <i class="bi bi-circle"></i><span>Quản lý bài viết</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('comment-manager')}}">
                            <i class="bi bi-circle"></i><span>Quản lý bình luận</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Quản lý Permission & Role</span>
                </a>
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Cấu hình chung</span>
                </a>
            </li>
        </ul>
    </aside>
</header>


<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

</body>
