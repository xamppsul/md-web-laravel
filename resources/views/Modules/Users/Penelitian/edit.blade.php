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
                            href="{{ route('staffdosen.Penelitian.edit', $data['penelitian']->id) }}">Penelitian</a>
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
                        <form id="editPenelitian" class="row g-3 app-form rounded-control"
                            action="{{ route('staffdosen.Penelitian.update', $data['penelitian']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label" for="judul">Judul Penelitian</label>
                                <input
                                    class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="judul" placeholder="Masukan judul penelitian"
                                    value="{{ $data['penelitian']->judul }}">
                                <div class="mt-1">
                                    @error('judul')
                                        <span class="text-danger" id="judul">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="bidang_ilmu">Bidang Ilmu</label>
                                <input
                                    class="form-control @error('bidang_ilmu')
                                                            is-invalid
                                                        @enderror"
                                    type="text" name="bidang_ilmu" placeholder="Masukan Bidang Ilmu Penelitian"
                                    value="{{ $data['penelitian']->bidang_ilmu }}">
                                <div class="mt-1">
                                    @error('bidang_ilmu')
                                        <span class="text-danger" id="bidang_ilmu">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="tahun">Tahun
                                    Penelitian</label>
                                <select class="form-select @error('tahun') is-invalid @enderror" aria-label="Select tahun"
                                    name="tahun" required>
                                    <option selected="">Pilih Tahun Penelitian</option>
                                    @for ($i = 1990; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}"
                                            {{ $data['penelitian']->tahun == $i ? 'selected' : '' }}>
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
                                    value="{{ $data['penelitian']->tgl_mulai }}">
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
                                    value="{{ $data['penelitian']->tgl_selesai }}">
                                <div class="mt-1">
                                    @error('tgl_selesai')
                                        <span class="text-danger" id="tgl_selesai">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="penelitian_sumber_dana">Sumber
                                    Dana Penelitian</label>
                                <select class="form-select @error('penelitian_sumber_dana') is-invalid @enderror"
                                    aria-label="Select penelitian_sumber_dana" name="penelitian_sumber_dana" required>
                                    <option selected="">Pilih Sumber Dana Penelitian
                                    </option>
                                    @foreach ($data['sumber_dana_penelitian'] as $penelitian_sumber_dana)
                                        <option value="{{ $penelitian_sumber_dana->id }}"
                                            {{ $data['penelitian']->penelitian_sumber_dana == $penelitian_sumber_dana->id ? 'selected' : '' }}>
                                            {{ $penelitian_sumber_dana->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('penelitian_sumber_dana')
                                        <span class="text-danger" id="penelitian_sumber_dana ">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="jumlah_dana">Jumlah Dana</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary-200 b-r-left" id="basic-addon1">Rp</span>
                                    <input type="number" name="jumlah_dana"
                                        class="form-control @error('jumlah_dana')
                                                                is-invalid
                                                            @enderror"
                                        placeholder="Masukan Harga Perolehan"
                                        value="{{ $data['penelitian']->jumlah_dana }}">
                                </div>
                                <div class="mt-1">
                                    @error('jumlah_dana')
                                        <span class="text-danger" id="tanggal_perolehan_aset">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="anggota_tim">Anggota Tim</label>
                                <textarea
                                    class="form-control @error('anggota_tim')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="anggota_tim">{{ $data['penelitian']->anggota_tim }}</textarea>
                                <div class="mt-1">
                                    @error('anggota_tim')
                                        <span class="text-danger" id="anggota_tim">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="laporan_akhir">File Laporan Akhir
                                    Penelitian</label>
                                <input type="file"
                                    class="form-control @error('laporan_akhir')
                                                            is-invalid
                                                        @enderror"
                                    name="laporan_akhir">
                                @error('laporan_akhir')
                                    <span class="text-danger" id="laporan_akhir">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="penelitian_status">Status
                                    Penelitian</label>
                                <select class="form-select @error('penelitian_status') is-invalid @enderror"
                                    aria-label="Select penelitian_status" name="penelitian_status" required>
                                    <option selected="">Pilih Sumber Dana Penelitian
                                    </option>
                                    @foreach ($data['status_penelitian'] as $penelitian_status)
                                        <option value="{{ $penelitian_status->id }}"
                                            {{ $data['penelitian']->penelitian_status == $penelitian_status->id ? 'selected' : '' }}>
                                            {{ $penelitian_status->name }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1">
                                    @error('penelitian_status')
                                        <span class="text-danger" id="penelitian_status ">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="catatan">Catatan</label>
                                <textarea
                                    class="form-control @error('catatan')
                                                            is-invalid
                                                        @enderror"
                                    id="" cols="30" rows="10" name="catatan">{{ $data['penelitian']->catatan }}</textarea>
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
                                    onclick="cleareditFormPenelitian()">Clear
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
        function cleareditFormPenelitian() {
            const form = document.getElementById('editPenelitian');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
