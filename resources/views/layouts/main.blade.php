<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Local CSS --}}
    <link rel="stylesheet" href="{{ url('css/katalog.css?v=') . time() }}">
    <link rel="stylesheet" href="{{ url('css/style.css?v=') . time() }}">
    <link rel="stylesheet" href="{{ url('css/karya&kliping.css?v=') . time() }}">
    <!-- Bootstrap Bundle -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    {{-- added --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    {{-- ionicon --}}
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- --- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Logo Title -->
    <link rel="icon" href="{{ URL::asset('images/1.png') }}" type="image/x-icon">
    <title>Perpustakaan MAN 1 Yogyakarta </title>
</head>

<body>
    @include('partials.navbar')

    @yield('main-sec')
    {{-- Jquery 3.6.1 --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    @stack('script')
</body>
<footer>
    <div class=" pt-5 pb-5 mt-5 footer bg-dark">
        <div class="container  ">
            <div class="row">
                <div class="col-lg-4 col-xs-12 mb-4 location">
                    <h4 class="mt-lg-0 mt-sm-4">MAN 1 YOGYAKARTA</h4>
                    <p>Jalan C. Simanjutak No. 60 Yogyakarta 55223
                    </p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                        </svg><i class="ms-2 mr-3"></i>g-perpusman1diy@kemenag.go.id</p>

                    {{-- <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg><i class="ms-2 mr-3"></i>+62 858-6924-0876</p> --}}

                </div>

                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3">Website Terkait</h4>
                    <ul class="m-0 p-0">
                        <li><a class="text-white text-decoration-none" href="https://www.man1yogyakarta.sch.id/">Berita
                                Sekolah</a></li>
                        {{-- <li><a class="text-white text-decoration-none" href="http://103.247.15.166:8094/">E-Learning</a>
                        </li> --}}
                        <li><a class="text-white text-decoration-none"
                                href="https://sidimas.man1yogyakarta.sch.id/">SIDIMAS</a></li>
                    </ul>
                </div>
                <div class="col-lg-5 col-xs-12 pt-3 about-company">
                    <h2></h2>
                    <p class="pr-5 text-white-30">Perpustakaan Al-Hakim melayani peminjaman buku
                        bagi seluruh civitas MAN 1 Yogyakarta.</p>
                    <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i
                                class="fa fa-linkedin-square"></i></a></p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col copyright">
                    <hr>
                    <p class=""><small class="text-white-50">
                            © Hak Cipta 2022 - <a class="text-white text-decoration-none"
                                href="https://www.man1yogyakarta.sch.id//">MAN 1 YOGYAKARTA</a> | Pengelola Situs Web
                        </small></p>
                </div>
            </div>
        </div>
    </div>
</footer>

</html>
