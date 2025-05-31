@extends('user-layout.master')
@section('title', 'Bahan Ajar Edit')
@section('css')
    <!-- flatpickr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datepikar/flatpickr.min.css') }}">
@endsection
@section('main-content')
    <div class="container-fluid">

        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12 ">
                <h4 class="main-title">Edit</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a class="f-s-14 f-w-500" href="#">
                            <span>
                                <i class="ph-duotone  ph-cardholder f-s-16"></i> Module
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500"
                            href="{{ route('staffdosen.ListPublikasi.edit', $data['list_publikasi']->id) }}">List
                            Publikasi</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb end -->

        <!-- Form Validation start -->
        <div class="row ">
            <!-- Tooltips start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column gap-2">
                    </div>
                    <div class="card-body">
                        <form id="editListPublikasi" class="row g-3 app-form rounded-control"
                            action="{{ route('staffdosen.ListPublikasi.update', $data['list_publikasi']->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="judul_publikasi">Judul
                                    Publikasi</label>
                                <input
                                    class="form-control @error('judul_publikasi')
                                    is-invalid
                                @enderror"
                                    type="text" name="judul_publikasi" placeholder="Masukan judul publikasi"
                                    value="{{ $data['list_publikasi']->judul_publikasi }}">
                                <div class="mt-1">
                                    @error('judul_publikasi')
                                        <span class="text-danger" id="judul_publikasi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="list_publikasi_jenis">Jenis
                                    Publikasi</label>
                                <select class="form-select @error('list_publikasi_jenis') is-invalid @enderror"
                                    aria-label="Select list_publikasi_jenis" name="list_publikasi_jenis" required>
                                    <option selected="">Pilih Jenis Publikasi</option>
                                    @foreach ($data['jenis_list_publikasi'] as $list_publikasi_jenis)
                                        <option value="{{ $list_publikasi_jenis->id }}"
                                            {{ $data['list_publikasi']->list_publikasi_jenis == $list_publikasi_jenis->id ? 'selected' : '' }}>
                                            {{ $list_publikasi_jenis->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('list_publikasi_jenis')
                                        <span class="text-danger" id="list_publikasi_jenis">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nama_jurnal">Nama
                                    Junral</label>
                                <input
                                    class="form-control @error('nama_jurnal')
                                    is-invalid
                                @enderror"
                                    type="text" name="nama_jurnal" placeholder="Masukan nama jurnal"
                                    value="{{ $data['list_publikasi']->nama_jurnal }}">
                                <div class="mt-1">
                                    @error('nama_jurnal')
                                        <span class="text-danger" id="nama_jurnal">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="volume">Volume</label>
                                <input
                                    class="form-control @error('volume')
                                    is-invalid
                                @enderror"
                                    type="text" name="volume" placeholder="Masukan volume"
                                    value="{{ $data['list_publikasi']->volume }}">
                                <div class="mt-1">
                                    @error('volume')
                                        <span class="text-danger" id="volume">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nomor">Nomor
                                    Junral</label>
                                <input
                                    class="form-control @error('nomor')
                                    is-invalid
                                @enderror"
                                    type="text" name="nomor" placeholder="Masukan nomor"
                                    value="{{ $data['list_publikasi']->nomor }}">
                                <div class="mt-1">
                                    @error('nomor')
                                        <span class="text-danger" id="nomor">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tahun_terbit">Tahun
                                    Terbit</label>
                                <select class="form-select @error('tahun_terbit') is-invalid @enderror"
                                    aria-label="Select tahun terbit" name="tahun_terbit" required>
                                    <option selected="">Pilih Tahun Terbit</option>
                                    @for ($i = 1990; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}"
                                            {{ $data['list_publikasi']->tahun_terbit == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="mt-1">
                                    @error('tahun_terbit')
                                        <span class="text-danger" id="tahun_terbit">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_terbit">Tanggal
                                    Terbit</label>
                                <input
                                    class="form-control @error('tanggal_terbit')
                                    is-invalid
                                @enderror basic-date"
                                    type="text" name="tanggal_terbit" placeholder="YYYY-MM-DD"
                                    value="{{ $data['list_publikasi']->tanggal_terbit }}">
                                <div class="mt-1">
                                    @error('tanggal_terbit')
                                        <span class="text-danger" id="tanggal_terbit">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="penulis_lain">Penulis Lain</label>
                                <textarea
                                    class="form-control @error('penulis_lain')
                                    is-invalid
                                @enderror"
                                    id="" cols="30" rows="10" name="penulis_lain">{{ $data['list_publikasi']->penulis_lain }}</textarea>
                                <div class="mt-1">
                                    @error('penulis_lain')
                                        <span class="text-danger" id="penulis_lain">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="link_publikasi">Link
                                    Publikasi</label>
                                <input
                                    class="form-control @error('link_publikasi')
                                    is-invalid
                                @enderror"
                                    type="text" name="link_publikasi" placeholder="Masukan link_publikasi"
                                    value="{{ $data['list_publikasi']->link_publikasi }}">
                                <div class="mt-1">
                                    @error('link_publikasi')
                                        <span class="text-danger" id="link_publikasi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="file_publikasi">File
                                    Publikasi</label>
                                <input type="file"
                                    class="form-control @error('file_publikasi')
                                    is-invalid
                                @enderror"
                                    name="file_publikasi">
                                @error('file_publikasi')
                                    <span class="text-danger" id="file_publikasi">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="doi">DOI (Digital Object
                                    Identifier) — jika jurnal bereputasi</label>
                                <input
                                    class="form-control @error('doi')
                                    is-invalid
                                @enderror"
                                    type="text" name="doi" placeholder="Masukan doi"
                                    value="{{ $data['list_publikasi']->doi }}">
                                <div class="mt-1">
                                    @error('doi')
                                        <span class="text-danger" id="doi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="list_publikasi_status">Status
                                    Publikasi</label>
                                <select class="form-select @error('list_publikasi_status') is-invalid @enderror"
                                    aria-label="Select list_publikasi_status" name="list_publikasi_status" required>
                                    <option selected="">Pilih Status Publikasi</option>
                                    @foreach ($data['status_list_publikasi'] as $list_publikasi_status)
                                        <option value="{{ $list_publikasi_status->id }}"
                                            {{ $data['list_publikasi']->list_publikasi_status == $list_publikasi_status->id ? 'selected' : '' }}>
                                            {{ $list_publikasi_status->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('list_publikasi_status')
                                        <span class="text-danger" id="list_publikasi_status">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <textarea
                                    class="form-control @error('keterangan')
                                    is-invalid
                                @enderror"
                                    id="" cols="30" rows="10" name="keterangan">{{ $data['list_publikasi']->keterangan }}</textarea>
                                <div class="mt-1">
                                    @error('keterangan')
                                        <span class="text-danger" id="keterangan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary b-r-22" type="submit" value="Submit">Submit
                                </button>
                                <button class="btn btn-warning b-r-22" value="clear"
                                    onclick="cleareditFormListPublikasi()">Clear
                                </button>
                                <a class="btn btn-danger b-r-22" href="{{ route('staffdosen.BahanAjar.index') }}">Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Validation end -->

    </div>
@endsection

@section('script')
    <!--customizer-->
    <div id="customizer"></div>

    <!--js-->
    <script src="{{ asset('assets/js/formvalidation.js') }}"></script>

    <!-- flatpickr js-->
    <script src="{{ asset('assets/vendor/datepikar/flatpickr.js') }}"></script>

    <!--datepicker-->
    <script src="{{ asset('assets/js/date_picker.js') }}"></script>

    <script type="text/javascript">
        function cleareditFormListPublikasi() {
            const form = document.getElementById('editListPublikasi');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
