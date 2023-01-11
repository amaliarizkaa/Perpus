@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Jenis Koleksi</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        {{-- Button Tambah Kategori --}}
        <div class="container btn-container mt-3">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary">
                Tambah Jenis
            </a>
        </div>
        {{-- Button Tambah Kategori End --}}

        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jenis Koleksi</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($katbuk as $item)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->slug }}</td>
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
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Jenis</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/buku/kategoribuk/store" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Jenis</label>
                                <input type="text" name="nama_kategori" id="nama_kategori"
                                    class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Jenis Koleksi"
                                    autofocus required>
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
        @foreach ($katbuk as $data)
            <div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Jenis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/buku/kategoribuk/edit/' . $data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama_kategori" class="form-label">Nama Jenis</label>
                                    <input type="text" name="nama_kategori" id="nama_kategori"
                                        class="form-control @error('nama_kategori') is-invalid @enderror"
                                        placeholder="Jenis" value="{{ $data->nama_kategori }}">
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
                    var kategori_id = $(this).attr('data-id');
                    swal({
                            title: "Yakin?",
                            text: "Kamu akan menghapus data Kategori Buku ini!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/buku/kategoribuk/delete/" + kategori_id + ""
                                swal("Data Kategori Buku Berhasil Dihapus!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Kategori Buku Tidak Jadi Dihapus!");
                            }
                        });
                });
            </script>
        @endpush
        @include('sweetalert::alert')
    @endsection
