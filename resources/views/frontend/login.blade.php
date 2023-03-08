<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>KeitBlog - Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="/assets/css/variables.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <style>
        body{
            background-image: url('https://img.freepik.com/free-photo/stationery-near-glasses-keyboard-white-desk_23-2148128438.jpg?w=1380&t=st=1677641504~exp=1677642104~hmac=d4c74ca5ad26958cfda61c6aec384e7947cd6317cb9a2e7bcfeced919111dc1c') ;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="{{route('login')}}" class="logo d-flex align-items-center w-auto">
                                <h2>KeitBlog</h2>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Đăng nhập với tài khoản của bạn</h5>
                                    <p class="text-center small">Vui lòng nhập Username & Password để đăng nhập</p>
                                </div>

                                <form method="POST" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control" id="yourUsername" placeholder="Your Username"  required>
                                            <div class="invalid-feedback">Please enter your username.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Your Password"  required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Bạn chưa có tài khoản? <a href="{{route('register')}}">Tạo tài khoản mới</a></p>
                                    </div>
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->


{{--<section id="contact" class="contact">--}}
{{--    <div class="container">--}}
{{--        <div class="text-center">--}}
{{--            <h2>Chào mừng bạn đến với KeitBlog</h2>--}}
{{--        </div><br><br>--}}
{{--        <div class="text-center">--}}
{{--            <h2>ĐĂNG NHẬP</h2>--}}
{{--        </div>--}}

{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-6">--}}
{{--                <form action="forms/contact.php" method="post" role="form" class="php-email-form">--}}
{{--                    <div class="form-group mt-3">--}}
{{--                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-3">--}}
{{--                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>--}}
{{--                    </div>--}}
{{--                    <div class="my-3">--}}
{{--                        <div class="loading">Loading</div>--}}
{{--                        <div class="error-message"></div>--}}
{{--                        <div class="sent-message">Your message has been sent. Thank you!</div>--}}
{{--                    </div>--}}
{{--                    <div class="text-center"><button type="submit">Đăng nhập</button></div><br>--}}
{{--                    <div class="text-center"><a href=""><i class="bi bi-chevron-right"></i> Bạn chưa có tài khoản ?<i class="bi bi-chevron-left"></i></a></div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--</section><!-- End Contact Us Section -->--}}

</main><!-- End #main -->
</body>
</html>
