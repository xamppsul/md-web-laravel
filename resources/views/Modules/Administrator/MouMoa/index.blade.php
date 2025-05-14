@extends('layout.master')
@section('title', 'Master MouMoa')
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
                                <i class="ph-duotone  ph-table f-s-16"></i> Mou/Moa
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
                            <button type="button" class="btn btn-primary b-r-22" aria-controls="collapseTambahMouMoa"
                                aria-expanded="false" data-bs-target="#collapseTambahMouMoa" data-bs-toggle="collapse"
                                type="button"> <i class="ti ti-text-plus"></i>
                                Tambah Mou/Moa</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('admin.master.MouMoa.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormMouMoa">
                                                    <div class="col-md-6">
                                                        <label class="form-label"
                                                            for="mou_moa_klasifikasi">Klasifikasi</label>
                                                        <select class="form-select" aria-label="Select Klasifikasi"
                                                            name="mou_moa_klasifikasi">
                                                            <option selected="">Pilih Klasifikasi</option>
                                                            @foreach ($data['klasifikasi'] as $mou_moa_klasifikasi)
                                                                <option value="{{ $mou_moa_klasifikasi->id }}"
                                                                    {{ request('mou_moa_klasifikasi') == $mou_moa_klasifikasi->id ? 'selected' : '' }}>
                                                                    {{ $mou_moa_klasifikasi->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"
                                                            for="mou_moa_bidang_kerjasama">Kerjasama</label>
                                                        <select class="form-select" aria-label="Select Kerjasama"
                                                            name="mou_moa_bidang_kerjasama">
                                                            <option selected="">Pilih Kerjasama</option>
                                                            @foreach ($data['kerjasama'] as $mou_moa_bidang_kerjasama)
                                                                <option value="{{ $mou_moa_bidang_kerjasama->id }}"
                                                                    {{ request('mou_moa_bidang_kerjasama') == $mou_moa_bidang_kerjasama->id ? 'selected' : '' }}>
                                                                    {{ $mou_moa_bidang_kerjasama->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="mou_moa_status">Status</label>
                                                        <select class="form-select" aria-label="Select Status"
                                                            name="mou_moa_status">
                                                            <option selected="">Pilih Status</option>
                                                            @foreach ($data['status'] as $mou_moa_status)
                                                                <option value="{{ $mou_moa_status->id }}"
                                                                    {{ request('mou_moa_status') == $mou_moa_status->id ? 'selected' : '' }}>
                                                                    {{ $mou_moa_status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="penanggungJawab">Penanggung
                                                            Jawab</label>
                                                        <select class="form-select" aria-label="Select Kerjasama"
                                                            name="users_id">
                                                            <option selected="">Pilih Penanggung Jawab</option>
                                                            @foreach ($data['user'] as $penanggungJawab)
                                                                <option value="{{ $penanggungJawab->id }}"
                                                                    {{ request('users_id') == $penanggungJawab->id ? 'selected' : '' }}>
                                                                    {{ $penanggungJawab->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="nama_mitra">Mitra</label>
                                                        <input class="form-control" id="nama_mitra"
                                                            placeholder="Masukan Nama Mitra" type="text"
                                                            name="nama_mitra" value="{{ request('nama_mitra') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="jenisDokumen">Jenis Dokumen</label>
                                                        <select class="form-select" aria-label="Select Jenis Dokumen"
                                                            name="mou_moa_jenis_dokumen">
                                                            <option selected="">Pilih Jenis Dokumen</option>
                                                            @foreach ($data['jenis_dokumen'] as $jenisDokumen)
                                                                <option value="{{ $jenisDokumen->id }}"
                                                                    {{ request('mou_moa_jenis_dokumen') == $jenisDokumen->id ? 'selected' : '' }}>
                                                                    {{ $jenisDokumen->name }}
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
                            <div class="collapse collapse-horizontal" id="collapseTambahMouMoa">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('admin.master.MouMoa.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="nomor_dokumen">Nomor
                                                            Dokumen</label>
                                                        <input
                                                            class="form-control @error('nomor_dokumen') is-invalid @enderror"
                                                            id="nomor_dokumen" name="nomor_dokumen"
                                                            placeholder="Masukan Nomor Dokumen" type="text"
                                                            value="{{ old('nomor_dokumen') }}">
                                                        <div class="mt-1">
                                                            @error('nomor_dokumen')
                                                                <span class="text-danger"
                                                                    id="nomor_dokumen">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="mou_moa_jenis_dokumen">Jenis
                                                            Dokumen</label>
                                                        <select
                                                            class="form-select @error('mou_moa_jenis_dokumen')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select jenis dokumen"
                                                            name="mou_moa_jenis_dokumen">
                                                            <option selected="">Pilih Jenis Dokumen</option>
                                                            @foreach ($data['jenis_dokumen'] as $jenisDokumen)
                                                                <option value="{{ $jenisDokumen->id }}"
                                                                    {{ old('mou_moa_jenis_dokumen') == $jenisDokumen->id ? 'selected' : '' }}>
                                                                    {{ $jenisDokumen->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('mou_moa_jenis_dokumen')
                                                                <span class="text-danger"
                                                                    id="mou_moa_jenis_dokumen">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="nama_mitra">Nama Mitra</label>
                                                        <input
                                                            class="form-control @error('nama_mitra')
                                                            is-invalid
                                                        @enderror"
                                                            id="nama_mitra" placeholder="Masukan Nama Mitra"
                                                            type="text" value="{{ old('nama_mitra') }}"
                                                            name="nama_mitra">
                                                        <div class="mt-1">
                                                            @error('nama_mitra')
                                                                <span class="text-danger"
                                                                    id="nama_mitra">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="judul_kerjasama">Judul
                                                            Kerjasama</label>
                                                        <input
                                                            class="form-control @error('judul_kerjasama')
                                                            is-invalid
                                                        @enderror"
                                                            id="judul_kerjasama" placeholder="Masukan Judul Kerjasama"
                                                            type="text" value="{{ old('judul_kerjasama') }}"
                                                            name="judul_kerjasama">
                                                        <div class="mt-1">
                                                            @error('judul_kerjasama')
                                                                <span class="text-danger"
                                                                    id="judul_kerjasama">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="mou_moa_bidang_kerjasama">Kerja
                                                            Sama</label>
                                                        <select
                                                            class="form-select @error('mou_moa_bidang_kerjasama')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select kerjasama" name="mou_moa_bidang_kerjasama">
                                                            <option selected="">Pilih kerjasama</option>
                                                            @foreach ($data['kerjasama'] as $kerjasama)
                                                                <option value="{{ $kerjasama->id }}"
                                                                    {{ old('mou_moa_bidang_kerjasama') == $kerjasama->id ? 'selected' : '' }}>
                                                                    {{ $kerjasama->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('mou_moa_bidang_kerjasama')
                                                                <span class="text-danger"
                                                                    id="mou_moa_bidang_kerjasama">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="users_id">Penanggung Jawab</label>
                                                        <select
                                                            class="form-select @error('users_id')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select Penanggung Jawab" name="users_id">
                                                            <option selected="">Pilih Penanggung Jawab</option>
                                                            @foreach ($data['user'] as $penanggungJawab)
                                                                <option value="{{ $penanggungJawab->id }}"
                                                                    {{ old('users_id') == $penanggungJawab->id ? 'selected' : '' }}>
                                                                    {{ $penanggungJawab->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('users_id')
                                                                <span class="text-danger"
                                                                    id="users_id">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tanggal_mulai">Tanggal
                                                            Mulai</label>
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
                                                        <label class="form-label" for="tanggal_akhir">Tanggal
                                                            Akhir</label>
                                                        <input
                                                            class="form-control @error('tanggal_akhir')
                                                            is-invalid
                                                        @enderror basic-date"
                                                            type="text" name="tanggal_akhir" placeholder="YYYY-MM-DD"
                                                            value="{{ old('tanggal_akhir') }}">
                                                        <div class="mt-1">
                                                            @error('tanggal_akhir')
                                                                <span class="text-danger"
                                                                    id="tanggal_akhir">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label"
                                                            for="mou_moa_klasifikasi">Klasifikasi</label>
                                                        <select
                                                            class="form-select @error('mou_moa_klasifikasi') is-invalid @enderror"
                                                            aria-label="Select klasifikasi" name="mou_moa_klasifikasi"
                                                            required>
                                                            <option selected="">Pilih klasifikasi</option>
                                                            @foreach ($data['klasifikasi'] as $klasifikasi)
                                                                <option value="{{ $klasifikasi->id }}"
                                                                    {{ old('mou_moa_klasifikasi') == $klasifikasi->id ? 'selected' : '' }}>
                                                                    {{ $klasifikasi->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('mou_moa_klasifikasi')
                                                                <span class="text-danger"
                                                                    id="mou_moa_klasifikasi">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="mou_moa_status">Status</label>
                                                        <select
                                                            class="form-select @error('mou_moa_status')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select Status" name="mou_moa_status" required>
                                                            <option selected="">Pilih Status</option>
                                                            @foreach ($data['status'] as $status)
                                                                <option value="{{ $status->id }}"
                                                                    {{ old('mou_moa_status') == $status->id ? 'selected' : '' }}>
                                                                    {{ $status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('mou_moa_status')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="keterangan_tambahan">Keterangan
                                                            Tambahan</label>
                                                        <textarea
                                                            class="form-control @error('keterangan_tambahan')
                                                            is-invalid
                                                        @enderror"
                                                            id="" cols="30" rows="10" name="keterangan_tambahan">{{ old('keterangan_tambahan') }}</textarea>
                                                        <div class="mt-1">
                                                            @error('keterangan_tambahan')
                                                                <span class="text-danger"
                                                                    id="keterangan_tambahan">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="dokumen_pendukung">Dokumen
                                                            Pendukung</label>
                                                        <input type="file"
                                                            class="form-control @error('dokumen_pendukung')
                                                            is-invalid
                                                        @enderror"
                                                            name="dokumen_pendukung">
                                                        @error('dokumen_pendukung')
                                                            <span class="text-danger"
                                                                id="dokumen_pendukung">{{ $message }}</span>
                                                        @enderror
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
                                        <th>Nomor Dokumen</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Nama Mitra</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['moumoa'] as $mouMoa)
                                        <tr>
                                            <td>{{ $mouMoa->nomor_dokumen }}</td>
                                            <td>{{ $mouMoa->mou_moa_jenis_dokumen_name }}</td>
                                            <td>{{ $mouMoa->penanggung_jawab_name }}</td>
                                            <td><span class="badge text-light-primary">{{ $mouMoa->nama_mitra }}</span>
                                            </td>
                                            <td>{{ $mouMoa->tanggal_mulai }}</td>
                                            <td>{{ $mouMoa->tanggal_akhir }}</td>

                                            @if ($mouMoa->mou_moa_status_name == 'Aktif')
                                                <td><span
                                                        class="badge text-light-success">{{ $mouMoa->mou_moa_status_name }}</span>
                                                </td>
                                            @elseif($mouMoa->mou_moa_status_name == 'Selesai')
                                                <td><span
                                                        class="badge text-light-warning">{{ $mouMoa->mou_moa_status_name }}</span>
                                                </td>
                                            @else
                                                <td><span
                                                        class="badge text-light-danger">{{ $mouMoa->mou_moa_status_name }}</span>
                                                </td>
                                            @endif
                                            <td>
                                                <button type="button" data-item="{{ $mouMoa->id }}"
                                                    data-bs-target="#detailMouMoa--{{ $mouMoa->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('admin.master.MouMoa.edit', $mouMoa->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('admin.master.MouMoa.destroy', $mouMoa->id) }}"
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
        @foreach ($data['moumoa'] as $mouMoaData)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static"
                id="detailMouMoa--{{ $mouMoaData->id }}" tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailMouMoa2">Detail Mou Moa</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nomor Dokumen:
                                {{ $mouMoaData->nomor_dokumen }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Jenis Dokumen:
                                {{ $mouMoaData->mou_moa_jenis_dokumen_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nama Mitra:
                                {{ $mouMoaData->nama_mitra }}
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Judul Kerjasama:
                                {{ $mouMoaData->judul_kerjasama }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Klasifikasi:
                                {{ $mouMoaData->mou_moa_klasifikasi_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Mulai:
                                {{ $mouMoaData->tanggal_mulai }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Akhir:
                                {{ $mouMoaData->tanggal_akhir }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status:
                                @if ($mouMoaData->mou_moa_status_name == 'Aktif')
                                    <td><span
                                            class="badge text-light-success">{{ $mouMoaData->mou_moa_status_name }}</span>
                                    </td>
                                @elseif($mouMoaData->mou_moa_status_name == 'Selesai')
                                    <td><span
                                            class="badge text-light-warning">{{ $mouMoaData->mou_moa_status_name }}</span>
                                    </td>
                                @else
                                    <td><span
                                            class="badge text-light-danger">{{ $mouMoaData->mou_moa_status_name }}</span>
                                    </td>
                                @endif
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Kerjasama:
                                {{ $mouMoaData->mou_moa_bidang_kerjasama_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Penanggung Jawab:
                                {{ $mouMoaData->users_id }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Keterangan Tambahan:
                                {{ $mouMoaData->keterangan_tambahan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Created At:
                                {{ $mouMoaData->created_at }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Updated At:
                                {{ $mouMoaData->updated_at }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Dokumen Pendukung:
                            </p>
                            <iframe src="{{ asset("/laraview/#../docsMouMoa/{$mouMoaData->dokumen_pendukung}") }}"
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
