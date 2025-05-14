@extends('layout.master')
@section('title', 'Master Kegiatan')
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
                <h4 class="main-title">Master</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a href="#" class="f-s-14 f-w-500">
                            <span>
                                <i class="ph-duotone  ph-table f-s-16"></i> Kegiatan
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('admin.master.MouMoa.index') }}" class="f-s-14 f-w-500">Data</a>
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
                            <button type="button" class="btn btn-primary b-r-22" aria-controls="collapseTambahKegiatan"
                                aria-expanded="false" data-bs-target="#collapseTambahKegiatan" data-bs-toggle="collapse"
                                type="button"> <i class="ti ti-text-plus"></i>
                                Tambah Kegiatan</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('admin.master.Kegiatan.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormkegiatan">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="kegiatan_jenis">Jenis
                                                            Kegiatan</label>
                                                        <select class="form-select" aria-label="Select Jenis Kegiatan"
                                                            name="kegiatan_jenis" required>
                                                            <option selected="">Pilih Jenis Kegiatan</option>
                                                            @foreach ($data['jenis'] as $kegiatan_jenis)
                                                                <option value="{{ $kegiatan_jenis->id }}"
                                                                    {{ request('kegiatan_jenis') == $kegiatan_jenis->id ? 'selected' : '' }}>
                                                                    {{ $kegiatan_jenis->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tanggal_kegiatan">Tanggal
                                                            Kegiatan</label>
                                                        <input class="form-control basic-date" type="text"
                                                            name="tanggal_kegiatan" placeholder="YYYY-MM-DD"
                                                            value="{{ request('tanggal_kegiatan') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="nama_kegiatan">Nama Kegiatan</label>
                                                        <input class="form-control" id="nama_kegiatan"
                                                            placeholder="Masukan Nama Kegiatan" type="text"
                                                            name="nama_kegiatan" value="{{ request('nama_kegiatan') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tempat_lokasi">Tempat
                                                            Kegiatan</label>
                                                        <input class="form-control" id="tempat_lokasi"
                                                            placeholder="Masukan Tempat Kegiatan" type="text"
                                                            name="tempat_lokasi" value="{{ request('tempat_lokasi') }}">
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22"
                                                            onclick="clearfilterFormkegiatan()" value="Clear">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- collapse tambah mou moa -->
                            <div class="collapse collapse-horizontal" id="collapseTambahKegiatan">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('admin.master.Kegiatan.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="nama_kegiatan">Nama
                                                            Kegiatan</label>
                                                        <input
                                                            class="form-control @error('nama_kegiatan')
                                                            is-invalid
                                                        @enderror"
                                                            id="nama_kegiatan" placeholder="Masukan Nama Kegiatan"
                                                            type="text" value="{{ old('nama_kegiatan') }}"
                                                            name="nama_kegiatan">
                                                        <div class="mt-1">
                                                            @error('nama_kegiatan')
                                                                <span class="text-danger"
                                                                    id="nama_kegiatan">{{ $message }}</span>
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
                                                                    {{ old('kegiatan_jenis') == $jenisKegiatan->id ? 'selected' : '' }}>
                                                                    {{ $jenisKegiatan->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('kegiatan_jenis')
                                                                <span class="text-danger"
                                                                    id="kegiatan_jenis">{{ $message }}</span>
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
                                                            type="text" name="tanggal_kegiatan"
                                                            placeholder="YYYY-MM-DD"
                                                            value="{{ old('tanggal_kegiatan') }}">
                                                        <div class="mt-1">
                                                            @error('tanggal_kegiatan')
                                                                <span class="text-danger"
                                                                    id="tanggal_kegiatan">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tempat_lokasi">Tempat
                                                            kegiatan</label>
                                                        <input
                                                            class="form-control @error('tempat_lokasi') is-invalid @enderror"
                                                            id="tempat_lokasi" name="tempat_lokasi"
                                                            placeholder="Masukan Nomor Dokumen" type="text"
                                                            value="{{ old('tempat_lokasi') }}">
                                                        <div class="mt-1">
                                                            @error('tempat_lokasi')
                                                                <span class="text-danger"
                                                                    id="tempat_lokasi">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"
                                                            for="penyelenggara">Penyelenggara</label>
                                                        <input
                                                            class="form-control @error('penyelenggara') is-invalid @enderror"
                                                            id="penyelenggara" name="penyelenggara"
                                                            placeholder="Masukan Nomor Dokumen" type="text"
                                                            value="{{ old('penyelenggara') }}">
                                                        <div class="mt-1">
                                                            @error('penyelenggara')
                                                                <span class="text-danger"
                                                                    id="penyelenggara">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="jumlah_peserta">Jumlah
                                                            Peserta</label>
                                                        <input
                                                            class="form-control @error('jumlah_peserta') is-invalid @enderror"
                                                            id="jumlah_peserta" name="jumlah_peserta"
                                                            placeholder="Masukan Nomor Dokumen" type="text"
                                                            value="{{ old('jumlah_peserta') }}">
                                                        <div class="mt-1">
                                                            @error('jumlah_peserta')
                                                                <span class="text-danger"
                                                                    id="jumlah_peserta">{{ $message }}</span>
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
                                                            <span class="text-danger"
                                                                id="file_daftar_hadir">{{ $message }}</span>
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
                                                            <span class="text-danger"
                                                                id="file_kegiatan">{{ $message }}</span>
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
                                                                    {{ old('kegiatan_status') == $statusKegiatan->id ? 'selected' : '' }}>
                                                                    {{ $statusKegiatan->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('kegiatan_status')
                                                                <span class="text-danger"
                                                                    id="kegiatan_status">{{ $message }}</span>
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
                                        <th>Nama Kegiatan</th>
                                        <th>Jenis Kegiatan</th>
                                        <th>Tempat/Lokasi Kegiatan</th>
                                        <th>Jumlah Peserta</th>
                                        <th>Penyelenggara</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['kegiatan'] as $kegiatan)
                                        <tr>
                                            <td>{{ $kegiatan->nama_kegiatan }}</td>
                                            <td>{{ $kegiatan->kegiatan_jenis_name }}</td>
                                            <td>{{ $kegiatan->tempat_lokasi }}</td>
                                            </td>
                                            <td>{{ $kegiatan->jumlah_peserta }}</td>
                                            <td>{{ $kegiatan->penyelenggara }}</td>
                                            <td>
                                                <button type="button" data-item="{{ $kegiatan->id }}"
                                                    data-bs-target="#detailKegiatan--{{ $kegiatan->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('admin.master.Kegiatan.edit', $kegiatan->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('admin.master.Kegiatan.destroy', $kegiatan->id) }}"
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
        @foreach ($data['kegiatan'] as $kegiatan)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailKegiatan--{{ $kegiatan->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailKegiatan2">Detail Mou Moa</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nama Kegiatan:
                                {{ $kegiatan->nama_kegiatan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jenis Kegiatan:
                                {{ $kegiatan->kegiatan_jenis_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Kegiatan:
                                {{ $kegiatan->tanggal_kegiatan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tempat/Lokasi Kegiatan:
                                {{ $kegiatan->tempat_lokasi }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Penyelenggara Kegiatan:
                                {{ $kegiatan->penyelenggara }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jumlah Peserta:
                                {{ $kegiatan->jumlah_peserta }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Kegiatan:
                                {{ $kegiatan->kegiatan_status_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Keterangan:
                                {{ $kegiatan->keterangan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> File Daftar Hadir:
                            </p>
                            <iframe
                                src="{{ asset("/laraview/#../docsKegiatanDaftarHadir/{$kegiatan->file_daftar_hadir}") }}"
                                width="450px" height="300px"></iframe>

                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> File Kegiatan:
                                @empty($kegiatan->file_kegiatan)
                                    {{ __('Tidak ada file kegiatan') }}
                                @else
                                    <a href="{{ asset("/docsFileKegiatan/{$kegiatan->file_kegiatan}") }}"
                                        target="_blank">Buka file kegiatan</a>
                                @endempty
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
        function clearfilterFormkegiatan() {
            const form = document.getElementById('filterFormkegiatan');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
