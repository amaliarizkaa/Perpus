@extends('layouts.main')
@section('main-sec')
    <!-- Section-->
    <section class="py-5">

        <div class="container-search ms-5 mx-4 mt-5">

            {{-- Search Button --}}
            <div class="container">
                <div class="row m-2">
                    <form action="{{ url('/karya-ilmiah/search') }}" method="GET" class="col-auto">
                        <div class="input-group ">
                            <button class="cari ms-2" href="">Cari</button>
                            <input type="search" value="" class="form-control rounded"
                                placeholder="Cari Judul atau Penulis..." name="search" aria-describedby="search-addon" />
                        </div>

                    </form>

                    {{-- <div class="row ms-2  col-lg-2 ">

                        <input type="hidden" value="">
                        <select class="form-select" aria-label="Default select example">

                            <option selected>Kategori Penulis</option>
                            <option value="1">Kepala Madrasah</option>
                            <option value="2">Guru</option>
                            <option value="3">Tenaga Kependidikan</option>
                            <option value="3">Siswa</option>

                        </select>
                    </div> --}}
                </div>
            </div>
        </div>


        <div class="container px-4 px-lg-5 ">
            <br>
            <h1>Karya Tulis Ilmiah</h1>
            <br>

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center">
                @forelse ($karyailmiah as $item)
                    <div class="col mb-4"><a href="">
                            <div class="card h-100">
                                <!-- Product image--> <a href="{{ url('/karya-ilmiah/' . $item->slug) }}">
                                    <div class="image_3">
                                        <img class="image" src="{{ asset('uploads/' . $item->gambar_karya) }}"
                                            width="100" />
                                        <div class="middle">

                                        </div>
                                    </div>
                                </a>
                                <!-- Product details-->
                                <div class="card-body pt-"3>
                                    <a style="text-decoration:none" href="{{ url('/karya-ilmiah/' . $item->slug) }}">
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
                <h4>Karya Ilmiah tidak ditemukan!</h4>
            </div>
            @endforelse
    </section>
    <div class="d-flex">
        <div class="mx-auto"> {{ $karyailmiah->links() }}</div>
    </div>
@endsection
