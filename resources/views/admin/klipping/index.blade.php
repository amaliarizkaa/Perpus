@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Klipping</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        {{-- Button Tambah Artikel --}}
        <div class="container btn-container mt-3">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary">
                Tambah Klipping
            </a>
        </div>
        {{-- Button Tambah Artikel End --}}
        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Pengupload</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($klipping as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td><img src="{{ storage_path('uploads/' . $item->gambar_klipping) }}" width="100"></td>
                            <td>{{ date('d-M-y', strtotime($item->updated_at)) }}</td>
                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-{{ $item->id }}"
                                    class="btn btn-warning btn-xs"><i class="bx bx-edit"></i></a>
                                <a href="#"id="deleteArtikel" class="btn btn-danger btn-xs delete"
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
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Klipping</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/klipping/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun Terbit</label>
                                <input type="number" name="tahun" id="judul"
                                    class="form-control @error('tahun') is-invalid body @enderror" placeholder="..."
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_klipping" class="form-label">Gambar</label>
                                <input type="file" name="gambar_klipping" id="gambar_klipping"
                                    class="form-control @error('gambar_klipping') is-invalid @enderror">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="is_active" class="form-label">Status</label>
                                <select name="is_active" class="form-control @error('status') is-invalid @enderror"
                                    required>
                                    <option value="1">Publish</option>
                                    required> <option value="0">Draft</option>
                                </select>
                            </div> --}}

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
        @foreach ($klipping as $data)
            <div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Klipping {{ $data->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/admin/klipping/edit/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun Terbit</label>
                                    <input type="number" name="tahun" id="tahun"
                                        class="form-control @error('tahun') is-invalid body @enderror"
                                        value="{{ $data->tahun }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_klipping" class="form-label">Gambar</label>
                                    <input type="file" name="gambar_klipping" id="gambar_klipping"
                                        class="form-control @error('gambar_klipping') is-invalid @enderror mb-3" autofocus>
                                    <label for="gambar_klipping" class="form-label">Gambar Klipping Saat Ini</label>
                                    <br>
                                    <img src="{{ URL::asset('uploads/' . $data->gambar_klipping) }}" width="100">
                                    <br>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="is_active" class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" {{ $data->is_active == '1' ? 'selected' : '' }}>Publish
                                        </option>
                                        <option value="0" {{ $data->is_active == '0' ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                </div> --}}

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
            {{-- SweetALert JS --}}
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
            <script>
                $('.delete').click(function() {
                    var buku_id = $(this).attr('data-id');
                    swal({
                            title: "Yakin?",
                            text: "Kamu akan menghapus data Klipping!?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/klipping/delete/" + buku_id + ""
                                swal("Data Klipping Berhasil Dihapus!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Klipping Tidak Jadi Dihapus!");
                            }
                        });
                });
            </script>
        @endpush
        @include('sweetalert::alert')
    </section>
@endsection
