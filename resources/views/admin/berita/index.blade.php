@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Berita</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif

        <div class="btn-tambah mx-4 flex text-center">
            <a type="button" class="btn-link py-2" data-bs-toggle="modal" data-bs-target="#tambahModal" href="#"
                data-bs-backdrop="static" data-bs-keyboard="false">
                Tambah
            </a>
        </div>

        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Author</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Views</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($berita as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td><img src="{{ URL::asset('uploads/' . $item->gambar_berita) }}" width="100"></td>
                            <td>{{ date('d M Y', strtotime($item->updated_at)) }}</td>
                            <td>{{ $item->views }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->berita_id }}"
                                    class="btn btn-warning btn-xs"><i class="bx bx-edit"></i></a>
                                <a href="#"id="deleteBerita" class="btn btn-danger btn-xs delete"
                                    data-id="{{ $item->berita_id }}"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Table End --}}

        <!-- Modal Tambah -->
        <div class="modal fade w-100" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="tambahModalLabel" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-center"class="modal-title" id="tambahModalLabel">Form Input Berita</h5>
                        <button type="button" class="btn-close" data-bs-target="#alertModal"
                            data-bs-toggle="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/berita/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Berita</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid body @enderror"
                                    placeholder="Judul Berita" autofocus required>
                            </div>
                            <div class="mb-3">

                                <label for="body" class="form-label">Isi Berita</label>
                                <textarea name="body" id="froala" class="form-control @error('body') is-invalid @enderror" autofocus required
                                    width="100"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_berita" class="form-label">Gambar Berita</label>
                                <input type="file" name="gambar_berita" id="gambar_berita"
                                    class="form-control @error('gambar_berita') is-invalid @enderror">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn-tambah mx-4 flex text-center">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        @foreach ($berita as $data)
            <div class="modal fade" id="editModal-{{ $data->berita_id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Form Edit Berita</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/berita/edit/' . $data->berita_id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Berita</label>
                                    <input type="text" name="judul" id="judul"
                                        class="form-control @error('judul') is-invalid body @enderror"
                                        value="{{ $data->judul }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <textarea id="froala" name="body" class="form-control @error('body') is-invalid @enderror" autofocus>{{ $data->body }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_berita" class="form-label">Gambar Berita</label>
                                    <input type="file" name="gambar_berita" id="gambar_berita"
                                        class="form-control @error('gambar_berita') is-invalid @enderror mb-3" autofocus>
                                    <label for="gambar_berita" class="form-label">Gambar Berita Saat Ini</label>
                                    <br>
                                    <img src="{{ asset('uploads/' . $data->gambar_berita) }}" width="100">
                                    <br>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-tambah mx-4 flex text-center">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Dismiss Modal --}}

        <div class="modal fade" id="alertModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true"
            aria-labelledby="tambahModalLabel" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Form Input Berita</h1>
                    </div>
                    <div class="modal-body">
                        Yakin ingin membatalkan proses input form berita?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" data-bs-dismiss="modal" data-bs-toggle="modal">Ya</button>

                        <button class="btn btn-primary" data-bs-target="#tambahModal"
                            data-bs-toggle="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
        @push('script')
            {{-- SweetALert JS --}}
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
            <script>
                $('.delete').click(function() {
                    var berita_id = $(this).attr('data-id');
                    swal({
                            title: "Yakin?",
                            text: "Kamu akan menghapus data berita ini!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/berita/delete/" + berita_id + ""
                                swal("Data Berita Berhasil Dihapus!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Tidak Jadi Dihapus!");
                            }
                        });
                });
            </script>
        @endpush
        @include('sweetalert::alert')
    @endsection
