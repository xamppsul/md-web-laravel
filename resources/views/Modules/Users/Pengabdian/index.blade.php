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
                                Tambah Bahan Ajar</button>
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
                                                                    {{ request('pengabdian_bidang ') == $pengabdian_bidang->id ? 'selected' : '' }}>
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
                                                                    {{ request('pengabdian_sumber_dana ') == $pengabdian_sumber_dana->id ? 'selected' : '' }}>
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
                                                            @foreach ($data['sumber_dana_pengabdian'] as $pengabdian_status)
                                                                <option value="{{ $pengabdian_status->id }}"
                                                                    {{ request('pengabdian_status  ') == $pengabdian_status->id ? 'selected' : '' }}>
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
                                                        <label class="form-label" for="judul">Judul Bahan Ajar</label>
                                                        <input
                                                            class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="judul"
                                                            placeholder="Masukan judul bahan ajar"
                                                            value="{{ old('judul') }}">
                                                        <div class="mt-1">
                                                            @error('judul')
                                                                <span class="text-danger"
                                                                    id="judul">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="bahan_ajar_jenis">Jenis Bahan
                                                            Ajar</label>
                                                        <select
                                                            class="form-select @error('bahan_ajar_jenis') is-invalid @enderror"
                                                            aria-label="Select bahan_ajar_jenis" name="bahan_ajar_jenis"
                                                            required>
                                                            <option selected="">Pilih Jenis Bahan Ajar</option>
                                                            @foreach ($data['jenis'] as $bahan_ajar_jenis)
                                                                <option value="{{ $bahan_ajar_jenis->id }}"
                                                                    {{ old('bahan_ajar_jenis') == $bahan_ajar_jenis->id ? 'selected' : '' }}>
                                                                    {{ $bahan_ajar_jenis->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('bahan_ajar_jenis')
                                                                <span class="text-danger"
                                                                    id="bahan_ajar_jenis">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="mata_kuliah">Matakuliah</label>
                                                        <input
                                                            class="form-control @error('mata_kuliah')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="mata_kuliah"
                                                            placeholder="Masukan Matakuliah"
                                                            value="{{ old('mata_kuliah') }}">
                                                        <div class="mt-1">
                                                            @error('mata_kuliah')
                                                                <span class="text-danger"
                                                                    id="mata_kuliah">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="program_studi">Program
                                                            Studi</label>
                                                        <input
                                                            class="form-control @error('program_studi')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="program_studi"
                                                            placeholder="Masukan Program Studi"
                                                            value="{{ old('program_studi') }}">
                                                        <div class="mt-1">
                                                            @error('program_studi')
                                                                <span class="text-danger"
                                                                    id="program_studi">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="semester">Semester</label>
                                                        <input
                                                            class="form-control @error('semester')
                                                            is-invalid
                                                        @enderror"
                                                            type="number" name="semester" placeholder="Masukan Semester"
                                                            value="{{ old('semester') }}">
                                                        <div class="mt-1">
                                                            @error('semester')
                                                                <span class="text-danger"
                                                                    id="semester">{{ $message }}</span>
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
                                                            value="{{ old('tanggal_terbit') }}">
                                                        <div class="mt-1">
                                                            @error('tanggal_terbit')
                                                                <span class="text-danger"
                                                                    id="tanggal_terbit">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="deskripsi">Deskripsi</label>
                                                        <textarea
                                                            class="form-control @error('deskripsi')
                                                            is-invalid
                                                        @enderror"
                                                            id="" cols="30" rows="10" name="deskripsi">{{ old('deskripsi') }}</textarea>
                                                        <div class="mt-1">
                                                            @error('deskripsi')
                                                                <span class="text-danger"
                                                                    id="deskripsi">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="file_bahan">File Bahan Ajar</label>
                                                        <input type="file"
                                                            class="form-control @error('file_bahan')
                                                            is-invalid
                                                        @enderror"
                                                            name="file_bahan">
                                                        @error('file_bahan')
                                                            <span class="text-danger"
                                                                id="file_bahan">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="link_bahan">Link Bahan Ajar</label>
                                                        <input
                                                            class="form-control @error('link_bahan')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="link_bahan"
                                                            placeholder="Masukan Link Bahan Ajar"
                                                            value="{{ old('link_bahan') }}">
                                                        <div class="mt-1">
                                                            @error('link_bahan')
                                                                <span class="text-danger"
                                                                    id="link_bahan">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"
                                                            for="bahan_ajar_status_penggunaan">Status Penggunaan Bahan
                                                            Ajar</label>
                                                        <select
                                                            class="form-select @error('bahan_ajar_status_penggunaan') is-invalid @enderror"
                                                            aria-label="Select bahan_ajar_status_penggunaan"
                                                            name="bahan_ajar_status_penggunaan" required>
                                                            <option selected="">Pilih Status Penggunaan Bahan Ajar
                                                            </option>
                                                            @foreach ($data['status_penggunaan'] as $bahan_ajar_status_penggunaan)
                                                                <option value="{{ $bahan_ajar_status_penggunaan->id }}"
                                                                    {{ old('bahan_ajar_status_penggunaan') == $bahan_ajar_status_penggunaan->id ? 'selected' : '' }}>
                                                                    {{ $bahan_ajar_status_penggunaan->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('bahan_ajar_status_penggunaan')
                                                                <span class="text-danger"
                                                                    id="bahan_ajar_status_penggunaan">{{ $message }}</span>
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
                                        <th>Jenis Bahan Ajar</th>
                                        <th>Matakuliah</th>
                                        <th>Program Studi</th>
                                        <th>Semester</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['bahanAjar'] as $BahanAjar)
                                        <tr>
                                            <td>{{ $BahanAjar->judul }}</td>
                                            <td>{{ $BahanAjar->bahan_ajar_jenis_name }}</td>
                                            <td>{{ $BahanAjar->mata_kuliah }}</td>
                                            <td>{{ $BahanAjar->program_studi }}</td>
                                            <td>{{ $BahanAjar->semester }}</td>
                                            <td>{{ $BahanAjar->tanggal_terbit }}</td>
                                            <td>{{ $BahanAjar->deskripsi }}</td>
                                            <td>
                                                <button type="button" data-item="{{ $BahanAjar->id }}"
                                                    data-bs-target="#detailBahanAjar--{{ $BahanAjar->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('staffdosen.BahanAjar.edit', $BahanAjar->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('staffdosen.BahanAjar.destroy', $BahanAjar->id) }}"
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
        @foreach ($data['bahanAjar'] as $BahanAjar)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailBahanAjar--{{ $BahanAjar->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailBahanAjar2">Detail Bahan Ajar</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Judul:
                                {{ $BahanAjar->judul }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jenis Bahan Ajar:
                                {{ $BahanAjar->bahan_ajar_jenis_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Matakuliah:
                                {{ $BahanAjar->mata_kuliah }}
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Program Studi:
                                {{ $BahanAjar->program_studi }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Terbit:
                                {{ $BahanAjar->tanggal_terbit }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Deskripsi:
                                {{ $BahanAjar->deskripsi }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Link:
                                <a href="{{ $BahanAjar->link_bahan }}" target="_blank"><b>Klik disini</b></a>
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Penggunaan:
                                {{ $BahanAjar->bahan_ajar_status_penggunaan_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Bahan Ajar:
                            </p>
                            <iframe src="{{ asset("/laraview/#../bahan_ajar/{$BahanAjar->file_bahan}") }}" width="450px"
                                height="300px"></iframe>
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
