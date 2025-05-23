@extends('layout.master')
@section('title', 'Riwayat Jabatan Edit')
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
                            href="{{ route('staffdosen.RiwayatJabatan.edit', $data['riwayatJabatan']->id) }}">Riwayat
                            Jabatan</a>
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
                        <form id="editFormRiwayatJabatan" class="row g-3 app-form rounded-control"
                            action="{{ route('staffdosen.RiwayatJabatan.update', $data['riwayatJabatan']->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="nama_jabatan">Nama Jabatan</label>
                                <input
                                    class="form-control @error('nama_jabatan')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="nama_jabatan" placeholder="Masukan nama jabatan"
                                    value="{{ $data['riwayatJabatan']->nama_jabatan }}">
                                <div class="mt-1">
                                    @error('nama_jabatan')
                                        <span class="text-danger" id="nama_jabatan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="riwayat_jabatan_jenis">Jenis
                                    Riwayat
                                    Jabatan</label>
                                <select class="form-select @error('riwayat_jabatan_jenis') is-invalid @enderror"
                                    aria-label="select_riwayat_jabatan_jenis" name="riwayat_jabatan_jenis" required>
                                    <option selected="">Pilih Jenis Riwayat Jabatan</option>
                                    @foreach ($data['riwayat_jabatan_jenis'] as $riwayat_jabatan_jenis)
                                        <option value="{{ $riwayat_jabatan_jenis->id }}"
                                            {{ $data['riwayatJabatan']->riwayat_jabatan_jenis == $riwayat_jabatan_jenis->id ? 'selected' : '' }}>
                                            {{ $riwayat_jabatan_jenis->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('riwayat_jabatan_jenis')
                                        <span class="text-danger" id="riwayat_jabatan_jenis">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="unit_kerja">Unit Kerja</label>
                                <input
                                    class="form-control @error('unit_kerja')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="unit_kerja" placeholder="Masukan unit kerja"
                                    value="{{ $data['riwayatJabatan']->unit_kerja }}">
                                <div class="mt-1">
                                    @error('unit_kerja')
                                        <span class="text-danger" id="unit_kerja">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="no_sk_jabatan">No Sk
                                    Jabatan</label>
                                <input
                                    class="form-control @error('no_sk_jabatan')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="no_sk_jabatan" placeholder="Masukan No Sk Jabatan"
                                    value="{{ $data['riwayatJabatan']->no_sk_jabatan }}">
                                <div class="mt-1">
                                    @error('no_sk_jabatan')
                                        <span class="text-danger" id="no_sk_jabatan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_sk">Tanggal
                                    Terbit Sk</label>
                                <input
                                    class="form-control @error('tanggal_sk')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_sk" placeholder="YYYY-MM-DD"
                                    value="{{ $data['riwayatJabatan']->tanggal_sk }}">
                                <div class="mt-1">
                                    @error('tanggal_sk')
                                        <span class="text-danger" id="tanggal_sk">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_mulai">Tanggal
                                    Mulai Menjabat</label>
                                <input
                                    class="form-control @error('tanggal_mulai')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_mulai" placeholder="YYYY-MM-DD"
                                    value="{{ $data['riwayatJabatan']->tanggal_mulai }}">
                                <div class="mt-1">
                                    @error('tanggal_mulai')
                                        <span class="text-danger" id="tanggal_mulai">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tanggal_selesai">Tanggal
                                    Selesai Menjabat</label>
                                <input
                                    class="form-control @error('tanggal_selesai')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tanggal_selesai" placeholder="YYYY-MM-DD"
                                    value="{{ $data['riwayatJabatan']->tanggal_selesai }}">
                                <div class="mt-1">
                                    @error('tanggal_selesai')
                                        <span class="text-danger" id="tanggal_selesai">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="dokumen_sk">File Dokumen SK
                                    Jabatan</label>
                                <input type="file"
                                    class="form-control @error('dokumen_sk')
                                                            is-invalid
                                                        @enderror"
                                    name="dokumen_sk">
                                @error('dokumen_sk')
                                    <span class="text-danger" id="dokumen_sk">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="riwayat_jabatan_status">Status
                                    Riwayat Jabatan</label>
                                <select class="form-select @error('riwayat_jabatan_status') is-invalid @enderror"
                                    aria-label="select_riwayat_jabatan_status" name="riwayat_jabatan_status" required>
                                    <option selected="">Pilih Jenis Riwayat Jabatan</option>
                                    @foreach ($data['riwayat_jabatan_status'] as $riwayat_jabatan_status)
                                        <option value="{{ $riwayat_jabatan_status->id }}"
                                            {{ $data['riwayatJabatan']->riwayat_jabatan_status == $riwayat_jabatan_status->id ? 'selected' : '' }}>
                                            {{ $riwayat_jabatan_status->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('riwayat_jabatan_status')
                                        <span class="text-danger" id="riwayat_jabatan_status">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="keterangan">Keterangan</label>
                                <textarea
                                    class="form-control @error('keterangan')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="keterangan">{{ $data['riwayatJabatan']->keterangan }}</textarea>
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
                                    onclick="cleareditFormRiwayatJabatan()">Clear
                                </button>
                                <a class="btn btn-danger b-r-22"
                                    href="{{ route('staffdosen.RiwayatJabatan.index') }}">Cancel
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
        function cleareditFormRiwayatJabatan() {
            const form = document.getElementById('editFormRiwayatJabatan');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
