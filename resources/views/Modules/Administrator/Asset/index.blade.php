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
                            <button aria-controls="collapseWidthExample" aria-expanded="false"
                                class="btn btn-light-primary b-r-22" data-bs-target="#collapseWidthExample"
                                data-bs-toggle="collapse" type="button"> <i class="ti ti-filter"></i>
                                Filter</button>
                            <button type="button" class="btn btn-primary b-r-22"> <i class="ti ti-text-plus"></i>
                                Tambah Aset</button>
                        </p>
                        <div>
                            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                                <div class="card card-body dashed-1-secondary w-900">
                                    <!-- Tooltips start -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form class="row g-3 app-form rounded-control">
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Kondisi Aset</label>
                                                        <select class="form-select" aria-label="Select kondisi aset">
                                                            <option selected="">Pilih kondisi aset</option>
                                                            <option value="1">Declined Payment</option>
                                                            <option value="2">Delivery Error</option>
                                                            <option value="3">Wrong Amount</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Status Aset</label>
                                                        <select class="form-select" aria-label="Select status aset">
                                                            <option selected="">Pilih status aset</option>
                                                            <option value="1">Declined Payment</option>
                                                            <option value="2">Delivery Error</option>
                                                            <option value="3">Wrong Amount</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="userName">Kategori aset</label>
                                                        <select class="form-select" aria-label="Select kategori aset">
                                                            <option selected="">Pilih kategori aset</option>
                                                            <option value="1">Declined Payment</option>
                                                            <option value="2">Delivery Error</option>
                                                            <option value="3">Wrong Amount</option>
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
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td><span class="badge text-light-primary">System Architect</span></td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>$3674.55</td>
                                        <td>$320,800</td>
                                        <td>
                                            <button type="button" class="btn btn-light-info icon-btn b-r-4">
                                                <i class="ti ti-info-circle text-success"></i>
                                            </button>
                                            <button type="button" class="btn btn-light-success icon-btn b-r-4">
                                                <i class="ti ti-edit text-success"></i>
                                            </button>
                                            <button type="button" class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Datatable end -->
        </div>
        <!-- Data Table end -->
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
@endsection
