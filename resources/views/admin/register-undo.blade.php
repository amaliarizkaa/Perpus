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

    <link rel="stylesheet" href="{{ url('css/login.css?v=') . time() }}">

    <!-- Logo Title -->
    <title>Register Perpus App</title>

</head>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col register-card">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <img src="images/register.jpg" alt="" class="w-100">
                    </div>
                    <div class="col d-flex flex-column justify-content-center align-items-center form-card-container">
                        <div class="row mb-4">
                            <div class="col register-text">
                                Daftar Admin
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-card">
                                <form action="/register-undo/store" method="post" class="login-form">

                                    @csrf

                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i
                                                    class="fa fa-solid fa-user fa-xl"></i></span>
                                            <input type="name" class="form-control" id="name" name="name"
                                                placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i
                                                    class="fa fa-solid fa-envelope fa-sm"></i></span>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text"><i
                                                    class="fa fa-solid fa-lock fa-xl"></i></span>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-center align-items-center my-4">
                                        <button type="submit"
                                            class="btn form-control btn-warning rounded submit">DAFTAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
