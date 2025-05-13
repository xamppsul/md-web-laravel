@extends('layout.master')
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
                                                <form class="row g-3 app-form rounded-control">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Kondisi Aset</label>
                                                        <select class="form-select" aria-label="Select kondisi aset"
                                                            name="kondisi_aset">
                                                            <option selected="">Pilih Kondisi Aset</option>
                                                            <option value="1">Baik</option>
                                                            <option value="2">Rusak</option>
                                                            <option value="3">Perlu Perbaikan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Status Aset</label>
                                                        <select class="form-select" aria-label="Select status aset"
                                                            name="status_aset">
                                                            <option selected="">Pilih Status Aset</option>
                                                            <option value="1">Aktif</option>
                                                            <option value="2">Tidak Aktif</option>
                                                            <option value="3">Dihapus</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Kategori aset</label>
                                                        <select class="form-select" aria-label="Select kategori aset"
                                                            name="kategori_aset">
                                                            <option selected="">Pilih Kategori Aset</option>
                                                            <option value="1">Elektronik</option>
                                                            <option value="2">Kendaraan</option>
                                                            <option value="3">Furniture</option>
                                                            <option value="4">lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Tanggal perolehan(aset
                                                            diterima/dibeli)</label>
                                                        <input class="form-control basic-date" type="text"
                                                            placeholder="YYYY-MM-DD" name="">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Nama aset</label>
                                                        <input class="form-control" id="nama_aset"
                                                            placeholder="masukan nama aset" type="text">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Kode Aset</label>
                                                        <input class="form-control" id="kode_aset"
                                                            placeholder="masukan kode aset" type="text">
                                                    </div>
                                                    {{-- <div class="col-md-5">
                                                        <label class="form-label" for="address2">Address 2</label>
                                                        <input class="form-control" id="address2" placeholder="Address"
                                                            type="text">
                                                        <div class="mt-1">
                                                            <span class="text-danger" id="addressError2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="form-label" for="city">City</label>
                                                        <input class="form-control" id="city" type="text">
                                                        <div class="mt-1">
                                                            <span class="text-danger" id="cityError"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label" for="zipCode">Zip</label>
                                                        <input class="form-control" id="zipCode" type="text">
                                                        <div class="mt-1">
                                                            <span class="text-danger" id="zipCodeError"></span>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
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
                                                        <label class="form-label" for="kategori_aset">Kategori
                                                            Aset</label>
                                                        <select
                                                            class="form-select @error('kategori_aset')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select kategori aset" name="kategori_aset">
                                                            <option selected="">Pilih Kategori Aset</option>
                                                            @foreach ($data['kategori'] as $kategoriAset)
                                                                <option value="{{ $kategoriAset->id }}">
                                                                    {{ $kategoriAset->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('kategori_aset')
                                                                <span class="text-danger"
                                                                    id="kategori_aset">{{ $message }}</span>
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
                                                        <label class="form-label" for="kondisi_aset">Kondisi Aset</label>
                                                        <select
                                                            class="form-select @error('kondisi_aset') is-invalid @enderror"
                                                            aria-label="Select kondisi aset" name="kondisi_aset" required>
                                                            <option selected="">Pilih Kondisi Aset</option>
                                                            @foreach ($data['kondisi'] as $kondisiAset)
                                                                <option value="{{ $kondisiAset->id }}">
                                                                    {{ $kondisiAset->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('kondisi_aset')
                                                                <span class="text-danger"
                                                                    id="kondisi_aset">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="status_aset">Status Aset</label>
                                                        <select
                                                            class="form-select @error('status_aset')
                                                            is-invalid
                                                        @enderror"
                                                            aria-label="Select status aset" name="status_aset" required>
                                                            <option selected="">Pilih Status Aset</option>
                                                            @foreach ($data['status'] as $statusAset)
                                                                <option value="{{ $statusAset->id }}">
                                                                    {{ $statusAset->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="mt-1">
                                                            @error('status_aset')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="harga_perolehan_aset">Harga
                                                            Perolehan</label>
                                                        {{-- <input class="form-control" id="kode_aset"
                                                            placeholder="Masukan Harga Perolehan" type="number"> --}}
                                                        {{-- <input type="text"
                                                            class="form-control @error('harga_perolehan_aset')
                                                            is-invalid
                                                        @enderror price-input"
                                                            name="harga_perolehan_aset"> --}}
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
                                                    {{-- <div class="col-md-5">
                                                        <label class="form-label" for="address2">Address 2</label>
                                                        <input class="form-control" id="address2" placeholder="Address"
                                                            type="text">
                                                        <div class="mt-1">
                                                            <span class="text-danger" id="addressError2"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label class="form-label" for="city">City</label>
                                                        <input class="form-control" id="city" type="text">
                                                        <div class="mt-1">
                                                            <span class="text-danger" id="cityError"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label" for="zipCode">Zip</label>
                                                        <input class="form-control" id="zipCode" type="text">
                                                        <div class="mt-1">
                                                            <span class="text-danger" id="zipCodeError"></span>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-12">
                                                        <button class="btn btn-primary b-r-22" type="submit"
                                                            value="Submit">Submit
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
                                        <th>Kondisi Aset</th>
                                        <th>Status Aset</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['aset'] as $asetData)
                                        <tr>
                                            <td>{{ $asetData->kode_aset }}</td>
                                            <td>{{ $asetData->nama_aset }}</td>
                                            <td><span
                                                    class="badge text-light-primary">{{ $asetData->kategori_aset_name }}</span>
                                            </td>
                                            <td>{{ $asetData->merek_model }}</td>

                                            @if ($asetData->kondisi_aset_name == 'Baik')
                                                <td><span
                                                        class="badge text-light-success">{{ $asetData->kondisi_aset_name }}</span>
                                                </td>
                                            @elseif($asetData->kondisi_aset_name == 'Perlu Perbaikan')
                                                <td><span
                                                        class="badge text-light-warning">{{ $asetData->kondisi_aset_name }}</span>
                                                </td>
                                            @else
                                                <td><span
                                                        class="badge text-light-danger">{{ $asetData->kondisi_aset_name }}</span>
                                                </td>
                                            @endif
                                            <td><span
                                                    class="badge text-light-info">{{ $asetData->status_aset_name }}</span>
                                            </td>
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
                                                        class="btn btn-light-danger icon-btn b-r-4 btn-delete-aset">
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
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Nama Aset:
                                {{ $asetData->nama_aset }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Kategori Aset:
                                <td><span class="badge text-light-primary">{{ $asetData->kategori_aset_name }}</span>
                                </td>
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Merek/Model:
                                {{ $asetData->merek_model }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Tanggal Perolehan:
                                {{ $asetData->tanggal_perolehan }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Lokasi Aset:
                                {{ $asetData->lokasi_aset }} </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Kondisi Aset:
                                @if ($asetData->kondisi_aset_name == 'Baik')
                                    <td><span class="badge text-light-success">{{ $asetData->kondisi_aset_name }}</span>
                                    </td>
                                @elseif($asetData->kondisi_aset_name == 'Perlu Perbaikan')
                                    <td><span class="badge text-light-warning">{{ $asetData->kondisi_aset_name }}</span>
                                    </td>
                                @else
                                    <td><span class="badge text-light-danger">{{ $asetData->kondisi_aset_name }}</span>
                                    </td>
                                @endif
                            </p>
                            <p><i class="ti ti-arrow-big-right text-secondary f-w-600"></i> Status Aset:
                                <td><span class="badge text-light-info">{{ $asetData->status_aset_name }}</span>
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
@endsection
