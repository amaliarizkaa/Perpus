@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Katalog</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        {{-- Button Tambah Artikel --}}
        <div class="btn-tambah mx-4 flex text-center">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn-link py-2">
                Tambah
            </a>
        </div>
        {{-- Button Tambah Artikel End --}}

        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Callnum</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Tersedia</th>
                        {{-- <th>Jenis Koleksi</th> --}}
                        <th>Subjek Koleksi</th>
                        <th>Pengupload</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($buku as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->callnum }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->pengarang }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->jumlah ?? '0' }}</td>
                            {{-- <td>{{ $item->kategori_buku->nama_kategori }}</td> --}}
                            <td>{{ $item->subjek }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td><img src="{{ URL::asset('uploads/' . $item->gambar_buku) }}" width="100"></td>
                            <td>{{ date('d M Y', strtotime($item->updated_at)) }}</td>
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
        <div class="modal fade w-100" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Form Input Buku</h5>
                        <button type="button" class="btn-close" data-bs-target="#alertModal" data-bs-toggle="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/buku/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="callnum" class="form-label">Call Number</label>
                                <input type="text" name="callnum" id="callnum"
                                    class="form-control @error('callnum') is-invalid body @enderror"
                                    placeholder="Callnumber" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid body @enderror" placeholder="Judul"
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="pengarang" class="form-label">Pengarang</label>
                                <input type="text" name="pengarang" id="pengarang"
                                    class="form-control @error('pengarang') is-invalid body @enderror"
                                    placeholder="pengarang" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" id="judul"
                                    class="form-control @error('penerbit') is-invalid body @enderror" placeholder="Penerbit"
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun Terbit</label>
                                <input type="text" name="tahun" id="judul"
                                    class="form-control @error('tahun') is-invalid body @enderror" placeholder="Tahun"
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" name="jumlah" id="judul"
                                    class="form-control @error('jumlah') is-invalid body @enderror" placeholder="..."
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Sinopsis</label>
                                <textarea name="deskripsi" id="froala" class="form-control @error('deskripsi') is-invalid @enderror" autofocus
                                    required width="100"></textarea>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="kategori_id" class="form-label">Jenis Koleksi</label>
                                <select name="kategori_id"
                                    class="form-control @error('kategori_id') is-invalid @enderror">
                                    @foreach ($katbuk as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label for="subjek" class="form-label">Subjek Koleksi</label>
                                <input type="text" name="subjek" id="judul"
                                    class="form-control @error('subjek') is-invalid body @enderror" placeholder=""
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_buku" class="form-label">Gambar</label>
                                <input type="file" name="gambar_buku" id="gambar_buku"
                                    class="form-control @error('gambar_buku') is-invalid @enderror">
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
                        <button type="submit" class="btn-tambah mx-4 flex text-center">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        @foreach ($buku as $data)
            <div class="modal fade" id="editModal-{{ $data->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Buku {{ $data->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/buku/edit/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="callnum" class="form-label">Call Number</label>
                                    <input type="text" name="callnum" id="callnum"
                                        class="form-control @error('callnum') is-invalid body @enderror"
                                        value="{{ $data->callnum }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" name="judul" id="judul"
                                        class="form-control @error('judul') is-invalid body @enderror"
                                        value="{{ $data->judul }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <input type="text" name="pengarang" id="pengarang"
                                        class="form-control @error('pengarang') is-invalid body @enderror"
                                        value="{{ $data->pengarang }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <input type="text" name="penerbit" id="penerbit"
                                        class="form-control @error('penerbit') is-invalid body @enderror"
                                        value="{{ $data->penerbit }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun Terbit</label>
                                    <input type="text" name="tahun" id="tahun"
                                        class="form-control @error('tahun') is-invalid body @enderror"
                                        value="{{ $data->tahun }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah"
                                        class="form-control @error('jumlah') is-invalid body @enderror"
                                        value="{{ $data->jumlah }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea id="froala" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" autofocus>{{ $data->deskripsi }}</textarea>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="kategori" class="form-label">Jenis Koleksi</label>
                                    <select value="{{ $data->kategori }}" name="kategori_id"
                                        class="form-control @error('kategori_id') is-invalid @enderror">
                                        @foreach ($katbuk as $row)
                                            @if ($row->id == $data->kategori_id)
                                                <option value="{{ $row->id }}" selected='selected'>
                                                    {{ $row->nama_kategori }}</option>
                                            @else
                                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="subjek" class="form-label">Subjek Koleksi</label>
                                    <input type="text" name="subjek" id="subjek"
                                        class="form-control @error('subjek') is-invalid body @enderror"
                                        value="{{ $data->subjek }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_buku" class="form-label">Gambar Buku</label>
                                    <input type="file" name="gambar_buku" id="gambar_buku"
                                        class="form-control @error('gambar_buku') is-invalid @enderror mb-3" autofocus>
                                    <label for="gambar_buku" class="form-label">Gambar Buku Saat Ini</label>
                                    <br>
                                    <img src="{{ asset('uploads/' . $data->gambar_buku) }}" width="100">
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
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Form Input Buku</h1>
                    </div>
                    <div class="modal-body">
                        Yakin ingin membatalkan proses input form buku?
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
                    var buku_id = $(this).attr('data-id');
                    swal({
                            title: "Yakin?",
                            text: "Kamu akan menghapus data Buku!?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/buku/delete/" + buku_id + ""
                                swal("Data Buku Berhasil Dihapus!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Buku Tidak Jadi Dihapus!");
                            }
                        });
                });
            </script>
        @endpush
        @include('sweetalert::alert')
    @endsection
