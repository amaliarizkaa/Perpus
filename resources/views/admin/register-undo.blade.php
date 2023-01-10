<!doctype html>
<html lang="en">

<head>
    <title>Daftar Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- SCSS -->
    <link rel="stylesheet" href="scss/style.scss">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/login.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap daftar py-5">
                        <div class="img d-flex align-items-center justify-content-center"
                            style="background-image: url(images/1.png);"></div>
                        <h3 class="text-center mb-3">Daftar Admin</h3>
                        <p class="text-center">Portal Berita Perpustakaan MAN 1 Yogyakarta</p>
                        <form action="/register-undo/store" method="post" class="login-form">

                            @csrf

                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-user"></span></div>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap"
                                    autofocus required>
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-envelope"></span></div>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="fa fa-lock"></span></div>
                                <input type="password" name="password" id="password" data-toggle="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="mt-4 btn form-control btn-primary rounded submit px-3">DAFTAR</button>
                            </div>
                        </form>
                        <div class="w-100 text-center mt-5 text">
                            <a href="/admin">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
