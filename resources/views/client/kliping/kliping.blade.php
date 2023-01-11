@extends('layouts.main')
@section('main-sec')
    <!-- Section-->
    <section class="py-5">

        <div class="container-search  ms-4 mx-4 mt-5">
            <div class="container">
                <div class="row m-2">

                    <form action="{{ url('/kliping/search') }}" method="GET" class="col-auto">
                        <div class="input-group ">
                            <button class="cari ms-2" href="">Cari</button>
                            <input type="search" value="" class="form-control rounded"
                                placeholder="Cari Tahun Terbit" name="search" aria-describedby="search-addon" />
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="container px-4 px-lg-5 ">
            <br>
            <h1>Kliping</h1>
            <br>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
                @forelse ($klipping as $item)
                    <img src="{{ asset('uploads/' . $item->gambar_klipping) }}" alt="" class="btn"
                        data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}">

                @empty
                    <div class="col-md-12 p-2 text-center">
                        <h4>Klipping tidak ditemukan!</h4>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal (di slug?)-->
        @foreach ($klipping as $data)
            <div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content ">

                        <button type="button" class="btn-close pt-3 ps-3" data-bs-dismiss="modal"
                            aria-label="Close"></button>

                        <div class="modal-body me-5 ">
                            <div class="container-fluid">
                                <img class="kliping-modal px-1" src="{{ asset('uploads/' . $data->gambar_klipping) }}"
                                    alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        {{-- end --}}

    </section>
    <div class="d-flex">
        <div class="mx-auto"> {{ $klipping->links() }}</div>
    </div>
@endsection
