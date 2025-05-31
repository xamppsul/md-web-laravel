@extends('user-layout.master')
@section('title', 'Bahan Ajar')
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
                                <i class="ph-duotone  ph-table f-s-16"></i> List Publikasi
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('staffdosen.ListPublikasi.index') }}" class="f-s-14 f-w-500">Data</a>
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
                                aria-controls="collapseTambahLIstPublikasi" aria-expanded="false"
                                data-bs-target="#collapseTambahLIstPublikasi" data-bs-toggle="collapse" type="button"> <i
                                    class="ti ti-text-plus"></i>
                                Tambah List Publikasi</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('staffdosen.ListPublikasi.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormListPublikasi">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="list_publikasi_jenis">Jenis
                                                            Publikasi</label>
                                                        <select class="form-select" aria-label="Select Jenis List Publikasi"
                                                            name="list_publikasi_jenis" required>
                                                            <option selected="">Pilih Jenis Publikasi</option>
                                                            @foreach ($data['jenis_list_publikasi'] as $list_publikasi_jenis)
                                                                <option value="{{ $list_publikasi_jenis->id }}"
                                                                    {{ request('list_publikasi_jenis') == $list_publikasi_jenis->id ? 'selected' : '' }}>
                                                                    {{ $list_publikasi_jenis->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="list_publikasi_status">Status
                                                            Publikasi</label>
                                                        <select class="form-select" aria-label="Select Status Publikasi"
                                                            name="list_publikasi_status" required>
                                                            <option selected="">Pilih Status Penggunaan</option>
                                                            @foreach ($data['status_list_publikasi'] as $list_publikasi_status)
                                                                <option value="{{ $list_publikasi_status->id }}"
                                                                    {{ request('list_publikasi_status') == $list_publikasi_status->id ? 'selected' : '' }}>
                                                                    {{ $list_publikasi_status->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22"
                                                            onclick="clearfilterFormListPublikasi()" value="Clear">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- collapse tambah list publikasi -->
                            <div class="collapse collapse-horizontal" id="collapseTambahLIstPublikasi">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('staffdosen.ListPublikasi.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="judul_publikasi">Judul
                                                            Publikasi</label>
                                                        <input
                                                            class="form-control @error('judul_publikasi')
                                                            is-invalid
                                                        @enderror"
                                                            type="text" name="judul_publikasi"
                                                            placeholder="Masukan judul publikasi"
                                                            value="{{ old('judul_publikasi') }}">
                                                        <div class="mt-1">
                                                            @error('judul_publikasi')
                                                                <span class="text-danger"
                                                                    id="judul_publikasi">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="list_publikasi_jenis">Jenis
                                                            Publikasi</label>
                                                        <select
                                                            class="form-select @error('list_publikasi_jenis') is-invalid @enderror"
                                                            aria-label="Select list_publikasi_jenis"
                                                            name="list_publikasi_jenis" required>
                                                            <option selected="">Pilih Jenis Publikasi</option>
                                                            @foreach ($data['jenis_list_publikasi'] as $list_publikasi_jenis)
                                                                <option value="{{ $list_publikasi_jenis->id }}"
                                                                    {{ old('list_publikasi_jenis') == $list_publikasi_jenis->id ? 'selected' : '' }}>
                                                                    {{ $list_publikasi_jenis->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('list_publikasi_jenis')
                                                                <span class="text-danger"
                                                                    id="list_publikasi_jenis">{{ $message }}</span>
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
                                                            type="text" name="nama_jurnal"
                                                            placeholder="Masukan nama jurnal"
                                                            value="{{ old('nama_jurnal') }}">
                                                        <div class="mt-1">
                                                            @error('nama_jurnal')
                                                                <span class="text-danger"
                                                                    id="nama_jurnal">{{ $message }}</span>
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
                                                            value="{{ old('volume') }}">
                                                        <div class="mt-1">
                                                            @error('volume')
                                                                <span class="text-danger"
                                                                    id="volume">{{ $message }}</span>
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
                                                            value="{{ old('nomor') }}">
                                                        <div class="mt-1">
                                                            @error('nomor')
                                                                <span class="text-danger"
                                                                    id="nomor">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tahun_terbit">Tahun
                                                            Terbit</label>
                                                        <select
                                                            class="form-select @error('tahun_terbit') is-invalid @enderror"
                                                            aria-label="Select tahun terbit" name="tahun_terbit" required>
                                                            <option selected="">Pilih Tahun Terbit</option>
                                                            @for ($i = 1990; $i <= date('Y'); $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ old('tahun_terbit') == $i ? 'selected' : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('tahun_terbit')
                                                                <span class="text-danger"
                                                                    id="tahun_terbit">{{ $message }}</span>
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
                                                        <label class="form-label" for="penulis_lain">Penulis Lain</label>
                                                        <textarea
                                                            class="form-control @error('penulis_lain')
                                                            is-invalid
                                                        @enderror"
                                                            id="" cols="30" rows="10" name="penulis_lain">{{ old('penulis_lain') }}</textarea>
                                                        <div class="mt-1">
                                                            @error('penulis_lain')
                                                                <span class="text-danger"
                                                                    id="penulis_lain">{{ $message }}</span>
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
                                                            type="text" name="link_publikasi"
                                                            placeholder="Masukan link_publikasi"
                                                            value="{{ old('link_publikasi') }}">
                                                        <div class="mt-1">
                                                            @error('link_publikasi')
                                                                <span class="text-danger"
                                                                    id="link_publikasi">{{ $message }}</span>
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
                                                            <span class="text-danger"
                                                                id="file_publikasi">{{ $message }}</span>
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
                                                            value="{{ old('doi') }}">
                                                        <div class="mt-1">
                                                            @error('doi')
                                                                <span class="text-danger"
                                                                    id="doi">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="list_publikasi_status">Status
                                                            Publikasi</label>
                                                        <select
                                                            class="form-select @error('list_publikasi_status') is-invalid @enderror"
                                                            aria-label="Select list_publikasi_status"
                                                            name="list_publikasi_status" required>
                                                            <option selected="">Pilih Status Publikasi</option>
                                                            @foreach ($data['status_list_publikasi'] as $list_publikasi_status)
                                                                <option value="{{ $list_publikasi_status->id }}"
                                                                    {{ old('list_publikasi_status') == $list_publikasi_status->id ? 'selected' : '' }}>
                                                                    {{ $list_publikasi_status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('list_publikasi_status')
                                                                <span class="text-danger"
                                                                    id="list_publikasi_status">{{ $message }}</span>
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
                                        <th>Judul Publikasi</th>
                                        <th>Jenis Publikasi</th>
                                        <th>Nama Jurnal</th>
                                        <th>Volume</th>
                                        <th>Nomor</th>
                                        <th>Tahun Terbit</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Status Publikasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['list_publikasi'] as $ListPublikasi)
                                        <tr>
                                            <td>{{ $ListPublikasi->judul_publikasi }}</td>
                                            <td>{{ $ListPublikasi->list_publikasi_jenis_name }}</td>
                                            <td>{{ $ListPublikasi->nama_jurnal }}</td>
                                            <td>{{ $ListPublikasi->volume }}</td>
                                            <td>{{ $ListPublikasi->nomor }}</td>
                                            <td>{{ $ListPublikasi->tahun_terbit }}</td>
                                            <td>{{ $ListPublikasi->tanggal_terbit }}</td>
                                            <td>{{ $ListPublikasi->list_publikasi_status_name }}</td>
                                            <td>
                                                <button type="button" data-item="{{ $ListPublikasi->id }}"
                                                    data-bs-target="#detailListPublikasi--{{ $ListPublikasi->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('staffdosen.ListPublikasi.edit', $ListPublikasi->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('staffdosen.ListPublikasi.destroy', $ListPublikasi->id) }}"
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
        @foreach ($data['list_publikasi'] as $ListPublikasi)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailListPublikasi--{{ $ListPublikasi->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailListPublikasi2">Detail Publikasi</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Judul:
                                {{ $ListPublikasi->judul_publikasi }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jenis Publikasi:
                                {{ $ListPublikasi->list_publikasi_jenis_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nama Jurnal:
                                {{ $ListPublikasi->nama_jurnal }}
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Volume:
                                {{ $ListPublikasi->volume }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nomor:
                                {{ $ListPublikasi->nomor }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tahun Terbit:
                                {{ $ListPublikasi->tahun_terbit }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Terbit:
                                {{ $ListPublikasi->tanggal_terbit }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Penulis Lain:
                                {{ $ListPublikasi->penulis_lain }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> DOI:
                                {{ $ListPublikasi->doi }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Publikasi:
                                {{ $ListPublikasi->list_publikasi_status_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Keterangan:
                                {{ $ListPublikasi->keterangan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Link Publikasi:
                                <a href="{{ $ListPublikasi->link_publikasi }}" target="_blank"><b>Klik disini</b></a>
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Bahan Ajar:
                            </p>
                            <iframe
                                src="{{ asset("/laraview/#../MD_disk/{$ListPublikasi->dosen_id}-{$ListPublikasi->dosen_name}/file_publikasi/{$ListPublikasi->file_publikasi}") }}"
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
        function clearfilterFormListPublikasi() {
            const form = document.getElementById('filterFormListPublikasi');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
