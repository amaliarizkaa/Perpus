@extends('layouts.main')
@section('main-sec')
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-2 mt-1">
            <a href="/katalog" class="buttonback"> <img class="back-katalog mt-5 "
                    src="{{ URL::asset('images/previous.png') }}"alt=""> </a>
            <div class="container py-5">
                <div class="row align-items-top">
                    <div class="col-lg-6 pb-5 pb-lg-0 ">

                        <img class="img-fluid mx-auto d-block" src="{{ asset('uploads/' . $buku->gambar_buku) }}"
                            alt="">
                        <p class="callnum text-center">{{ $buku->callnum }}</p>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="judulbuku">{{ $buku->judul }}</h1>
                        <h1 class="kecil">{{ $buku->pengarang }} - {{ $buku->tahun }}</h1>
                        <h1 class="penerbit ">Penerbit : {{ $buku->penerbit }}</h1>
                        {{-- <h6 class="align-text-top  py-1 ">
                            {{ $buku->kategori_buku->nama_kategori }} / {{ $buku->subjek }}
                        </h6> --}}
                        <p class="border-left border-primary">
                        <p>{{ strip_tags(preg_replace('/&#?[a-z0-9]{2,8};/i', '', $buku->deskripsi)) }}</p>
                        </p>
                        <div class="row pt-3 justify-content-center">
                            <div class="col-6">
                                <div class="bg-light text-center p-4">
                                    <h3 class="total">{{ $buku->jumlah }}</h3>
                                    <h6 class="tot">Jumlah koleksi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @yield('footer')
@endsection
