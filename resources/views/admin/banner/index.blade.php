@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Daftar Tampilan Banner</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        {{-- Button Tambah banner --}}
        <div class="container btn-container mt-3">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary">
                Tambah Gambar Banner
            </a>
        </div>
        {{-- Button Tambah banner End --}}

        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Banner</th>
                        <th scope="col">Gambar Banner</th>
                        <th scope="col">Link</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($banner as $item)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $item->nama_banner }}</td>
                            <td><img src="{{ asset('uploads/' . $item->gambar_banner) }}" width="100"></td>
                            <td>{{ $item->link }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}"
                                    class="btn btn-warning btn-xs"><i class="bx bx-edit"></i></a>
                                <a rel="{{ $item->id }}" href="#"id="deleteKategori"
                                    class="btn btn-danger btn-xs delete" data-id="{{ $item->id }}"><i
                                        class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Table End --}}

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Model Mobil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/admin/daftar-banner/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_banner" class="form-label">Nama Gambar Banner</label>
                                <input type="text" name="nama_banner" id="nama_banner"
                                    class="form-control @error('nama_banner') is-invalid @enderror"
                                    placeholder="Headline Halaman Beranda" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_banner" class="form-label">File Gambar Banner</label>
                                <input type="file" name="gambar_banner" id="gambar_banner" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" name="link" id="link"
                                    class="form-control @error('link') is-invalid @enderror"
                                    placeholder="https://www.google.com" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                    <option value="1">Publish</option>
                                    required> <option value="0">Draft</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        @foreach ($banner as $data)
            <div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Slide Banner</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/admin/daftar-banner/edit/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama_banner" class="form-label">Nama Gambar Banner</label>
                                    <input type="text" name="nama_banner" id="nama_banner"
                                        class="form-control @error('nama_banner') is-invalid @enderror"
                                        value="{{ $data->nama_banner }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_banner" class="form-label">Gambar Banner</label>
                                    <input type="file" name="gambar_banner" id="gambar_banner"
                                        class="form-control @error('gambar_banner') is-invalid @enderror mb-3" autofocus>
                                    <label for="gambar_banner" class="form-label">Gambar Banner Saat Ini</label>
                                    <br>
                                    <img src="{{ asset('uploads/' . $data->gambar_banner) }}" width="100">
                                    <br>
                                </div>
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link</label>
                                    <input type="text" name="link" id="link"
                                        class="form-control @error('link') is-invalid @enderror"
                                        value="{{ $data->link }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ $data->status == '1' ? 'selected' : '' }}>Publish
                                        </option>
                                        <option value="0" {{ $data->status == '0' ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        @push('script')
            {{-- Jquery 3.6.1 --}}
            <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
            {{-- Datatables JS --}}
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable();
                });
            </script>
            {{-- SweetALert JS --}}
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
            <script>
                $('.delete').click(function() {
                    var banner_id = $(this).attr('data-id');
                    swal({
                            title: "Yakin?",
                            text: "Kamu akan menghapus data Gambar Banner ini?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/daftar-banner/delete/" + banner_id + ""
                                swal("Data Gambar Banner Berhasil Dihapus!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Gambar Banner Tidak Jadi Dihapus!");
                            }
                        });
                });
            </script>
        @endpush
        @include('sweetalert::alert')
    @endsection
