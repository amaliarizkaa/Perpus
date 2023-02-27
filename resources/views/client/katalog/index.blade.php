@extends('layouts.main')
@section('main-sec')
    <!-- Section-->
    <section class="py-5">

        <div class="container-search ms-5 mx-4 mt-5">

            {{-- Search Button --}}
            <div class="container">
                <div class="row m-2">
                    <form action="{{ url('/katalog/search') }}" method="GET" class="col-auto">
                        <div class="input-group">
                            <button class="cari ms-2" href="">Cari</button>
                            <input type="search" value="" class="form-control rounded"
                                placeholder="Cari Judul atau Penulis..." name="search" aria-describedby="search-addon" />
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container px-4 px-lg-5 ">
            <br>
            <h1>Rekomendasi Bacaan</h1>
            <br>

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center">

                @forelse ($buku as $item)
                    <div class="col mb-4"><a href="{{ url('/katalog/' . $item->slug) }}">
                            <div class="card h-100">
                                <!-- Product image-->
                                <div class="image_3">
                                    <img class="image" src="{{ asset('uploads/' . $item->gambar_buku) }}" width="100" />
                                    <div class="middle">
                                        <a class="btn btn-outline-light mt-auto"
                                            href="{{ url('/katalog/' . $item->slug) }}">Detail</a>
                                    </div>
                                </div>
                                <!-- Product details-->
                                <div class="card-body pt-"3>
                                    <a style="text-decoration:none" href="{{ url('/katalog/' . $item->slug) }}">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="judul-buku  fw-bolder">{{ $item->judul }}</h5>
                                            <!-- Product price-->
                                            <p class="penulis-buku">{{ $item->pengarang }}</p>
                                    </a>
                                </div>
                            </div>
                    </div>
                    </a>
            </div>
        @empty
            <div class="col-md-12 p-2 text-center">
                <h4>Buku tidak ditemukan!</h4>
            </div>
            @endforelse
        </div>
        {{-- <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center">
                @foreach ($buku as $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <div class="image_3">
                                <img class="image" src="{{ asset('uploads/' . $item->gambar_buku) }}" width="100" />
                                <div class="middle">
                                    <a class="btn btn-outline-dark mt-auto"
                                        href="{{ url('/katalog/' . $item->slug) }}">Detail</a>
                                </div>
                            </div>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $item->judul }}</h5>
                                    <!-- Product price-->
                                    {{ $item->pengarang }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}
    </section>
    <div class="d-flex">
        <div class="mx-auto"> {{ $buku->links() }}</div>
    </div>
@endsection
