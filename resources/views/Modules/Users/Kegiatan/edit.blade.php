@extends('layout.master')
@section('title', 'Kegiatan Edit')
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
                        <a class="f-s-14 f-w-500" href="{{ route('uppsfaculty.Kegiatan.index') }}">Kegiatan</a>
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
                        <form id="editFormKegiatan" class="row g-3 app-form rounded-control"
                            action="{{ route('uppsfaculty.Kegiatan.update', $data['kegiatan']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="nama_kegiatan">Nama
                                    Kegiatan</label>
                                <input
                                    class="form-control @error('nama_kegiatan')
                                                            is-invalid
                                                        @enderror"
                                    id="nama_kegiatan" placeholder="Masukan Nama Kegiatan" type="text"
                                    value="{{ $data['kegiatan']->nama_kegiatan }}" name="nama_kegiatan">
                                <div class="mt-1">
                                    @error('nama_kegiatan')
                                        <span class="text-danger" id="nama_kegiatan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kegiatan_jenis">Jenis
                                    Kegiatan</label>
                                <select
                                    class="form-select @error('kegiatan_jenis')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select jenis kegiatan" name="kegiatan_jenis">
                                    <option selected="">Pilih Jenis Kegiatan</option>
                                    @foreach ($data['jenis'] as $jenisKegiatan)
                                        <option value="{{ $jenisKegiatan->id }}"
                                            {{ $data['kegiatan']->kegiatan_jenis == $jenisKegiatan->id ? 'selected' : '' }}>
                                            {{ $jenisKegiatan->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('kegiatan_jenis')
                                        <span class="text-danger" id="kegiatan_jenis">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_kegiatan">Tanggal
                                    Kegiatan</label>
                                <input
                                    class="form-control @error('tanggal_kegiatan')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_kegiatan" placeholder="YYYY-MM-DD"
                                    value="{{ $data['kegiatan']->tanggal_kegiatan }}">
                                <div class="mt-1">
                                    @error('tanggal_kegiatan')
                                        <span class="text-danger" id="tanggal_kegiatan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tempat_lokasi">Tempat
                                    kegiatan</label>
                                <input class="form-control @error('tempat_lokasi') is-invalid @enderror" id="tempat_lokasi"
                                    name="tempat_lokasi" placeholder="Masukan Nomor Dokumen" type="text"
                                    value="{{ $data['kegiatan']->tempat_lokasi }}">
                                <div class="mt-1">
                                    @error('tempat_lokasi')
                                        <span class="text-danger" id="tempat_lokasi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="penyelenggara">Penyelenggara</label>
                                <input class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara"
                                    name="penyelenggara" placeholder="Masukan Nomor Dokumen" type="text"
                                    value="{{ $data['kegiatan']->penyelenggara }}">
                                <div class="mt-1">
                                    @error('penyelenggara')
                                        <span class="text-danger" id="penyelenggara">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="jumlah_peserta">Jumlah
                                    Peserta</label>
                                <input class="form-control @error('jumlah_peserta') is-invalid @enderror"
                                    id="jumlah_peserta" name="jumlah_peserta" placeholder="Masukan Nomor Dokumen"
                                    type="number" value="{{ $data['kegiatan']->jumlah_peserta }}">
                                <div class="mt-1">
                                    @error('jumlah_peserta')
                                        <span class="text-danger" id="jumlah_peserta">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="file_daftar_hadir">Daftar
                                    Hadir</label>
                                <input type="file"
                                    class="form-control @error('file_daftar_hadir')
                                                            is-invalid
                                                        @enderror"
                                    name="file_daftar_hadir">
                                @error('file_daftar_hadir')
                                    <span class="text-danger" id="file_daftar_hadir">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="file_kegiatan">Dokumentasi
                                    kegiatan</label>
                                <input type="file"
                                    class="form-control @error('file_kegiatan')
                                                            is-invalid
                                                        @enderror"
                                    name="file_kegiatan">
                                @error('file_kegiatan')
                                    <span class="text-danger" id="file_kegiatan">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="kegiatan_status">Jenis
                                    Kegiatan</label>
                                <select
                                    class="form-select @error('kegiatan_status')
                                                            is-invalid
                                                        @enderror"
                                    aria-label="Select status kegiatan" name="kegiatan_status">
                                    <option selected="">Pilih Status Kegiatan</option>
                                    @foreach ($data['status'] as $statusKegiatan)
                                        <option value="{{ $statusKegiatan->id }}"
                                            {{ $data['kegiatan']->kegiatan_status == $statusKegiatan->id ? 'selected' : '' }}>
                                            {{ $statusKegiatan->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('kegiatan_status')
                                        <span class="text-danger" id="kegiatan_status">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <textarea
                                    class="form-control @error('keterangan')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="keterangan">{{ $data['kegiatan']->keterangan }}</textarea>
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
                                    onclick="cleareditFormKegiatan()">Clear
                                </button>
                                <a class="btn btn-danger b-r-22" href="{{ route('uppsfaculty.Kegiatan.index') }}">Cancel
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
        function cleareditFormKegiatan() {
            const form = document.getElementById('editFormKegiatan');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
