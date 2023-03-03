<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">KeitBlog</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem
                        deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis
                        qui aliquid blanditiis omnis quae. Explicabo?</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Thanh điều hướng</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="{{route('home')}}"><i class="bi bi-chevron-right"></i> Trang chủ</a></li>
                        <li><a><i class="bi bi-chevron-right"></i> Danh mục bài viết</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Danh mục bài viết</h3>
                    <ul class="footer-links list-unstyled">
                        @yield('footer-cat')
{{--                        <li><a href="@yield('footer-categories-id')"><i class="bi bi-chevron-right"></i> @yield('footer-categories-id')</a></li>--}}
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Liên hệ</h3>
                    <p><i class="bi bi-chevron-right"></i>Email: tvkiet@ninepoints.vn</p>
                </div>
            </div>
        </div>
    </div>
</footer>
