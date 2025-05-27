@extends('layout.master')
@section('title', 'Pengabdian')
@section('css')
    <!--font-awesome-css-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.css') }}">
    <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select/select2.min.css') }}">
    <!-- Data Table css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datatable/jquery.dataTables.min.css') }}">
    <!-- flatpickr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datepikar/flatpickr.min.css') }}">
@endsection
@section('main-content')
    <div class="container-fluid">
        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12 ">
                <h4 class="main-title">Module</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a href="#" class="f-s-14 f-w-500">
                            <span>
                                <i class="ph-duotone  ph-table f-s-16"></i> Pengabdian
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('staffdosen.Pengabdian.index') }}" class="f-s-14 f-w-500">Data</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Breadcrumb end -->

        @session('success')
            <div class="flash-data-success" data-flashdata-success="{{ $value }}"></div>
        @endsession
        @session('error')
            <div class="flash-data-error" data-flashdata-error="{{ $value }}"></div>
        @endsession
        <!-- Data Table start -->
        <div class="row">
            <!-- Default Datatable start -->
            <div class="col-12">
                <div class="card">
                    <div class="d-flex justify-content-between code-header card-header">
                        {{-- <h5>Horizontal </h5> --}}
                    </div>

                    <div class="card-body">
                        <p>
                            <button aria-controls="collapseFilter" aria-expanded="false"
                                class="btn btn-light-primary b-r-22" data-bs-target="#collapseFilter"
                                data-bs-toggle="collapse" type="button"> <i class="ti ti-filter"></i>
                                Filter</button>
                            <button type="button" class="btn btn-primary b-r-22" aria-controls="collapseTambahPengabdian"
                                aria-expanded="false" data-bs-target="#collapseTambahPengabdian" data-bs-toggle="collapse"
                                type="button"> <i class="ti ti-text-plus"></i>
                                Tambah Pengabdian</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('staffdosen.Pengabdian.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormMouMoa">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="pengabdian_bidang">Jenis Bidang
                                                            Pengabdian</label>
                                                        <select class="form-select"
                                                            aria-label="Select Jenis Bidang Pengabdian"
                                                            name="pengabdian_bidang" required>
                                                            <option selected="">Pilih Jenis Bidang Pengabdian</option>
                                                            @foreach ($data['bidang_pengabdian'] as $pengabdian_bidang)
                                                                <option value="{{ $pengabdian_bidang->id }}"
                                                                    {{ request('pengabdian_bidang') == $pengabdian_bidang->id ? 'selected' : '' }}>
                                                                    {{ $pengabdian_bidang->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="pengabdian_sumber_dana">Sumber Dana
                                                            Pengabdian</label>
                                                        <select class="form-select"
                                                            aria-label="Select Sumber Dana Pengabdian"
                                                            name="pengabdian_sumber_dana" required>
                                                            <option selected="">Pilih Sumber Dana Pengabdian</option>
                                                            @foreach ($data['sumber_dana_pengabdian'] as $pengabdian_sumber_dana)
                                                                <option value="{{ $pengabdian_sumber_dana->id }}"
                                                                    {{ request('pengabdian_sumber_dana') == $pengabdian_sumber_dana->id ? 'selected' : '' }}>
                                                                    {{ $pengabdian_sumber_dana->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="pengabdian_status">Status
                                                            Pengabdian</label>
                                                        <select class="form-select" aria-label="Select Status Pengabdian"
                                                            name="pengabdian_status" required>
                                                            <option selected="">Pilih Status Pengabdian</option>
                                                            @foreach ($data['status_pengabdian'] as $pengabdian_status)
                                                                <option value="{{ $pengabdian_status->id }}"
                                                                    {{ request('pengabdian_status') == $pengabdian_status->id ? 'selected' : '' }}>
                                                                    {{ $pengabdian_status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22"
                                                            onclick="clearfilterFormPengabdian()" value="Clear">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- collapse tambah mou moa -->
                            <div class="collapse collapse-horizontal" id="collapseTambahPengabdian">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('staffdosen.Pengabdian.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="judul">Judul Pengabdian</label>
                                                        <input
                                                            class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="judul"
                                                            placeholder="Masukan judul pengabdian"
                                                            value="{{ old('judul') }}">
                                                        <div class="mt-1">
                                                            @error('judul')
                                                                <span class="text-danger"
                                                                    id="judul">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="pengabdian_bidang">Bidang
                                                            Pengabdian</label>
                                                        <select
                                                            class="form-select @error('pengabdian_bidang') is-invalid @enderror"
                                                            aria-label="Select bidang pengabdian" name="pengabdian_bidang"
                                                            required>
                                                            <option selected="">Pilih Bidang Pengabdian</option>
                                                            @foreach ($data['bidang_pengabdian'] as $pengabdian_bidang)
                                                                <option value="{{ $pengabdian_bidang->id }}"
                                                                    {{ old('pengabdian_bidang') == $pengabdian_bidang->id ? 'selected' : '' }}>
                                                                    {{ $pengabdian_bidang->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('pengabdian_bidang')
                                                                <span class="text-danger"
                                                                    id="pengabdian_bidang">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="pengabdian_sumber_dana">Sumber Dana
                                                            Pengabdian</label>
                                                        <select
                                                            class="form-select @error('pengabdian_sumber_dana') is-invalid @enderror"
                                                            aria-label="Select sumber dana pengabdian"
                                                            name="pengabdian_sumber_dana" required>
                                                            <option selected="">Pilih Sumber Dana Pengabdian</option>
                                                            @foreach ($data['sumber_dana_pengabdian'] as $pengabdian_sumber_dana)
                                                                <option value="{{ $pengabdian_sumber_dana->id }}"
                                                                    {{ old('pengabdian_sumber_dana') == $pengabdian_sumber_dana->id ? 'selected' : '' }}>
                                                                    {{ $pengabdian_sumber_dana->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('pengabdian_sumber_dana')
                                                                <span class="text-danger"
                                                                    id="pengabdian_sumber_dana ">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tahun">Tahun
                                                            Pengabdian</label>
                                                        <select class="form-select @error('tahun') is-invalid @enderror"
                                                            aria-label="Select tahun" name="tahun" required>
                                                            <option selected="">Pilih Tahun Pengabdian</option>
                                                            @for ($i = 1990; $i <= date('Y'); $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ old('tahun') == $i ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('tahun')
                                                                <span class="text-danger"
                                                                    id="tahun">{{ $message }}</span>
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
                                                            value="{{ old('tgl_mulai') }}">
                                                        <div class="mt-1">
                                                            @error('tgl_mulai')
                                                                <span class="text-danger"
                                                                    id="tgl_mulai">{{ $message }}</span>
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
                                                            value="{{ old('tgl_selesai') }}">
                                                        <div class="mt-1">
                                                            @error('tgl_selesai')
                                                                <span class="text-danger"
                                                                    id="tgl_selesai">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="lokasi">Lokasi Pengabdian</label>
                                                        <input
                                                            class="form-control @error('lokasi')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="lokasi"
                                                            placeholder="Masukan lokasi pengabdian"
                                                            value="{{ old('lokasi') }}">
                                                        <div class="mt-1">
                                                            @error('lokasi')
                                                                <span class="text-danger"
                                                                    id="lokasi">{{ $message }}</span>
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
                                                            type="number" name="jumlah_peserta"
                                                            placeholder="Masukan jumlah peserta pengabdian"
                                                            value="{{ old('jumlah_peserta') }}">
                                                        <div class="mt-1">
                                                            @error('jumlah_peserta')
                                                                <span class="text-danger"
                                                                    id="jumlah_peserta">{{ $message }}</span>
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
                                                            <span class="text-danger"
                                                                id="laporan_pengabdian">{{ $message }}</span>
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
                                                            <span class="text-danger"
                                                                id="dokumentasi">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="pengabdian_status">Status
                                                            Pengabdian</label>
                                                        <select
                                                            class="form-select @error('pengabdian_status') is-invalid @enderror"
                                                            aria-label="Select status pengabdian" name="pengabdian_status"
                                                            required>
                                                            <option selected="">Pilih Status Pengabdian</option>
                                                            @foreach ($data['status_pengabdian'] as $pengabdian_status)
                                                                <option value="{{ $pengabdian_status->id }}"
                                                                    {{ old('pengabdian_status') == $pengabdian_status->id ? 'selected' : '' }}>
                                                                    {{ $pengabdian_status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('pengabdian_status')
                                                                <span class="text-danger"
                                                                    id="pengabdian_status ">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="catatan">Catatan</label>
                                                        <textarea
                                                            class="form-control @error('catatan')
                                                            is-invalid
                                                        @enderror"
                                                            id="" cols="30" rows="10" name="catatan">{{ old('catatan') }}</textarea>
                                                        <div class="mt-1">
                                                            @error('catatan')
                                                                <span class="text-danger"
                                                                    id="catatan">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22" type="reset"
                                                            value="Submit">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                    </div>
                    <div class="card-body p-0">
                        <div class="app-datatable-default overflow-auto">
                            <table id="example" class="display app-data-table default-data-table">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Bidang Pengabdian</th>
                                        <th>Sumber Dana Pengabdian</th>
                                        <th>Tahun Pengabdian</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status Pengabdian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['pengabdian'] as $Pengabdian)
                                        <tr>
                                            <td>{{ $Pengabdian->judul }}</td>
                                            <td>{{ $Pengabdian->pengabdian_bidang_name }}</td>
                                            <td>{{ $Pengabdian->pengabdian_sumber_dana_name }}</td>
                                            <td>{{ $Pengabdian->tahun }}</td>
                                            <td>{{ $Pengabdian->tgl_mulai }}</td>
                                            <td>{{ $Pengabdian->tgl_selesai }}</td>
                                            <td>{{ $Pengabdian->pengabdian_status_name }}</td>
                                            <td>
                                                <button type="button" data-item="{{ $Pengabdian->id }}"
                                                    data-bs-target="#detailPengabdian--{{ $Pengabdian->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('staffdosen.Pengabdian.edit', $Pengabdian->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('staffdosen.Pengabdian.destroy', $Pengabdian->id) }}"
                                                    method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button"
                                                        class="btn btn-light-danger icon-btn b-r-4 btn-delete">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Datatable end -->
        </div>
        <!-- Data Table end -->
        @foreach ($data['pengabdian'] as $Pengabdian)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailPengabdian--{{ $Pengabdian->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailPengabdian2">Detail Pengabdian</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Judul:
                                {{ $Pengabdian->judul }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Bidang Pengabdian:
                                {{ $Pengabdian->pengabdian_bidang_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Sumber Dana Pengabdian:
                                {{ $Pengabdian->pengabdian_sumber_dana_name }}
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tahun:
                                {{ $Pengabdian->tahun }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Mulai:
                                {{ $Pengabdian->tgl_mulai }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Selesai:
                                {{ $Pengabdian->tgl_selesai }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Lokasi:
                                {{ $Pengabdian->lokasi }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jumlah Peserta:
                                {{ $Pengabdian->jumlah_peserta }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Pengabdian:
                                {{ $Pengabdian->pengabdian_status_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Catatan:
                                {{ $Pengabdian->catatan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Laporan Pengabdian:
                            </p>
                            <iframe
                                src="{{ asset("/laraview/#../MD_disk/StaffOrDosen-{$Pengabdian->dosen_name}/laporan_pengabdian/{$Pengabdian->laporan_pengabdian}") }}"
                                width="450px" height="300px"></iframe>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Dokumentasi Pengabdian:
                                <a href="{{ asset("MD_disk/StaffOrDosen-{$Pengabdian->dosen_name}/dokumentasi_pengabdian/{$Pengabdian->dokumentasi}") }}"
                                    target="_blank"><b>Klik Disini</b></a>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">Close
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <!--customizer-->
    <div id="customizer"></div>

    <!-- data table js -->
    <script src="{{ asset('assets/vendor/datatable/jquery.dataTables.min.js') }}"></script>

    <!-- js-->
    <script src="{{ asset('assets/js/data_table.js') }}"></script>

    <!--form validation-->
    <script src="{{ asset('assets/js/formvalidation.js') }}"></script>

    <!-- select2 -->
    <script src="{{ asset('assets/vendor/select/select2.min.js') }}"></script>

    <!--js-->
    <script src="{{ asset('assets/js/select.js') }}"></script>

    <!-- flatpickr js-->
    <script src="{{ asset('assets/vendor/datepikar/flatpickr.js') }}"></script>

    <!--js-->
    <script src="{{ asset('assets/js/date_picker.js') }}"></script>

    <!--cleave js  -->
    <script src="{{ asset('assets/vendor/cleavejs/cleave.min.js') }}"></script>

    <!-- input mask currency -->
    {{-- <script src="{{ asset('assets/js/input_masks.js') }}"></script> --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Cleave('.price-input', {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });
        });
    </script> --}}
    <script type="text/javascript">
        function clearfilterFormPengabdian() {
            const form = document.getElementById('filterFormMouMoa');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
