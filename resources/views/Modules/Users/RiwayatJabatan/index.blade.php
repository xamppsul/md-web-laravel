@extends('user-layout.master')
@section('title', 'Riwayat Jabatan')
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
                                <i class="ph-duotone  ph-table f-s-16"></i> Riwayat Jabatan
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('staffdosen.RiwayatJabatan.index') }}" class="f-s-14 f-w-500">Data</a>
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
                            <button type="button" class="btn btn-primary b-r-22"
                                aria-controls="collapseTambahRiwayatJabatan" aria-expanded="false"
                                data-bs-target="#collapseTambahRiwayatJabatan" data-bs-toggle="collapse" type="button"> <i
                                    class="ti ti-text-plus"></i>
                                Tambah Riwayat Jabatan</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('staffdosen.RiwayatJabatan.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormRiwayatJabatan">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="riwayat_jabatan_jenis">Jenis Bahan
                                                            Ajar</label>
                                                        <select class="form-select"
                                                            aria-label="Select Jenis Riwayat Jabatan"
                                                            name="riwayat_jabatan_jenis" required>
                                                            <option selected="">Pilih Jenis Riwayat Jabatan</option>
                                                            @foreach ($data['riwayat_jabatan_jenis'] as $riwayat_jabatan_jenis)
                                                                <option value="{{ $riwayat_jabatan_jenis->id }}"
                                                                    {{ request('riwayat_jabatan_jenis') == $riwayat_jabatan_jenis->id ? 'selected' : '' }}>
                                                                    {{ $riwayat_jabatan_jenis->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="riwayat_jabatan_status">Status
                                                            Riwayat Jabatan</label>
                                                        <select class="form-select" aria-label="Select Status Penggunaan"
                                                            name="riwayat_jabatan_status" required>
                                                            <option selected="">Pilih Status Riwayat Jabatan</option>
                                                            @foreach ($data['riwayat_jabatan_status'] as $riwayat_jabatan_status)
                                                                <option value="{{ $riwayat_jabatan_status->id }}"
                                                                    {{ request('riwayat_jabatan_status') == $riwayat_jabatan_status->id ? 'selected' : '' }}>
                                                                    {{ $riwayat_jabatan_status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22"
                                                            onclick="clearfilterFormRiwayatJabatan()" value="Clear">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- collapse tambah riwayat jabatan -->
                            <div class="collapse collapse-horizontal" id="collapseTambahRiwayatJabatan">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('staffdosen.RiwayatJabatan.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="nama_jabatan">Nama Jabatan</label>
                                                        <input
                                                            class="form-control @error('nama_jabatan')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="nama_jabatan"
                                                            placeholder="Masukan nama jabatan"
                                                            value="{{ old('nama_jabatan') }}">
                                                        <div class="mt-1">
                                                            @error('nama_jabatan')
                                                                <span class="text-danger"
                                                                    id="nama_jabatan">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="riwayat_jabatan_jenis">Jenis
                                                            Riwayat
                                                            Jabatan</label>
                                                        <select
                                                            class="form-select @error('riwayat_jabatan_jenis') is-invalid @enderror"
                                                            aria-label="select_riwayat_jabatan_jenis"
                                                            name="riwayat_jabatan_jenis" required>
                                                            <option selected="">Pilih Jenis Riwayat Jabatan</option>
                                                            @foreach ($data['riwayat_jabatan_jenis'] as $riwayat_jabatan_jenis)
                                                                <option value="{{ $riwayat_jabatan_jenis->id }}"
                                                                    {{ old('riwayat_jabatan_jenis') == $riwayat_jabatan_jenis->id ? 'selected' : '' }}>
                                                                    {{ $riwayat_jabatan_jenis->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('riwayat_jabatan_jenis')
                                                                <span class="text-danger"
                                                                    id="riwayat_jabatan_jenis">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="unit_kerja">Unit Kerja</label>
                                                        <input
                                                            class="form-control @error('unit_kerja')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="unit_kerja"
                                                            placeholder="Masukan unit kerja"
                                                            value="{{ old('unit_kerja') }}">
                                                        <div class="mt-1">
                                                            @error('unit_kerja')
                                                                <span class="text-danger"
                                                                    id="unit_kerja">{{ $message }}</span>
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
                                                            type="text" name="no_sk_jabatan"
                                                            placeholder="Masukan No Sk Jabatan"
                                                            value="{{ old('no_sk_jabatan') }}">
                                                        <div class="mt-1">
                                                            @error('no_sk_jabatan')
                                                                <span class="text-danger"
                                                                    id="no_sk_jabatan">{{ $message }}</span>
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
                                                            value="{{ old('tanggal_sk') }}">
                                                        <div class="mt-1">
                                                            @error('tanggal_sk')
                                                                <span class="text-danger"
                                                                    id="tanggal_sk">{{ $message }}</span>
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
                                                            value="{{ old('tanggal_mulai') }}">
                                                        <div class="mt-1">
                                                            @error('tanggal_mulai')
                                                                <span class="text-danger"
                                                                    id="tanggal_mulai">{{ $message }}</span>
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
                                                            type="text" name="tanggal_selesai"
                                                            placeholder="YYYY-MM-DD"
                                                            value="{{ old('tanggal_selesai') }}">
                                                        <div class="mt-1">
                                                            @error('tanggal_selesai')
                                                                <span class="text-danger"
                                                                    id="tanggal_selesai">{{ $message }}</span>
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
                                                            <span class="text-danger"
                                                                id="dokumen_sk">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="riwayat_jabatan_status">Status
                                                            Riwayat Jabatan</label>
                                                        <select
                                                            class="form-select @error('riwayat_jabatan_status') is-invalid @enderror"
                                                            aria-label="select_riwayat_jabatan_status"
                                                            name="riwayat_jabatan_status" required>
                                                            <option selected="">Pilih Jenis Riwayat Jabatan</option>
                                                            @foreach ($data['riwayat_jabatan_status'] as $riwayat_jabatan_status)
                                                                <option value="{{ $riwayat_jabatan_status->id }}"
                                                                    {{ old('riwayat_jabatan_status') == $riwayat_jabatan_status->id ? 'selected' : '' }}>
                                                                    {{ $riwayat_jabatan_status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('riwayat_jabatan_status')
                                                                <span class="text-danger"
                                                                    id="riwayat_jabatan_status">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="keterangan">Keterangan</label>
                                                        <textarea
                                                            class="form-control @error('keterangan')
                                                            is-invalid
                                                        @enderror"
                                                            id="" cols="30" rows="10" name="keterangan">{{ old('keterangan') }}</textarea>
                                                        <div class="mt-1">
                                                            @error('keterangan')
                                                                <span class="text-danger"
                                                                    id="keterangan">{{ $message }}</span>
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
                                        <th>Nama Jabatan</th>
                                        <th>Jenis Riwayat Jabatan</th>
                                        <th>Unit Kerja</th>
                                        <th>No SK Jabatan</th>
                                        <th>Tanggal Terbit Sk</th>
                                        <th>Status Riwayat Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['riwayatJabatan'] as $RiwayatJabatan)
                                        <tr>
                                            <td>{{ $RiwayatJabatan->nama_jabatan }}</td>
                                            <td>{{ $RiwayatJabatan->riwayat_jabatan_jenis_name }}</td>
                                            <td>{{ $RiwayatJabatan->unit_kerja }}</td>
                                            <td>{{ $RiwayatJabatan->no_sk_jabatan }}</td>
                                            <td>{{ $RiwayatJabatan->tanggal_sk }}</td>
                                            <td>{{ $RiwayatJabatan->riwayat_jabatan_status_name }}</td>
                                            <td>
                                                <button type="button" data-item="{{ $RiwayatJabatan->id }}"
                                                    data-bs-target="#detailRiwayatJabatan--{{ $RiwayatJabatan->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('staffdosen.RiwayatJabatan.edit', $RiwayatJabatan->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('staffdosen.RiwayatJabatan.destroy', $RiwayatJabatan->id) }}"
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
        @foreach ($data['riwayatJabatan'] as $RiwayatJabatan)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailRiwayatJabatan--{{ $RiwayatJabatan->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailRiwayatJabatan2">Detail Riwayat Jabatan</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nama Jabatan:
                                {{ $RiwayatJabatan->nama_jabatan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jenis Riwayat Jabatan:
                                {{ $RiwayatJabatan->riwayat_jabatan_jenis_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Unit Kerja:
                                {{ $RiwayatJabatan->unit_kerja }}
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> No SK Jabatan:
                                {{ $RiwayatJabatan->no_sk_jabatan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Terbit SK:
                                {{ $RiwayatJabatan->tanggal_sk }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Mulai Menjabat:
                                {{ $RiwayatJabatan->tanggal_mulai }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Selesai Menjabat:
                                {{ $RiwayatJabatan->tanggal_selesai ?: '-' }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Riwayat Jabatan:
                                {{ $RiwayatJabatan->riwayat_jabatan_status }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Keterangan:
                                {{ $RiwayatJabatan->keterangan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Dokumen SK:
                            </p>
                            <iframe
                                src="{{ asset("/laraview/#../MD_disk/{$RiwayatJabatan->dosen_id}-{$RiwayatJabatan->dosen_name}/dokumen_sk_riwayat_jabatan/{$RiwayatJabatan->dokumen_sk}") }}"
                                width="450px" height="300px"></iframe>
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
        function clearfilterFormRiwayatJabatan() {
            const form = document.getElementById('filterFormRiwayatJabatan');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
