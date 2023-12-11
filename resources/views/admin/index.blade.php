@extends('layouts.main-admin')

@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text ml-2">Beranda Admin</span>
        </div>
        <!-- Layanan Section Start -->
        <section id="layanan">
            <div class="container">
                <div class="row mt-2">

                    <div class="col-md-6 text-center">
                        <a href="/berita">
                            <div class="card-layanan">
                                <div class="circle-icon position-relative mx-auto">
                                    <img src="{{ URL::asset('images/art-icon.png') }}"
                                        class="position-absolute top-50 start-50 translate-middle" alt="">
                                </div>
                                <h3 class="mt-4">Jumlah Postingan Berita</h3>
                                <p class="mt-3">{{ $berita }}
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 text-center">
                        <a href="/buku">
                            <div class="card-layanan">
                                <div class="circle-icon position-relative mx-auto">
                                    <img src="{{ URL::asset('images/book-icon.png') }}"
                                        class="position-absolute top-50 start-50 translate-middle" alt="">
                                </div>
                                <h3 class="mt-4">Jumlah Postingan Buku</h3>
                                <p class="mt-3">{{ $buku }}
                                </p>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Layanan Section Stop -->
    @endsection
