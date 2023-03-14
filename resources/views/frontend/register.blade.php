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
        body {
            background-image: url('https://img.freepik.com/free-photo/stationery-near-glasses-keyboard-white-desk_23-2148128438.jpg?w=1380&t=st=1677641504~exp=1677642104~hmac=d4c74ca5ad26958cfda61c6aec384e7947cd6317cb9a2e7bcfeced919111dc1c');
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
                            <a href="{{route('register')}}" class="logo d-flex align-items-center w-auto">
                                <h2 class="d-none d-lg-block">KeitBlog</h2>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">ĐĂNG KÝ TÀI KHOẢN</h5>
                                    <p class="text-center small">Vui lòng nhập thông tin người dùng để tạo tài khoản
                                        mới</p>
                                </div>

                                <form method="POST" class="row g-3 needs-validation" novalidate
                                      enctype="multipart/form-data">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <h6 class="aside-tags"><i
                                                            class="bi bi-emoji-dizzy"></i> {{ $error }}</h6>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control" id="yourUsername"
                                                   required>
                                            <div class="invalid-feedback">Please choose a username.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                               required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Your Name</label>
                                        <input type="text" name="fullname" class="form-control" id="yourName" required>
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourAvatar" class="form-label">Your Avatar</label>
                                        <input type="file" name="avatar" class="form-control" id="yourAvatar" required>
                                        <div class="invalid-feedback">Please enter a valid Avatar!</div>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="role" class="form-control">
                                    </div>

                                    <div class="col-12"><br>
                                        <button class="btn btn-primary w-100" type="submit">Đăng ký</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng
                                                nhập</a></p>
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
</main>
</body>
</html>
