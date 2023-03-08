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
<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="text-center">
                <h2>Chào mừng bạn đến với KeitBlog</h2>
            </div>
            <br><br>
            <div class="text-center"><h2>ĐĂNG KÝ TÀI KHOẢN</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="fullname" id="fullname"placeholder="Your Name" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                   required></div>
                        <div class="form-group mt-3"><input type="password" class="form-control" name="password"
                                                            id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="file" class="form-control" name="avatar" id="email" placeholder="Avatar"
                                   required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="hidden" class="form-control" name="role">
                        </div>
                        <div class="text-center">
                            <button type="submit">Đăng ký</button>
                        </div>
                        @csrf
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Us Section -->
</main>
</body>
</html>
