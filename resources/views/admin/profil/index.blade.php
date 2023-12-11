@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">
            <span class="text">Kelola Profil</span>

        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        <div class="btn-tambah mx-4 flex text-center">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn-link py-2">
                Tambah
            </a>
        </div>

        {{-- Table Start --}}
        <div class="table-profile m-4">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Deskripsi</th>
                        <th>User</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($profil as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td>{{ date('d-M-y', strtotime($item->updated_at)) }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}"
                                    class="btn btn-warning btn-xs"><i class="bx bx-edit"></i></a>
                                <a href="#"id="deleteProfil" class="btn btn-danger btn-xs delete"
                                    data-id="{{ $item->id }}"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Table End --}}
        <!-- Modal Tambah -->
        <div class="modal fade w-100" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Form Input Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/profil/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title Profil</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid body @enderror"
                                    placeholder="Profil Perpustakaan Sekolah" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" autofocus required
                                    width="100"></textarea>
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
        @foreach ($profil as $data)
            <div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Profil {{ $data->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/admin/profil/edit/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title Profil</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid body @enderror"
                                        value="{{ $data->title }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea id="froala" name="description" class="form-control @error('description') is-invalid @enderror" autofocus>{{ $data->description }}</textarea>
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
        @push('script')
            {{-- SweetALert JS --}}
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
            <script>
                $('.delete').click(function() {
                    var profil_id = $(this).attr('data-id');
                    swal({
                            title: "Yakin?",
                            text: "Kamu akan menghapus data Profil!?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/profil/delete/" + profil_id + ""
                                swal("Data Profil Berhasil Dihapus!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Profil Tidak Jadi Dihapus!");
                            }
                        });
                });
            </script>
        @endpush
        @include('sweetalert::alert')
    </section>
@endsection
