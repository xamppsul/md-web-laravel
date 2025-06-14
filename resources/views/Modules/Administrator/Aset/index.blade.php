@extends('admin-layout.master')
@section('title', 'Master Asset')
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
                                <i class="ph-duotone  ph-table f-s-16"></i> Asset
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('admin.master.Asset.index') }}" class="f-s-14 f-w-500">Data</a>
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
                            <button type="button" class="btn btn-primary b-r-22" aria-controls="collapseTambahAset"
                                aria-expanded="false" data-bs-target="#collapseTambahAset" data-bs-toggle="collapse"
                                type="button"> <i class="ti ti-text-plus"></i>
                                Tambah Aset</button>
                        </p>
                        <div>
                            <!-- collapse filter -->
                            <div class="collapse collapse-horizontal" id="collapseFilter">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('admin.master.Asset.index') }}" method="GET"
                                                    class="row g-3 app-form rounded-control" id="filterFormMasterAset">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="kondisi_aset">Kondisi Aset</label>
                                                        <select class="form-select" aria-label="Select Kondisi Aset"
                                                            name="kondisi_aset" required>
                                                            <option selected="">Pilih Kondisi Aset</option>
                                                            @foreach ($data['aset_kondisi'] as $kondisi_aset)
                                                                <option value="{{ $kondisi_aset->id }}"
                                                                    {{ request('kondisi_aset') == $kondisi_aset->id ? 'selected' : '' }}>
                                                                    {{ $kondisi_aset->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="status_aset">Status Aset</label>
                                                        <select class="form-select" aria-label="Select Klasifikasi"
                                                            name="status_aset" required>
                                                            <option selected="">Pilih Status Aset</option>
                                                            @foreach ($data['aset_status'] as $status_aset)
                                                                <option value="{{ $status_aset->id }}"
                                                                    {{ request('status_aset') == $status_aset->id ? 'selected' : '' }}>
                                                                    {{ $status_aset->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="kategori_aset">Kategori aset</label>
                                                        <select class="form-select" aria-label="Select Klasifikasi"
                                                            name="kategori_aset" required>
                                                            <option selected="">Pilih Kategori Aset</option>
                                                            @foreach ($data['aset_kategori'] as $kategori_aset)
                                                                <option value="{{ $kategori_aset->id }}"
                                                                    {{ request('kategori_aset') == $kategori_aset->id ? 'selected' : '' }}>
                                                                    {{ $kategori_aset->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-md-6">
                                                        <label class="form-label" for="userName">Tanggal perolehan(aset
                                                            diterima/dibeli)</label>
                                                        <input class="form-control basic-date" type="text"
                                                            placeholder="YYYY-MM-DD" name="tanggal_perolehan"
                                                            value="{{ request('tanggal_perolehan') }}">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Nama Aset</label>
                                                        <input class="form-control" id="nama_aset"
                                                            placeholder="Masukan Nama Aset" type="text"
                                                            name="nama_aset" value="{{ request('nama_aset') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Kode Aset</label>
                                                        <input class="form-control" id="kode_aset"
                                                            placeholder="Masukan Kode Aset" type="text"
                                                            name="kode_aset" value="{{ request('kode_aset') }}">
                                                    </div> --}}
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
                                                        </button>
                                                        <button class="btn btn-warning b-r-22"
                                                            onclick="clearfilterFormMasterAset()" value="Clear">Clear
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- collapse tambah aset -->
                            <div class="collapse collapse-horizontal" id="collapseTambahAset">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control"
                                                    action="{{ route('admin.master.Asset.store') }}" method="POST">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="users_id">Fakultas</label>
                                                        <select class="form-select @error('users_id') is-invalid @enderror"
                                                            aria-label="Select Fakultas" name="users_id" required>
                                                            <option selected="">Pilih Fakultas</option>
                                                            @foreach ($data['user_faculty'] as $users_id)
                                                                <option value="{{ $users_id->id }}"
                                                                    {{ old('users_id') == $users_id->id ? 'selected' : '' }}>
                                                                    {{ $users_id->name }}</option>
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
                                                        <label class="form-label" for="kode_aset">Kode Aset</label>
                                                        <input
                                                            class="form-control @error('kode_aset') is-invalid @enderror"
                                                            id="kode_aset" name="kode_aset"
                                                            placeholder="Masukan Kode Aset" type="text"
                                                            value="{{ old('kode_aset') }}">
                                                        <div class="mt-1">
                                                            @error('kode_aset')
                                                                <span class="text-danger"
                                                                    id="kode_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="nama_aset">Nama Aset</label>
                                                        <input
                                                            class="form-control @error('nama_aset')
                                                            is-invalid
                                                        @enderror"
                                                            id="nama_aset" placeholder="Masukan Nama Aset" type="text"
                                                            value="{{ old('nama_aset') }}" name="nama_aset">
                                                        <div class="mt-1">
                                                            @error('nama_aset')
                                                                <span class="text-danger"
                                                                    id="nama_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="aset_kategori">Kategori
                                                            Aset</label>
                                                        <select
                                                            class="form-select @error('aset_kategori')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select kategori aset" name="aset_kategori">
                                                            <option selected="">Pilih Kategori Aset</option>
                                                            @foreach ($data['aset_kategori'] as $kategoriAset)
                                                                <option value="{{ $kategoriAset->id }}"
                                                                    {{ old('aset_kategori') == $kategoriAset->id ? 'selected' : '' }}>
                                                                    {{ $kategoriAset->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('aset_kategori')
                                                                <span class="text-danger"
                                                                    id="aset_kategori">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="model_merk_aset">Model/Merk</label>
                                                        <input
                                                            class="form-control @error('model_merk_aset')
                                                            is-invalid
                                                        @enderror"
                                                            id="kode_aset" name="model_merk_aset"
                                                            placeholder="Masukan Model/Merk Aset" type="text"
                                                            value="{{ old('model_merk_aset') }}">
                                                        <div class="mt-1">
                                                            @error('model_merk_aset')
                                                                <span class="text-danger"
                                                                    id="model_merk_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="tahun_aset">Tahun
                                                            Aset</label>
                                                        <select class="form-select @error('tahun') is-invalid @enderror"
                                                            aria-label="Select tahun aset" name="tahun" required>
                                                            <option selected="">Pilih Tahun Aset</option>
                                                            @for ($i = date('Y'); $i >= 1990; $i--)
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
                                                        <label class="form-label" for="tanggal_perolehan_aset">Tanggal
                                                            Perolehan(Aset
                                                            diterima/dibeli)</label>
                                                        <input
                                                            class="form-control @error('tanggal_perolehan_aset')
                                                            is-invalid
                                                        @enderror basic-date"
                                                            type="text" name="tanggal_perolehan_aset"
                                                            placeholder="YYYY-MM-DD"
                                                            value="{{ old('tanggal_perolehan_aset') }}">
                                                        <div class="mt-1">
                                                            @error('tanggal_perolehan_aset')
                                                                <span class="text-danger"
                                                                    id="tanggal_perolehan_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="lokasi_aset">Lokasi Aset</label>
                                                        <input
                                                            class="form-control @error('lokasi_aset')
                                                            is-invalid
                                                        @enderror"
                                                            id="kode_aset" name="lokasi_aset"
                                                            placeholder="Masukan Lokasi Aset" type="text"
                                                            value="{{ old('lokasi_aset') }}">
                                                        <div class="mt-1">
                                                            @error('lokasi_aset')
                                                                <span class="text-danger"
                                                                    id="tanggal_perolehan_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="aset_kondisi">Kondisi Aset</label>
                                                        <select
                                                            class="form-select @error('aset_kondisi') is-invalid @enderror"
                                                            aria-label="Select kondisi aset" name="aset_kondisi" required>
                                                            <option selected="">Pilih Kondisi Aset</option>
                                                            @foreach ($data['aset_kondisi'] as $kondisiAset)
                                                                <option value="{{ $kondisiAset->id }}"
                                                                    {{ old('aset_kondisi') == $kondisiAset->id ? 'selected' : '' }}>
                                                                    {{ $kondisiAset->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('aset_kondisi')
                                                                <span class="text-danger"
                                                                    id="aset_kondisi">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="aset_status">Status Aset</label>
                                                        <select
                                                            class="form-select @error('aset_status')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select status aset" name="aset_status" required>
                                                            <option selected="">Pilih Status Aset</option>
                                                            @foreach ($data['aset_status'] as $statusAset)
                                                                <option value="{{ $statusAset->id }}"
                                                                    {{ old('aset_status') == $statusAset->id ? 'selected' : '' }}>
                                                                    {{ $statusAset->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('aset_status')
                                                                <span class="text-danger"
                                                                    id="aset_status">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="harga_perolehan_aset">Harga
                                                            Perolehan</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-secondary-200 b-r-left"
                                                                id="basic-addon1">Rp</span>
                                                            <input type="number" name="harga_perolehan_aset"
                                                                class="form-control @error('harga_perolehan_aset')
                                                                is-invalid
                                                            @enderror"
                                                                placeholder="Masukan Harga Perolehan"
                                                                value="{{ old('harga_perolehan_aset') }}">
                                                        </div>
                                                        <div class="mt-1">
                                                            @error('harga_perolehan_aset')
                                                                <span class="text-danger"
                                                                    id="tanggal_perolehan_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="sumber_dana_aset">Sumber
                                                            Dana</label>
                                                        <input
                                                            class="form-control @error('sumber_dana_aset')
                                                            is-invalid
                                                        @enderror"
                                                            id="kode_aset" name="sumber_dana_aset"
                                                            placeholder="Masukan Sumber Dana" type="text"
                                                            value="{{ old('sumber_dana_aset') }}">
                                                        <div class="mt-1">
                                                            @error('sumber_dana_aset')
                                                                <span class="text-danger"
                                                                    id="tanggal_perolehan_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="keterangan_aset">Keterangan</label>
                                                        <textarea
                                                            class="form-control @error('keterangan_aset')
                                                            is-invalid
                                                        @enderror"
                                                            id="" cols="30" rows="10" name="keterangan_aset">{{ old('keterangan_aset') }}</textarea>
                                                        <div class="mt-1">
                                                            @error('keterangan_aset')
                                                                <span class="text-danger"
                                                                    id="tanggal_perolehan_aset">{{ $message }}</span>
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
                                        <th>Kode Aset</th>
                                        <th>Nama Aset</th>
                                        <th>Kategori Aset</th>
                                        <th>Merk</th>
                                        <th>Tahun</th>
                                        <th>Fakultas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['aset'] as $asetData)
                                        <tr>
                                            <td>{{ $asetData->kode_aset }}</td>
                                            <td>{{ $asetData->nama_aset }}</td>
                                            <td><span
                                                    class="badge text-light-primary">{{ $asetData->aset_kategori_name }}</span>
                                            </td>
                                            <td>{{ $asetData->merek_model }}</td>
                                            <td>{{ $asetData->tahun }}</td>
                                            <td>{{ $asetData->faculty_name }}</td>

                                            {{-- @if ($asetData->aset_kondisi_name == 'Baik')
                                                <td><span
                                                        class="badge text-light-success">{{ $asetData->aset_kondisi_name }}</span>
                                                </td>
                                            @elseif($asetData->aset_kondisi_name == 'Perlu Perbaikan')
                                                <td><span
                                                        class="badge text-light-warning">{{ $asetData->aset_kondisi_name }}</span>
                                                </td>
                                            @else
                                                <td><span
                                                        class="badge text-light-danger">{{ $asetData->aset_kondisi_name }}</span>
                                                </td>
                                            @endif
                                            <td><span
                                                    class="badge text-light-info">{{ $asetData->aset_status_name }}</span>
                                            </td> --}}
                                            <td>
                                                <button type="button" data-item="{{ $asetData->id }}"
                                                    data-bs-target="#detailAset--{{ $asetData->id }}"
                                                    data-bs-toggle="modal" class="btn btn-light-info icon-btn b-r-4">
                                                    <i class="ti ti-info-circle text-success"></i>
                                                </button>
                                                <a href="{{ route('admin.master.Asset.edit', $asetData->id) }}"
                                                    class="btn btn-light-success icon-btn b-r-4">
                                                    <i class="ti ti-edit text-success"></i>
                                                </a>
                                                <form class="btn btn-light-danger icon-btn b-r-4"
                                                    action="{{ route('admin.master.Asset.destroy', $asetData->id) }}"
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
        @foreach ($data['aset'] as $asetData)
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static" id="detailAset--{{ $asetData->id }}"
                tabindex="-1">
                <div class="modal-dialog app_modal_sm">
                    <div class="modal-content">
                        <div class="modal-header bg-primary-800">
                            <h1 class="modal-title fs-5 text-white" id="detailAset2">Detail Aset</h1>
                        </div>
                        <div class="modal-body">
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Kode Aset:
                                {{ $asetData->kode_aset }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Fakultas:
                                {{ $asetData->faculty_name }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tahun Aset:
                                {{ $asetData->tahun }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nama Aset:
                                {{ $asetData->nama_aset }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Kategori Aset:
                                <td><span class="badge text-light-primary">{{ $asetData->aset_kategori_name }}</span>
                                </td>
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Merek/Model:
                                {{ $asetData->merek_model }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Perolehan:
                                {{ $asetData->tanggal_perolehan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Lokasi Aset:
                                {{ $asetData->lokasi_aset }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Kondisi Aset:
                                @if ($asetData->aset_kondisi_name == 'Baik')
                                    <td><span class="badge text-light-success">{{ $asetData->aset_kondisi_name }}</span>
                                    </td>
                                @elseif($asetData->aset_kondisi_name == 'Perlu Perbaikan')
                                    <td><span class="badge text-light-warning">{{ $asetData->aset_kondisi_name }}</span>
                                    </td>
                                @else
                                    <td><span class="badge text-light-danger">{{ $asetData->aset_kondisi_name }}</span>
                                    </td>
                                @endif
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Aset:
                                <td><span class="badge text-light-info">{{ $asetData->aset_status_name }}</span>
                                </td>
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Harga Perolehan:
                                {{ $constantAdmin->formatRupiah($asetData->harga_perolehan) }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Sumber Dana:
                                {{ $asetData->sumber_dana }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Keterangan:
                                {{ $asetData->keterangan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Created At:
                                {{ $asetData->created_at }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Updated At:
                                {{ $asetData->updated_at }} </p>
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
        function clearfilterFormMasterAset() {
            const form = document.getElementById('filterFormMasterAset');
            Array.from(form.elements).forEach(element => {
                if (element.type !== 'button' && element.type !== 'submit' && element.type !== 'reset') {
                    element.value = '';
                }
            });
        }
    </script>
@endsection
