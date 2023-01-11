@extends('layouts.main-admin')

@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text ml-2">Dashboard</span>
        </div>
        <!-- Layanan Section Start -->
        <section id="layanan">
            <div class="container">
                <div class="row mt-2">

                    <div class="col-md-4 text-center">
                        <a href="/artikel">
                            <div class="card-layanan">
                                <div class="circle-icon position-relative mx-auto">
                                    <img src="{{ URL::asset('images/art-icon.png') }}"
                                        class="position-absolute top-50 start-50 translate-middle" alt="">
                                </div>
                                <h3 class="mt-4">Artikel</h3>
                                <p class="mt-3">{{ $artikel }} Postingan
                                </p>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-4 text-center">
                        <div class="card-layanan">
                            <div class="circle-icon position-relative mx-auto">
                                <img src="{{ URL::asset('images/views-icon.png') }}"
                                    class="position-absolute top-50 start-50 translate-middle" alt="">
                            </div>
                            <h3 class="mt-4">Website Visitors</h3>
                            <p class="mt-3">{{ $counter }} Orang
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4 text-center">
                        <a href="/buku">
                            <div class="card-layanan">
                                <div class="circle-icon position-relative mx-auto">
                                    <img src="{{ URL::asset('images/book-icon.png') }}"
                                        class="position-absolute top-50 start-50 translate-middle" alt="">
                                </div>
                                <h3 class="mt-4">Koleksi Perpustakaan</h3>
                                <p class="mt-3">{{ $buku }} Postingan
                                </p>

                            </div>
                        </a>
                    </div>

                    <div class="card-bawah mt-4">
                        <div class="card-body text-center">
                            <div class="row">


                                <div class="col-md-3">
                                    <a href="/admin/karya-buku">
                                        <h3>Karya Buku</h3>
                                        <p>{{ $karyabuku }} Karya</p>
                                    </a>
                                </div>



                                <div class="col-md-3">
                                    <a href="/admin/karya-ilmiah">
                                        <h3>Karya T.I</h3>
                                        <p>{{ $karyailmiah }} Karya</p>
                                    </a>
                                </div>



                                <div class="col-md-3">
                                    <a href="/admin/karya-publikasi">
                                        <h3>Karya T.T</h3>
                                        <p>{{ $karyapub }} Karya</p>
                                    </a>
                                </div>



                                <div class="col-md-3">
                                    <a href="/admin/klipping">
                                        <h3>Kliping</h3>
                                        <p>{{ $klipping }} Post</p>
                                    </a>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Layanan Section Stop -->
    @endsection
