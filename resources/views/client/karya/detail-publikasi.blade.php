@extends('layouts.main')
@section('main-sec')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-2 mt-1">
            <a href="/karya-publikasi" class="buttonback"> <img class="back-katalog mt-5 "
                    src="{{ URL::asset('images/previous.png') }}"alt=""> </a>
            <div class="container py-5">
                <div class="row align-items-top">
                    <div class="col-lg-6 pb-5 pb-lg-0 ">

                        <img class="img-fluid mx-auto d-block" src="{{ asset('uploads/' . $karyapub->gambar_karya) }}"
                            alt="">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="penerbit ">Penerbit : {{ $karyapub->penerbit }} |  {{ $karyapub->edisi }}</h1>
                        <h1 class="judulbuku"> {{ $karyapub->judul_terbit }} / </h1>
                        <h3 class="judular">{{ $karyapub->judul }}</h3>

                        <h1 class="kecil">Ditulis Oleh : {{ $karyapub->penulis }} | {{ $karyapub->halaman }}</h1>
                        <h6 class="align-text-top  py-1 ">
                            {{ $karyapub->kategori_penulis->nama_kategori }}
                        </h6>
                        <p class="border-left border-primary">
                        <p>{{ strip_tags(preg_replace('/&#?[a-z0-9]{2,8};/i', '', $karyapub->deskripsi)) }}</p>
                        </p>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('footer')
@endsection
