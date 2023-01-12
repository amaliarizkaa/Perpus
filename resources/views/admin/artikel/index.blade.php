@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Artikel</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif

        {{-- 
        Status Option
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="GET" class="form-inline form-row">
                                        <div class="col">
                                            <div class="input-group mx-1">
                                                <label class="font-weight-bold mr-2">Status</label>
                                                <select name="status" class="custom-select">
                                                    <option value="publish" selected>Publish</option>
                                                    <option value="draft">Draft</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}

        {{-- Button Tambah Artikel --}}
        <div class="container btn-container mt-3">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary">
                Tambah Artikel
            </a>
        </div>
        {{-- Button Tambah Artikel End --}}

        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Kategori</th>
                        <th>Author</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Views</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($artikel as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td><img src="{{ URL::asset('uploads/' . $item->gambar_artikel) }}" width="100"></td>
                            <td>{{ date('d M Y', strtotime($item->updated_at)) }}</td>
                            <td>{{ $item->views }}</td>
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
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Artikel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/artikel/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Artikel</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid body @enderror"
                                    placeholder="Judul Artikel" autofocus required>
                            </div>
                            <div class="mb-3">

                                <label for="body" class="form-label">Isi Artikel</label>
                                <textarea name="body" id="froala" class="form-control @error('body') is-invalid @enderror" autofocus required
                                    width="100"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror"
                                    required>
                                    @foreach ($kategori as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_artikel" class="form-label">Gambar Artikel</label>
                                <input type="file" name="gambar_artikel" id="gambar_artikel"
                                    class="form-control @error('gambar_artikel') is-invalid @enderror">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
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
        @foreach ($artikel as $data)
            <div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Artikel {{ $data->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/artikel/edit/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Artikel</label>
                                    <input type="text" name="judul" id="judul"
                                        class="form-control @error('judul') is-invalid body @enderror"
                                        value="{{ $data->judul }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <textarea id="froala" name="body" class="form-control @error('body') is-invalid @enderror" autofocus>{{ $data->body }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select value="{{ $data->kategori }}" name="kategori_id"
                                        class="form-control @error('kategori_id') is-invalid @enderror">
                                        @foreach ($kategori as $row)
                                            @if ($row->id == $data->kategori_id)
                                                <option value="{{ $row->id }}" selected='selected'>
                                                    {{ $row->nama_kategori }}</option>
                                            @else
                                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_artikel" class="form-label">Gambar Artikel</label>
                                    <input type="file" name="gambar_artikel" id="gambar_artikel"
                                        class="form-control @error('gambar_artikel') is-invalid @enderror mb-3" autofocus>
                                    <label for="gambar_artikel" class="form-label">Gambar Artikel Saat Ini</label>
                                    <br>
                                    <img src="{{ asset('uploads/' . $data->gambar_artikel) }}" width="100">
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
                    var artikel_id = $(this).attr('data-id');
                    swal({
                            title: "Yakin?",
                            text: "Kamu akan menghapus data artikel ini!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/artikel/delete/" + artikel_id + ""
                                swal("Data Artikel Berhasil Dihapus!", {
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
