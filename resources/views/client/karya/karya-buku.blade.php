@extends('layouts.main')
@section('main-sec')
    <!-- Section-->
    <section class="py-5">

        <div class="container-search ms-5 mx-4 mt-5">

            {{-- Search Button --}}
            <div class="container">

                <div class="row m-2">
                    <form action="{{ url('/karya-buku/search') }}" method="GET" class="col-auto">
                        <div class="input-group ">
                            <button class="cari ms-2" href="">Cari</button>
                            <input type="search" value="" class="form-control rounded"
                                placeholder="Cari judul atau penulis karya..." name="search"
                                aria-describedby="search-addon" />
                        </div>
                    </form>
                    {{-- <div class=" row ms-2 col-lg-2">
                        <select id="kategori" class="form-select" aria-label="Default select example">
                            @foreach ($katbuk as $kategori)
                                <option value="{{ $kategori->id }}" selected><a
                                        href="{{ url('/karya-buku/' . $kategori->slug) }}">{{ $kategori->kategori_penulis->nama_kategori }}</a>
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="container px-4 px-lg-5 ">
            <br>
            <h1>Karya Buku</h1>
            <br>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center">
                @forelse ($karyabuku as $item)
                    <div class="col mb-4"><a href="">

                            <div class="card h-100">
                                <a href="{{ url('/karya-buku/' . $item->slug) }}">
                                    <!-- Product image-->
                                    <div class="image_3">
                                        <img class="image" src="{{ asset('uploads/' . $item->gambar_karya) }}"
                                            width="100" />

                                    </div>
                                </a>
                                <!-- Product details-->
                                <div class="card-body pt-"3>
                                    <a style="text-decoration:none" href="{{ url('/karya-buku/' . $item->slug) }}">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="judul-buku  fw-bolder">{{ $item->judul }}</h5>
                                            <!-- Product price-->
                                            <p class="penulis-buku">{{ $item->penulis }}</p>
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>

        @empty
            <div class="col-md-12 p-2 text-center">
                <h4>Karya Buku tidak ditemukan!</h4>
            </div>
            @endforelse

    </section>
    <div class="d-flex">
        <div class="mx-auto"> {{ $karyabuku->links() }}</div>
    </div>
@endsection
{{-- @forelse ($buku as $item)
    <div class="col mb-4"><a href="{{ url('/katalog/' . $item->slug) }}">
            <div class="card h-100">
                <!-- Product image-->
                <div class="image_3">
                    <img class="image" src="{{ asset('uploads/' . $item->gambar_buku) }}" width="100" />
                    <div class="middle">
                        <a class="btn btn-outline-light mt-auto" href="{{ url('/katalog/' . $item->slug) }}">Detail</a>
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
@endforelse --}}
