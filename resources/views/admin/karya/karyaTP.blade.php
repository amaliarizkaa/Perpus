@extends('layouts.main-admin')
@section('main-sec')
    <section class="home-section">
        <div class="home-content">

            <span class="text">Kelola Karya Ilmiah Terpublikasi</span>
        </div>
        @if (session('flash_message_success'))
            <div class="alert alert-success">
                {{ session('flash_message_success') }}
            </div>
        @endif
        {{-- Button Tambah Artikel --}}
        <div class="container btn-container mt-3">
            <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary">
                Tambah Karya Ilmiah
            </a>
        </div>
        {{-- Button Tambah Artikel End --}}
        {{-- Table Start --}}
        <div class="container table-container mt-3">
            <table class="table table-bordered table-hover" id="table_id">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Terbitan Berkala</th>
                        <th>Judul Artikel</th>
                        <th>Edisi</th>
                        <th>Slug</th>
                        <th>Penulis</th>
                        <th>Halaman</th>
                        <th>Penerbit</th>
                        <th>Kategori Penulis</th>
                        <th>Pengupload</th>
                        <th>Gambar</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($karyailmiah as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->judul_terbit }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->edisi }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->halaman }}</td>
                            <td>{{ $item->penerbit }}</td>
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
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Karya Ilmiah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/karya-publikasi/store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="judul_terbit" class="form-label">Judul Terbitan Berkala</label>
                                <input type="text" name="judul_terbit" id="judul_terbit"
                                    class="form-control @error('judul_terbit') is-invalid body @enderror"
                                    placeholder="Judul terbitan berkala" autofocus required>
                            </div>

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Artikel</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid body @enderror"
                                    placeholder="Judul Artikel" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="edisi" class="form-label">Edisi</label>
                                <input type="text" name="edisi" id="edisi"
                                    class="form-control @error('edisi') is-invalid body @enderror" placeholder="Edisi"
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
                                <label for="halaman" class="form-label">Halaman</label>
                                <input type="text" name="halaman" id="halaman"
                                    class="form-control @error('halaman') is-invalid body @enderror" placeholder="..."
                                    autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori Penulis</label>
                                <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
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
        @foreach ($karyailmiah as $data)
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
                            <form action="{{ url('/admin/karya-publikasi/edit/' . $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="judul_terbit" class="form-label">Judul Terbitan Berkala</label>
                                    <input type="text" name="judul_terbit" id="judul_terbit"
                                        class="form-control @error('judul_terbit') is-invalid body @enderror"
                                        value="{{ $data->judul_terbit }}" autofocus>
                                </div>

                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Artikel</label>
                                    <input type="text" name="judul" id="judul"
                                        class="form-control @error('judul') is-invalid body @enderror"
                                        value="{{ $data->judul }}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="edisi" class="form-label">Edisi</label>
                                    <input type="text" name="edisi" id="edisi"
                                        class="form-control @error('edisi') is-invalid body @enderror"
                                        value="{{ $data->edisi }}" autofocus>
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
                                    <label for="halaman" class="form-label">Halaman</label>
                                    <input type="text" name="halaman" id="halaman"
                                        class="form-control @error('halaman') is-invalid body @enderror"
                                        value="{{ $data->halaman }}" autofocus>
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
                                                <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_karya" class="form-label">Gambar</label>
                                    <input type="file" name="gambar_karya" id="gambar_karya"
                                        class="form-control @error('gambar_karya') is-invalid @enderror mb-3" autofocus>
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
                            text: "Kamu akan menghapus data Karya!?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/karya-publikasi/delete/" + buku_id + ""
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
