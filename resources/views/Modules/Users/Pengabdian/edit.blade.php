@extends('layout.master')
@section('title', 'Pengabdian Edit')
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
                            href="{{ route('staffdosen.Pengabdian.edit', $data['pengabdian']->id) }}">Pengabdian</a>
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
                        <form id="editPengabdian" class="row g-3 app-form rounded-control"
                            action="{{ route('staffdosen.Pengabdian.update', $data['pengabdian']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="judul">Judul Pengabdian</label>
                                <input
                                    class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="judul" placeholder="Masukan judul pengabdian"
                                    value="{{ $data['pengabdian']->judul }}">
                                <div class="mt-1">
                                    @error('judul')
                                        <span class="text-danger" id="judul">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pengabdian_bidang">Bidang
                                    Pengabdian</label>
                                <select class="form-select @error('pengabdian_bidang') is-invalid @enderror"
                                    aria-label="Select bidang pengabdian" name="pengabdian_bidang" required>
                                    <option selected="">Pilih Bidang Pengabdian</option>
                                    @foreach ($data['bidang_pengabdian'] as $pengabdian_bidang)
                                        <option value="{{ $pengabdian_bidang->id }}"
                                            {{ $data['pengabdian']->pengabdian_bidang == $pengabdian_bidang->id ? 'selected' : '' }}>
                                            {{ $pengabdian_bidang->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('pengabdian_bidang')
                                        <span class="text-danger" id="pengabdian_bidang">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pengabdian_sumber_dana">Sumber Dana
                                    Pengabdian</label>
                                <select class="form-select @error('pengabdian_sumber_dana') is-invalid @enderror"
                                    aria-label="Select sumber dana pengabdian" name="pengabdian_sumber_dana" required>
                                    <option selected="">Pilih Sumber Dana Pengabdian</option>
                                    @foreach ($data['sumber_dana_pengabdian'] as $pengabdian_sumber_dana)
                                        <option value="{{ $pengabdian_sumber_dana->id }}"
                                            {{ $data['pengabdian']->pengabdian_sumber_dana == $pengabdian_sumber_dana->id ? 'selected' : '' }}>
                                            {{ $pengabdian_sumber_dana->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('pengabdian_sumber_dana')
                                        <span class="text-danger" id="pengabdian_sumber_dana ">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tahun">Tahun
                                    Pengabdian</label>
                                <select class="form-select @error('tahun') is-invalid @enderror" aria-label="Select tahun"
                                    name="tahun" required>
                                    <option selected="">Pilih Tahun Pengabdian</option>
                                    @for ($i = 1990; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}"
                                            {{ $data['pengabdian']->tahun == $i ? 'selected' : '' }}>
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                                <div class="mt-1">
                                    @error('tahun')
                                        <span class="text-danger" id="tahun">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tgl_mulai">Tanggal
                                    Mulai</label>
                                <input
                                    class="form-control @error('tgl_mulai')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tgl_mulai" placeholder="YYYY-MM-DD"
                                    value="{{ $data['pengabdian']->tgl_mulai }}">
                                <div class="mt-1">
                                    @error('tgl_mulai')
                                        <span class="text-danger" id="tgl_mulai">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tgl_selesai">Tanggal
                                    Selesai</label>
                                <input
                                    class="form-control @error('tgl_selesai')
                                                            is-invalid
                                                        @enderror basic-date"
                                    type="text" name="tgl_selesai" placeholder="YYYY-MM-DD"
                                    value="{{ $data['pengabdian']->tgl_selesai }}">
                                <div class="mt-1">
                                    @error('tgl_selesai')
                                        <span class="text-danger" id="tgl_selesai">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="lokasi">Lokasi Pengabdian</label>
                                <input
                                    class="form-control @error('lokasi')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="lokasi" placeholder="Masukan lokasi pengabdian"
                                    value="{{ $data['pengabdian']->lokasi }}">
                                <div class="mt-1">
                                    @error('lokasi')
                                        <span class="text-danger" id="lokasi">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="jumlah_peserta">Jumlah
                                    Peserta</label>
                                <input
                                    class="form-control @error('jumlah_peserta')
                                                            is-invalid
                                                        @enderror"
                                    type="number" name="jumlah_peserta" placeholder="Masukan jumlah peserta pengabdian"
                                    value="{{ $data['pengabdian']->jumlah_peserta }}">
                                <div class="mt-1">
                                    @error('jumlah_peserta')
                                        <span class="text-danger" id="jumlah_peserta">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="laporan_pengabdian">Laporan
                                    Pengabdian</label>
                                <input type="file"
                                    class="form-control @error('laporan_pengabdian')
                                                            is-invalid
                                                        @enderror"
                                    name="laporan_pengabdian">
                                @error('laporan_pengabdian')
                                    <span class="text-danger" id="laporan_pengabdian">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="dokumentasi">Dokumentasi
                                    Pengabdian</label>
                                <input type="file"
                                    class="form-control @error('dokumentasi')
                                                            is-invalid
                                                        @enderror"
                                    name="dokumentasi">
                                @error('dokumentasi')
                                    <span class="text-danger" id="dokumentasi">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pengabdian_status">Status
                                    Pengabdian</label>
                                <select class="form-select @error('pengabdian_status') is-invalid @enderror"
                                    aria-label="Select sumber dana pengabdian" name="pengabdian_status" required>
                                    <option selected="">Pilih Sumber Dana Pengabdian</option>
                                    @foreach ($data['status_pengabdian'] as $pengabdian_status)
                                        <option value="{{ $pengabdian_status->id }}"
                                            {{ $data['pengabdian']->pengabdian_status == $pengabdian_status->id ? 'selected' : '' }}>
                                            {{ $pengabdian_status->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('pengabdian_status')
                                        <span class="text-danger" id="pengabdian_status ">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="catatan">Catatan</label>
                                <textarea
                                    class="form-control @error('catatan')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="catatan">{{ $data['pengabdian']->catatan }}</textarea>
                                <div class="mt-1">
                                    @error('catatan')
                                        <span class="text-danger" id="catatan">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary b-r-22" type="submit" value="Submit">Submit
                                </button>
                                <button class="btn btn-warning b-r-22" value="clear"
                                    onclick="cleareditFormPengabdian()">Clear
                                </button>
                                <a class="btn btn-danger b-r-22" href="{{ route('staffdosen.Pengabdian.index') }}">Cancel
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
        function cleareditFormPengabdian() {
            const form = document.getElementById('editPengabdian');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
