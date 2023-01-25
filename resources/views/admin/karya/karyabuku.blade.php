@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Karya Buku</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        {{-- Button Tambah Artikel --}}
        <div class="container btn-container mt-3">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary">
                Tambah Karya Buku
            </a>
        </div>
        {{-- Button Tambah Artikel End --}}
        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Call Number</th>
                        <th>Judul Karya</th>
                        <th>Slug</th>
                        <th>Penulis</th>
                        <th>Halaman</th>
                        <th>Penerbit</th>
                        <th>Subjek Koleksi</th>
                        <th>Tahun Terbit</th>
                        <th>Kategori Penulis</th>
                        <th>Pengupload</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($karyabuku as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->callnum }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->halaman }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->subjek }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>{{ $item->kategori_penulis->nama_kategori }}</td>
                            <td>{{ $item->users->name }}</td>
                            <td><img src="{{ asset('uploads/' . $item->gambar_karya) }}" width="100"></td>
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
        <div class="modal fade w-100" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Karya Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/karya-buku/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="callnum" class="form-label">Call Number</label>
                                <input type="text" name="callnum" id="callnum"
                                    class="form-control @error('callnum') is-invalid body @enderror"
                                    placeholder="Call number" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Karya</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid body @enderror" placeholder="Judul Karya"
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" name="penulis" id="penulis"
                                    class="form-control @error('penulis') is-invalid body @enderror" placeholder="Penulis"
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" name="penerbit" id="judul"
                                    class="form-control @error('penerbit') is-invalid body @enderror" placeholder="Penerbit"
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="subjek" class="form-label">Subjek Koleksi</label>
                                <input type="text" name="subjek" id="judul"
                                    class="form-control @error('subjek') is-invalid body @enderror" placeholder="Subjek"
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun Terbit</label>
                                <input type="number" name="tahun" id="tahun"
                                    class="form-control @error('tahun') is-invalid body @enderror" placeholder="..."
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="halaman" class="form-label">Halaman</label>
                                <input type="text" name="halaman" id="halaman"
                                    class="form-control @error('halaman') is-invalid body @enderror" placeholder="..."
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="froala" class="form-control @error('deskripsi') is-invalid @enderror" autofocus
                                    required width="100"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori Penulis</label>
                                <select name="kategori_id"
                                    class="form-control @error('kategori_id') is-invalid @enderror">
                                    @foreach ($katbuk as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_karya" class="form-label">Gambar</label>
                                <input type="file" name="gambar_karya" id="gambar_karya"
                                    class="form-control @error('gambar_karya') is-invalid @enderror">
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
        @foreach ($karyabuku as $data)
            <div class="modal fade" id="editModal-{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Karya {{ $data->judul }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('/admin/karya-buku/edit/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="callnum" class="form-label">Call Number</label>
                                    <input type="text" name="callnum" id="callnum"
                                        class="form-control @error('callnum') is-invalid body @enderror"
                                        value="{{ $data->callnum }}" autofocus required>
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Karya</label>
                                        <input type="text" name="judul" id="judul"
                                            class="form-control @error('judul') is-invalid body @enderror"
                                            value="{{ $data->judul }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penulis" class="form-label">Penulis</label>
                                        <input type="text" name="penulis" id="penulis"
                                            class="form-control @error('penulis') is-invalid body @enderror"
                                            value="{{ $data->penulis }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="penerbit" class="form-label">Penerbit</label>
                                        <input type="text" name="penerbit" id="penerbit"
                                            class="form-control @error('penerbit') is-invalid body @enderror"
                                            value="{{ $data->penerbit }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subjek" class="form-label">Subjek Koleksi</label>
                                        <input type="text" name="subjek" id="subjek"
                                            class="form-control @error('subjek') is-invalid body @enderror"
                                            value="{{ $data->subjek }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tahun" class="form-label">Tahun Terbit</label>
                                        <input type="number" name="tahun" id="tahun"
                                            class="form-control @error('tahun') is-invalid body @enderror"
                                            value="{{ $data->tahun }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="halaman" class="form-label">Halaman</label>
                                        <input type="text" name="halaman" id="halaman"
                                            class="form-control @error('halaman') is-invalid body @enderror"
                                            value="{{ $data->halaman }}" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea id="froala" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" autofocus>{{ $data->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori Penulis</label>
                                        <select value="{{ $data->kategori }}" name="kategori_id"
                                            class="form-control @error('kategori_id') is-invalid @enderror">
                                            @foreach ($katbuk as $row)
                                                @if ($row->id == $data->kategori_id)
                                                    <option value="{{ $row->id }}" selected='selected'>
                                                        {{ $row->nama_kategori }}</option>
                                                @else
                                                    <option value="{{ $row->id }}">{{ $row->nama_kategori }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambar_karya" class="form-label">Gambar</label>
                                        <input type="file" name="gambar_karya" id="gambar_karya"
                                            class="form-control @error('gambar_karya') is-invalid @enderror mb-3"
                                            autofocus>
                                        <label for="gambar_karya" class="form-label">Gambar Karya Saat Ini</label>
                                        <br>
                                        <img src="{{ asset('uploads/' . $data->gambar_karya) }}" width="100">
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
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
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
                            text: "Kamu akan menghapus data Karya!?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/karya-buku/delete/" + buku_id + ""
                                swal("Data Karya Berhasil Dihapus!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Data Karya Tidak Jadi Dihapus!");
                            }
                        });
                });
            </script>
        @endpush
        @include('sweetalert::alert')
    </section>
@endsection
