<!doctype html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- SCSS -->
    <link rel="stylesheet" href="scss/style.scss">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('css/login.css?v=') . time() }}">

    <!-- Logo Title -->
    <title>Login Perpus</title>
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
                                Login Admin
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-card">
                                <form action="/login" method="post" class="login-form">

                                    @csrf


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
                                            class="btn form-control btn-warning rounded submit">LOGIN</button>
                                    </div>
                                </form>

                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('loginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                @endif
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
