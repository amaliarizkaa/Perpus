@extends('layouts.main')
@section('main-sec')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-2 mt-1">
            <a href="/karya-buku" class="buttonback"> <img class="back-katalog mt-5 "
                    src="{{ URL::asset('images/previous.png') }}"alt=""> </a>
            <div class="container py-5">
                <div class="row align-items-top">
                    <div class="col-lg-6 pb-5 pb-lg-0 ">

                        <img class="img-fluid mx-auto d-block" src="{{ asset('uploads/' . $karyabuku->gambar_karya) }}"
                            alt="">
                        <p class="callnum text-center">{{ $karyabuku->callnum }}</p>
                    </div>
                    <div class="col-lg-6">
                     
                        <h1 class="penerbit "> {{ $karyabuku->subjek }} | Penerbit : {{ $karyabuku->penerbit }}</h1>
                        <h1 class="judulbuku">{{ $karyabuku->judul }}</h1>
                        <h1 class="kecil">{{ $karyabuku->penulis }} - {{ $karyabuku->tahun }} | {{ $karyabuku->halaman }}</h1>
                        <h6 class="">
                            {{ $karyabuku->kategori_penulis->nama_kategori }}
                        </h6>
                        <p class="border-left border-primary">
                        <p>Deskripsi Singkat : <br>{{ strip_tags(preg_replace('/&#?[a-z0-9]{2,8};/i', '', $karyabuku->deskripsi)) }}</p>
                        </p>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('footer')
@endsection

