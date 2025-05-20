@extends('layout.master')
@section('title', 'Penelitian')
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
                                <i class="ph-duotone  ph-table f-s-16"></i> Penelitian
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('staffdosen.Penelitian.index') }}" class="f-s-14 f-w-500">Data</a>
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
                            <button type="button" class="btn btn-primary b-r-22" aria-controls="collapseTambahPenelitian"
                                aria-expanded="false" data-bs-target="#collapseTambahPenelitian" data-bs-toggle="collapse"
                                type="button"> <i class="ti ti-text-plus"></i>
                                Tambah Penelitian</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('staffdosen.Penelitian.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormMouMoa">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="sumber_dana">Sumber Dana
                                                            Penelitian</label>
                                                        <select class="form-select" aria-label="Select Sumber Dana"
                                                            name="sumber_dana" required>
                                                            <option selected="">Pilih Sumber Dana Penelitian</option>
                                                            @foreach ($data['sumber_dana_penelitian'] as $sumber_dana)
                                                                <option value="{{ $sumber_dana->id }}"
                                                                    {{ request('sumber_dana') == $sumber_dana->id ? 'selected' : '' }}>
                                                                    {{ $sumber_dana->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="status">Status
                                                            Penelitian</label>
                                                        <select class="form-select" aria-label="Select Status Penelitian"
                                                            name="status" required>
                                                            <option selected="">Pilih Status Penelitian</option>
                                                            @foreach ($data['status_penelitian'] as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ request('status') == $status->id ? 'selected' : '' }}>
                                                                    {{ $status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22"
                                                            onclick="clearfilterFormMouMoa()" value="Clear">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- collapse tambah mou moa -->
                            <div class="collapse collapse-horizontal" id="collapseTambahPenelitian">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('staffdosen.Penelitian.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="judul">Judul Penelitian</label>
                                                        <input
                                                            class="form-control @error('judul')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="judul"
                                                            placeholder="Masukan judul penelitian"
                                                            value="{{ old('judul') }}">
                                                        <div class="mt-1">
                                                            @error('judul')
                                                                <span class="text-danger"
                                                                    id="judul">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="bidang_ilmu">Bidang Ilmu</label>
                                                        <input
                                                            class="form-control @error('bidang_ilmu')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="bidang_ilmu"
                                                            placeholder="Masukan Bidang Ilmu Penelitian"
                                                            value="{{ old('bidang_ilmu') }}">
                                                        <div class="mt-1">
                                                            @error('bidang_ilmu')
                                                                <span class="text-danger"
                                                                    id="bidang_ilmu">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tahun">Tahun
                                                            Penelitian</label>
                                                        <select class="form-select @error('tahun') is-invalid @enderror"
                                                            aria-label="Select tahun" name="tahun" required>
                                                            <option selected="">Pilih Tahun Penelitian</option>
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
                                                        <label class="form-label" for="penelitian_sumber_dana">Sumber
                                                            Dana Penelitian</label>
                                                        <select
                                                            class="form-select @error('penelitian_sumber_dana') is-invalid @enderror"
                                                            aria-label="Select penelitian_sumber_dana"
                                                            name="penelitian_sumber_dana" required>
                                                            <option selected="">Pilih Sumber Dana Penelitian
                                                            </option>
                                                            @foreach ($data['sumber_dana_penelitian'] as $penelitian_sumber_dana)
                                                                <option value="{{ $penelitian_sumber_dana->id }}"
                                                                    {{ old('penelitian_sumber_dana') == $penelitian_sumber_dana->id ? 'selected' : '' }}>
                                                                    {{ $penelitian_sumber_dana->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('penelitian_sumber_dana')
                                                                <span class="text-danger"
                                                                    id="penelitian_sumber_dana ">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="jumlah_dana">Jumlah Dana</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-secondary-200 b-r-left"
                                                                id="basic-addon1">Rp</span>
                                                            <input type="number" name="jumlah_dana"
                                                                class="form-control @error('jumlah_dana')
                                                                is-invalid
                                                            @enderror"
                                                                placeholder="Masukan Harga Perolehan"
                                                                value="{{ old('jumlah_dana') }}">
                                                        </div>
                                                        <div class="mt-1">
                                                            @error('jumlah_dana')
                                                                <span class="text-danger"
                                                                    id="tanggal_perolehan_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="anggota_tim">Anggota Tim</label>
                                                        <textarea
                                                            class="form-control @error('anggota_tim')
                                                            is-invalid
                                                        @enderror"
                                                            id="" cols="30" rows="10" name="anggota_tim">{{ old('anggota_tim') }}</textarea>
                                                        <div class="mt-1">
                                                            @error('anggota_tim')
                                                                <span class="text-danger"
                                                                    id="anggota_tim">{{ $message }}</span>
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
                                                            <span class="text-danger"
                                                                id="laporan_akhir">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="penelitian_status">Status
                                                            Penelitian</label>
                                                        <select
                                                            class="form-select @error('penelitian_status') is-invalid @enderror"
                                                            aria-label="Select penelitian_status" name="penelitian_status"
                                                            required>
                                                            <option selected="">Pilih Sumber Dana Penelitian
                                                            </option>
                                                            @foreach ($data['status_penelitian'] as $penelitian_status)
                                                                <option value="{{ $penelitian_status->id }}"
                                                                    {{ old('penelitian_status') == $penelitian_status->id ? 'selected' : '' }}>
                                                                    {{ $penelitian_status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('penelitian_status')
                                                                <span class="text-danger"
                                                                    id="penelitian_status ">{{ $message }}</span>
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
                                        <th>Bidang Ilmu</th>
                                        <th>Tahun</th>
                                        <th>Sumber Dana</th>
                                        <th>Status</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['penelitian'] as $Penelitian)
                                        <tr>
                                            <td>{{ $Penelitian->judul }}</td>
                                            <td>{{ $Penelitian->bidang_ilmu }}</td>
                                            <td>{{ $Penelitian->tahun }}</td>
                                            <td>{{ $Penelitian->penelitian_sumber_dana_name }}</td>
                                            <td>{{ $Penelitian->penelitian_status_name }}</td>
                                            <td>{{ $Penelitian->tgl_mulai }}</td>
                                            <td>{{ $Penelitian->tgl_selesai }}</td>
                                            <td>
                                                <button type="button" data-item="{{ $Penelitian->id }}"
                                                    data-bs-target="#detailPenelitian--{{ $Penelitian->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('staffdosen.Penelitian.edit', $Penelitian->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('staffdosen.Penelitian.destroy', $Penelitian->id) }}"
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
        @foreach ($data['penelitian'] as $Penelitian)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailPenelitian--{{ $Penelitian->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailPenelitian2">Detail Penelitian</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Judul:
                                {{ $Penelitian->judul }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Bidang Ilmu:
                                {{ $Penelitian->bidang_ilmu }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tahun:
                                {{ $Penelitian->tahun }}
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Mulai:
                                {{ $Penelitian->tgl_mulai }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Selesai:
                                {{ $Penelitian->tgl_selesai }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Sumber Dana Penelitian:
                                {{ $Penelitian->penelitian_sumber_dana_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jumlah Dana:
                                {{ $Penelitian->jumlah_dana }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Anggota Tim:
                                {{ $Penelitian->anggota_tim }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Penelitian:
                                {{ $Penelitian->penelitian_status_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Catatan:
                                {{ $Penelitian->catatan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Laporan Akhir:
                            </p>
                            <iframe
                                src="{{ asset("/laraview/#../laporan_akhir_penelitian/{$Penelitian->laporan_akhir}") }}"
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
        function clearfilterFormMouMoa() {
            const form = document.getElementById('filterFormMouMoa');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
