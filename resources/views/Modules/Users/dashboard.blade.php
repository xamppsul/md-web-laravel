@extends('layout.master')
@section('title', 'User Dashboard | MD Project')
@section('css')
    <!-- glight css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/glightbox.min.css') }}">

    <!-- apexcharts css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/apexcharts/apexcharts.css') }}">

    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick-theme.css') }}">

    <!-- filepond css -->
    <link href="{{ asset('assets/vendor/filepond/filepond.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/filepond/image-preview.min.css') }}" rel="stylesheet">

    <!-- Select2 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select/select2.min.css') }}">

    <!--font-awesome-css-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome/css/all.css') }}">

    <!-- Data Table css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datatable/jquery.dataTables.min.css') }}">

@endsection
@section('main-content')
    <div class="container-fluid mt-3">
        @session('success')
            <div class="flash-data-success" data-flashdata-success="{{ $value }}"></div>
        @endsession
        @session('error')
            <div class="flash-data-error" data-flashdata-error="{{ $value }}"></div>
        @endsession
        <div class="row">
            @if (Auth::guard('user')->check())
                @if (Auth::guard('user')->user()->roles_id != 2)
                    <div class="col-lg-6 col-xxl-4">
                        <div class="row">

                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Aset</p>
                                            <h2 class="text-success-dark mb-0">-6,876</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Kerjasama</p>
                                            <h2 class="text-success-dark mb-0">-6,876</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card project-connect-card">
                                    <div class="card-body pb-0">
                                        <div class="text-center">
                                            <h5 class=" mb-2 f-s-24">Total <span class="text-primary f-w-700">Kegiatan Dalam
                                                    Tahun.</span>
                                            </h5>
                                            <p class="f-s-14 text-dark pb-0 txt-ellipsis-2">
                                                grafik total kegiatan dalam tahun.
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <div class="card ">
                                                <div class="card-body">
                                                    <div class="project-expense" id="projectExpense"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-7 col-xxl-6 order-1-md">
                        <div class="p-3">
                            <h5>List Mou Berakhir Berdasarkan Tahun</h5>
                        </div>
                        <div class="card mb-0">
                            <div class="card-body py-2 px-0 overflow-hidden">
                                <div class="table-responsive app-scroll ">
                                    <table class="table align-middle project-status-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Project</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">TeamLead</th>
                                                <th scope="col">priority</th>
                                                <th scope="col">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-success-dark text-nowrap">Web Redesign</h6>
                                                </td>
                                                <td><span class="badge text-light-warning f-s-9 f-w-700">In Progress</span>
                                                </td>
                                                <td class="f-w-600 text-dark">
                                                    <a class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-secondary m-auto "
                                                        data-bs-title="Athena Stewart" data-bs-toggle="tooltip">
                                                        <img alt="avtar" class="img-fluid"
                                                            src="{{ asset('../assets/images/avtar/2.png') }}">
                                                    </a>


                                                </td>
                                                <td class="text-success-dark f-w-600">
                                                    High
                                                </td>
                                                <td>
                                                    <span class="text-dark f-s-14 f-w-500 text-nowrap"><i
                                                            class="ti ti-circle-filled me-2 f-s-6"></i> Design phase
                                                        completed</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-warning-dark text-nowrap">Mobile App</h6>
                                                </td>
                                                <td>
                                                    <span class="badge text-light-success f-s-9 f-w-700">Completed</span>
                                                </td>
                                                <td class="f-w-600 text-dark">
                                                    <a class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-secondary m-auto"
                                                        data-bs-title="Jane Smith" data-bs-toggle="tooltip">
                                                        <img alt="avtar" class="img-fluid"
                                                            src="{{ asset('../assets/images/avtar/3.png') }}">
                                                    </a>
                                                </td>
                                                <td class="text-secondary-dark f-w-600">
                                                    Medium
                                                </td>
                                                <td>
                                                    <span class="text-dark f-s-14 f-w-500 text-nowrap"><i
                                                            class="ti ti-circle-filled me-2 f-s-6"></i> Project deployed
                                                        successfully</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-danger-dark text-nowrap">
                                                        Campaign</h6>
                                                </td>
                                                <td>
                                                    <span class="badge text-light-secondary f-s-9 f-w-700">Not
                                                        Started</span>
                                                </td>
                                                <td class="f-w-600 text-dark">
                                                    <a class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-secondary m-auto"
                                                        data-bs-title="Mark Lee" data-bs-toggle="tooltip">
                                                        <img alt="avtar" class="img-fluid"
                                                            src="{{ asset('../assets/images/avtar/4.png') }}">
                                                    </a>
                                                </td>
                                                <td class="text-danger-dark f-w-600">
                                                    Low
                                                </td>
                                                <td>
                                                    <span class="text-dark f-s-14 f-w-500 text-nowrap"><i
                                                            class="ti ti-circle-filled me-2 f-s-6"></i> Campaign to begin in
                                                        December</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-primary-dark text-nowrap">E-Commerce</h6>
                                                </td>
                                                <td>
                                                    <span class="badge text-light-warning f-s-9 f-w-700">In Progress</span>
                                                </td>
                                                <td class="f-w-600 text-dark">
                                                    <a class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-secondary m-auto"
                                                        data-bs-title="Alice Johnson" data-bs-toggle="tooltip">
                                                        <img alt="avtar" class="img-fluid"
                                                            src="{{ asset('../assets/images/avtar/5.png') }}">
                                                    </a>
                                                </td>
                                                <td class="text-success-dark f-w-600">
                                                    High
                                                </td>
                                                <td>
                                                    <span class="text-dark f-s-14 f-w-500 text-nowrap"><i
                                                            class="ti ti-circle-filled me-2 f-s-6"></i> Initial setup
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-success-dark text-nowrap">Social Media </h6>
                                                </td>
                                                <td>
                                                    <span class="badge text-light-success f-s-9 f-w-700">Completed</span>
                                                </td>
                                                <td class="f-w-600 text-dark">
                                                    <a class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-secondary m-auto"
                                                        data-bs-title="Sophia Green" data-bs-toggle="tooltip">
                                                        <img alt="avtar" class="img-fluid"
                                                            src="{{ asset('../assets/images/avtar/4.png') }}">
                                                    </a>
                                                </td>
                                                <td class="text-danger-dark f-w-600">
                                                    Low
                                                </td>
                                                <td>
                                                    <span class="text-dark f-s-14 f-w-500 text-nowrap">
                                                        <i class="ti ti-circle-filled me-2 f-s-6"></i> Campaign launched
                                                        successfully
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-success-dark text-nowrap">SEO Optimization</h6>
                                                </td>
                                                <td>
                                                    <span class="badge text-light-warning f-s-9 f-w-700">In Progress</span>
                                                </td>
                                                <td class="f-w-600 text-dark">
                                                    <a class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-secondary m-auto"
                                                        data-bs-title="Liam Carter" data-bs-toggle="tooltip">
                                                        <img alt="avtar" class="img-fluid"
                                                            src="{{ asset('../assets/images/avtar/5.png') }}">
                                                    </a>
                                                </td>
                                                <td class="text-success-dark f-w-600">
                                                    Medium
                                                </td>
                                                <td>
                                                    <span class="text-dark f-s-14 f-w-500 text-nowrap">
                                                        <i class="ti ti-circle-filled me-2 f-s-6"></i> Keyword analysis
                                                        ongoing
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-success-dark text-nowrap">UI/UX Revamp</h6>
                                                </td>
                                                <td>
                                                    <span class="badge text-light-info f-s-9 f-w-700">Scheduled</span>
                                                </td>
                                                <td class="f-w-600 text-dark">
                                                    <a class="h-30 w-30 d-flex-center b-r-50 overflow-hidden text-bg-secondary m-auto"
                                                        data-bs-title="Olivia Brown" data-bs-toggle="tooltip">
                                                        <img alt="avtar" class="img-fluid"
                                                            src="{{ asset('../assets/images/avtar/6.png') }}">
                                                    </a>
                                                </td>
                                                <td class="text-danger-dark f-w-600">
                                                    Low
                                                </td>
                                                <td>
                                                    <span class="text-dark f-s-14 f-w-500 text-nowrap">
                                                        <i class="ti ti-circle-filled me-2 f-s-6"></i> Resources allocated
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="table-footer ">
                            <p class="mb-0 f-s-15 f-w-500 txt-ellipsis-1">Showing 7 to 20 of 20 entries</p>
                            <ul class="pagination app-pagination justify-content-end ">
                                <li class="page-item disabled"><a class="page-link b-r-left" href="#">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                @else
                    <!-- default staff or dosen -->
                    <div class="col-lg-6 col-xxl-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Bahan Ajar
                                            </p>
                                            <h2 class="text-success-dark mb-0">-6,876</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xxl-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Penelitian</p>
                                            <h2 class="text-success-dark mb-0">-6,876</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xxl-4 ">
                        <div class="row">
                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Pengabdian</p>
                                            <h2 class="text-success-dark mb-0">-6,876</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- setting-app start -->
                    <div class="row">
                        <div class="col-lg-4 col-xxl-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Settings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="vertical-tab setting-tab">
                                        <ul class="nav nav-tabs app-tabs-primary " id="v-bg" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                                    aria-controls="profile-tab-pane" aria-selected="true"> <i
                                                        class="ph-bold  ph-user-circle-gear pe-2"></i>
                                                    Profile</button>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="list-publikasi-tab" data-bs-toggle="tab"
                                                    data-bs-target="#list-publikasi-tab-pane" type="button"
                                                    role="tab" aria-controls="list-publikasi-tab-pane"
                                                    aria-selected="true"> <i class="ph-bold  ph-alarm pe-2"></i>
                                                    List Publikasi</button>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="riwayat-jabatan-tab" data-bs-toggle="tab"
                                                    data-bs-target="#riwayat-jabatan-tab-pane" type="button"
                                                    role="tab" aria-controls="riwayat-jabatan-tab-pane"
                                                    aria-selected="false"><i
                                                        class="ph-bold  ph-shield-check pe-2"></i>Riwayat Jabatan</button>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="ubah-password-tab" data-bs-toggle="tab"
                                                    data-bs-target="#ubah-password-tab-pane" type="button"
                                                    role="tab" aria-controls="ubah-password-tab-pane"
                                                    aria-selected="false"><i class="ph-bold  ph-lock-open pe-2"></i>Ubah
                                                    Password</button>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="list-bahan-ajar-tab" data-bs-toggle="tab"
                                                    data-bs-target="#list-bahan-ajar-tab-pane" type="button"
                                                    role="tab" aria-controls="list-bahan-ajar-tab-pane"
                                                    aria-selected="false"><i
                                                        class="ph-bold  ph-notification pe-2"></i>List Bahan Ajar</button>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 col-xxl-9">
                            <div class="tab-content">
                                <div aria-labelledby="profile-tab" class="tab-pane fade active show"
                                    id="profile-tab-pane" role="tabpanel" tabindex="0">
                                    <div class="card setting-profile-tab">
                                        <div class="card-header">
                                            <h5 class="text-primary f-w-600">Profile</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="profile-tab profile-container">
                                                <div class="image-details">
                                                    <div class="profile-image"></div>
                                                    <div class="profile-pic">
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input accept=".png, .jpg, .jpeg" id="imageUpload"
                                                                    type="file">
                                                                <label for="imageUpload"><i
                                                                        class="ti ti-photo-heart"></i></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imgPreview">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="person-details">
                                                    <h5 class="f-w-600">Ninfa Monaldo
                                                        <img alt="instagram-check-mark" height="20"
                                                            src="../assets/images/profile-app/01.png" width="20">
                                                    </h5>
                                                    <p>Web designer &amp; Developer</p>
                                                </div>

                                                <form class="app-form">
                                                    <h5 class="mb-2 text-dark f-w-600">User Info</h5>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Username</label>
                                                                <input class="form-control" placeholder="Maria C. Eck"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email address</label>
                                                                <input class="form-control"
                                                                    placeholder="MariaCEck@teleworm.us" type="email">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Password</label>
                                                                <input class="form-control" placeholder="*******"
                                                                    type="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Confirm Password</label>
                                                                <input class="form-control" placeholder="*******"
                                                                    type="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="app-divider-v dotted"></div>
                                                        </div>
                                                        <h5 class="mb-2 text-dark f-w-600">Personal Info</h5>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address</label>
                                                                <textarea class="form-control" placeholder="1098 Asylum Avenu New Haven, CT 06510"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Address 2</label>
                                                                <textarea class="form-control" placeholder="51244 Ankunding Villages, Reicheltown, IL 84366"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="inputCity">City</label>
                                                                <input class="form-control" id="inputCity"
                                                                    placeholder="oregon" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="inputState">State</label>
                                                                <select class="form-select" id="inputState">
                                                                    <option selected>Choose...</option>
                                                                    <option>USA</option>
                                                                    <option>Canada</option>
                                                                    <option>Australia</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="inputZip">Zip</label>
                                                                <input class="form-control" id="inputZip"
                                                                    placeholder="CT 06510" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xl-4">
                                                            <div class="">
                                                                <label class="form-label">language</label>
                                                                <select class="select-langauge form-select select-basic"
                                                                    name="state">
                                                                    <option value="EN">English</option>
                                                                    <option value="GU">Gujarati</option>
                                                                    <option value="HI">Hindi</option>
                                                                    <option value="DU">Dutch</option>
                                                                    <option value="FR">French</option>
                                                                    <option value="RU">Russian</option>
                                                                    <option value="KO">Korean</option>
                                                                    <option value="TA">Tamil</option>
                                                                    <option value="SP">Spanish</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="text-end">
                                                                <button class="btn btn-primary" type="submit">Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div aria-labelledby="list-publikasi-tab" class="tab-pane fade"
                                    id="list-publikasi-tab-pane" role="tabpanel" tabindex="0">
                                    <div class="card equal-card month-timeline">
                                        <!-- Default Datatable start -->
                                        <div class="col-12">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h5 class="text-primary f-w-600">List Publikasi</h5>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="app-datatable-default overflow-auto">
                                                        <table id="example1"
                                                            class="display app-data-table default-data-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Position</th>
                                                                    <th>Office</th>
                                                                    <th>Age</th>
                                                                    <th>Start date</th>
                                                                    <th>Salary</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Tiger Nixon</td>
                                                                    <td><span class="badge text-light-primary">System
                                                                            Architect</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>61</td>
                                                                    <td>$3674.55</td>
                                                                    <td>$320,800</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Garrett Winters</td>
                                                                    <td><span
                                                                            class="badge text-light-success">Accountant</span>
                                                                    </td>
                                                                    <td>Tokyo</td>
                                                                    <td>63</td>
                                                                    <td>2011-07-25</td>
                                                                    <td>$170,750</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ashton Cox</td>
                                                                    <td><span class="badge text-light-secondary">Junior
                                                                            Technical Author</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>66</td>
                                                                    <td>2009-01-12</td>
                                                                    <td>$86,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Cedric Kelly</td>
                                                                    <td><span class="badge text-light-info">Senior
                                                                            Javascript Developer</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>22</td>
                                                                    <td>2012-03-29</td>
                                                                    <td>$433,060</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Airi Satou</td>
                                                                    <td><span
                                                                            class="badge text-light-success">Accountant</span>
                                                                    </td>
                                                                    <td>Tokyo</td>
                                                                    <td>33</td>
                                                                    <td>2008-11-28</td>
                                                                    <td>$162,700</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Brielle Williamson</td>
                                                                    <td><span class="badge text-light-danger"> Integration
                                                                            Specialist</span></td>
                                                                    <td>New York</td>
                                                                    <td>61</td>
                                                                    <td>2012-12-02</td>
                                                                    <td>$372,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Herrod Chandler</td>
                                                                    <td><span class="badge text-light-dark">Sales
                                                                            Assistant</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>59</td>
                                                                    <td>2012-08-06</td>
                                                                    <td>$137,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Rhona Davidson</td>
                                                                    <td><span class="badge text-light-light">Integration
                                                                            Specialist</span></td>
                                                                    <td>Tokyo</td>
                                                                    <td>55</td>
                                                                    <td>2010-10-14</td>
                                                                    <td>$327,900</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Colleen Hurst</td>
                                                                    <td><span class="badge text-light-primary">Javascript
                                                                            Developer</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>39</td>
                                                                    <td>2009-09-15</td>
                                                                    <td>$205,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sonya Frost</td>
                                                                    <td><span class="badge text-light-info">Software
                                                                            Engineer</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>23</td>
                                                                    <td>2008-12-13</td>
                                                                    <td>$103,600</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jena Gaines</td>
                                                                    <td><span class="badge text-light-danger">Office
                                                                            Manager</span></td>
                                                                    <td>London</td>
                                                                    <td>30</td>
                                                                    <td>2008-12-19</td>
                                                                    <td>$90,560</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Quinn Flynn</td>
                                                                    <td><span class="badge text-light-secondary">Support
                                                                            Lead</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>22</td>
                                                                    <td>2013-03-03</td>
                                                                    <td>$342,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Charde Marshall</td>
                                                                    <td><span class="badge text-light-info">Regional
                                                                            Director</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>36</td>
                                                                    <td>2008-10-16</td>
                                                                    <td>$470,600</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Haley Kennedy</td>
                                                                    <td><span class="badge text-light-primary">Senior
                                                                            Marketing Designer</span></td>
                                                                    <td>London</td>
                                                                    <td>43</td>
                                                                    <td>2012-12-18</td>
                                                                    <td>$313,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tatyana Fitzpatrick</td>
                                                                    <td><span class="badge text-light-info">Regional
                                                                            Director</span></td>
                                                                    <td>London</td>
                                                                    <td>19</td>
                                                                    <td>2010-03-17</td>
                                                                    <td>$385,750</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Michael Silva</td>
                                                                    <td><span class="badge text-light-warning">Marketing
                                                                            Designer</span></td>
                                                                    <td>London</td>
                                                                    <td>66</td>
                                                                    <td>2012-11-27</td>
                                                                    <td>$198,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Paul Byrd</td>
                                                                    <td><span class="badge text-light-secondary">Chief
                                                                            Financial Officer (CFO)</span>
                                                                    </td>
                                                                    <td>New York</td>
                                                                    <td>64</td>
                                                                    <td>2010-06-09</td>
                                                                    <td>$725,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gloria Little</td>
                                                                    <td><span class="badge text-light-success">Systems
                                                                            Administrator</span></td>
                                                                    <td>New York</td>
                                                                    <td>59</td>
                                                                    <td>2009-04-10</td>
                                                                    <td>$237,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bradley Greer</td>
                                                                    <td><span class="badge text-light-info">Software
                                                                            Engineer</span></td>
                                                                    <td>London</td>
                                                                    <td>41</td>
                                                                    <td>2012-10-13</td>
                                                                    <td>$132,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dai Rios</td>
                                                                    <td><span class="badge text-light-danger">Personnel
                                                                            Lead</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>35</td>
                                                                    <td>2012-09-26</td>
                                                                    <td>$217,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jenette Caldwell</td>
                                                                    <td><span class="badge text-light-dark">Personnel
                                                                            Lead</span></td>
                                                                    <td>New York</td>
                                                                    <td>30</td>
                                                                    <td>2011-09-03</td>
                                                                    <td>$345,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Yuri Berry</td>
                                                                    <td><span class="badge text-light-info">Development
                                                                            Lead</span></td>
                                                                    <td>New York</td>
                                                                    <td>40</td>
                                                                    <td>2009-06-25</td>
                                                                    <td>$675,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Caesar Vance</td>
                                                                    <td><span class="badge text-light-warning">Pre-Sales
                                                                            Support</span></td>
                                                                    <td>New York</td>
                                                                    <td>21</td>
                                                                    <td>2011-12-12</td>
                                                                    <td>$106,450</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Doris Wilder</td>
                                                                    <td><span class="badge text-light-dark">Sales
                                                                            Assistant</span></td>
                                                                    <td>Sydney</td>
                                                                    <td>23</td>
                                                                    <td>2010-09-20</td>
                                                                    <td>$85,600</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Angelica Ramos</td>
                                                                    <td><span class="badge text-light-secondary">Chief
                                                                            Executive Officer (CEO)</span>
                                                                    </td>
                                                                    <td>London</td>
                                                                    <td>47</td>
                                                                    <td>2009-10-09</td>
                                                                    <td>$1,200,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gavin Joyce</td>
                                                                    <td><span
                                                                            class="badge text-light-light">Developer</span>
                                                                    </td>
                                                                    <td>Edinburgh</td>
                                                                    <td>42</td>
                                                                    <td>2010-12-22</td>
                                                                    <td>$92,575</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jennifer Chang</td>
                                                                    <td><span class="badge text-light-info">Regional
                                                                            Director</span></td>
                                                                    <td>Singapore</td>
                                                                    <td>28</td>
                                                                    <td>2010-11-14</td>
                                                                    <td>$357,650</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Brenden Wagner</td>
                                                                    <td><span class="badge text-light-info">Software
                                                                            Engineer</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>28</td>
                                                                    <td>2011-06-07</td>
                                                                    <td>$206,850</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
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
                                    </div>
                                </div>

                                <div aria-labelledby="riwayat-jabatan-tab" class="tab-pane fade"
                                    id="riwayat-jabatan-tab-pane" role="tabpanel" tabindex="0">
                                    <div class="card equal-card month-timeline">
                                        <div class="card-header">
                                            <div class="activity-time">
                                                <h5 class="text-primary f-w-600">Riwayat Jabatan</h5>
                                                <div class="list-publikasi-tab-section">
                                                    <ul class="nav nav-tabs tab-light-primary" id="Outline"
                                                        role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button aria-controls="today-tab-pane" aria-selected="true"
                                                                class="nav-link active" data-bs-target="#today-tab-pane"
                                                                data-bs-toggle="tab" id="today-tab" role="tab"
                                                                type="button">Today
                                                            </button>

                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button aria-controls="week-tab-pane" aria-selected="false"
                                                                class="nav-link" data-bs-target="#week-tab-pane"
                                                                data-bs-toggle="tab" id="week-tab" role="tab"
                                                                type="button">Week
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button aria-controls="month-tab-pane" aria-selected="false"
                                                                class="nav-link" data-bs-target="#month-tab-pane"
                                                                data-bs-toggle="tab" id="month-tab" role="tab"
                                                                type="button">Month
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="OutlineContent">
                                                <div aria-labelledby="today-tab" class="tab-pane fade show active"
                                                    id="today-tab-pane" role="tabpanel" tabindex="0">

                                                    <ul class="app-timeline-box activity-timeline">
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-primary h-35 w-35 d-flex-center b-r-50">
                                                                    W
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class="f-s-16">
                                                                    <span class="text-primary f-s-16 mb-0">Wilson<span
                                                                            class="text-secondary ms-2">added reaction in
                                                                            <span
                                                                                class="badge text-outline-primary me-2">#product
                                                                                website</span>post</span></span>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>09.00AM
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-info h-35 w-35 d-flex-center b-r-50 icon-direction">
                                                                    <i class="ph-duotone  ph-image f-s-18"></i>
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <p class=" f-s-16 text-info mb-0">2 image files and 2
                                                                    videos uploaded</p>

                                                                <div
                                                                    class="app-timeline-info-text timeline-border-box me-2 ms-0 mt-3 p-3">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <a class="glightbox img-hover-zoom"
                                                                                data-glightbox="type: image; zoomable: true;"
                                                                                href="../assets/images/draggable/02.jpg">
                                                                                <img alt="" class="w-100 rounded"
                                                                                    src="../assets/images/draggable/02.jpg">
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <a class="glightbox img-hover-zoom"
                                                                                data-glightbox="type: image; zoomable: true;"
                                                                                href="../assets/images/draggable/04.jpg">
                                                                                <img alt="" class="w-100 rounded"
                                                                                    src="../assets/images/draggable/04.jpg">
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <a class="glightbox img-hover-zoom"
                                                                                data-glightbox="type: image; zoomable: true;"
                                                                                href="../assets/images/draggable/01.jpg">
                                                                                <img alt="" class="w-100 rounded"
                                                                                    src="../assets/images/draggable/01.jpg">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>Updated
                                                                    at 12:45 pm
                                                                </p>
                                                            </div>


                                                        </li>
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-success  h-35 w-35 d-flex-center b-r-50">
                                                                    D
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class="f-s-16">
                                                                    <span class="text-secondary"><span
                                                                            class="text-success f-s-16 mb-0">Dane
                                                                            Wiza</span> added reaction in <span
                                                                            class="badge text-outline-success me-2">#product
                                                                            website</span>post</span>
                                                                </div>
                                                                <div class="timeline-border-box me-2 ms-0 mt-3">
                                                                    <h6 class="mb-0">Need a feature</h6>
                                                                    <p class="mb-4 text-secondary">Hello everyone,
                                                                        question on email marketing. What are some
                                                                        tips/tricks to avoid going to promotion
                                                                        spam/ junk for automated marketing emails
                                                                        going to promotion spam/ junk for automated
                                                                        marketing emails</p>
                                                                    <span
                                                                        class="badge text-outline-success me-2 timeline-badge">#🙂❤10Reactions</span>
                                                                    <span
                                                                        class="badge text-outline-success me-2">#✨12Replies</span>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>09.00AM
                                                                </p>
                                                            </div>


                                                        </li>
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-danger h-35 w-35 d-flex-center b-r-50">
                                                                    B
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class="f-s-16">
                                                                    <span class="text-danger f-s-16 mb-0">Betty Mante <span
                                                                            class="text-secondary ms-2">Request joined
                                                                            <span
                                                                                class="badge text-outline-danger me-2">#reaserchteam</span>groups</span></span>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <button class="btn btn-danger" type="button">Accept
                                                                    </button>
                                                                    <button class="btn btn-outline-danger"
                                                                        type="button">Rejects
                                                                    </button>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>4 days
                                                                    ago
                                                                </p>
                                                            </div>


                                                        </li>
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-primary h-35 w-35 d-flex-center b-r-50">
                                                                    P
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class=" f-s-16">
                                                                    <span class="text-primary f-s-16 mb-0">Pinkie
                                                                        <span class="text-secondary ms-2">uploaded
                                                                            <span
                                                                                class="text-dark f-w-600 me-2 ms-2">2</span>attachment
                                                                            <span
                                                                                class="badge text-outline-primary me-2">#reaserchteam</span></span>
                                                                    </span>
                                                                </div>

                                                                <div class="mt-3">
                                                                    <button class="btn btn-primary" type="button">Accept
                                                                    </button>
                                                                    <button class="btn btn-outline-primary"
                                                                        type="button">Rejects
                                                                    </button>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>4 days
                                                                    ago
                                                                </p>
                                                            </div>


                                                        </li>
                                                    </ul>
                                                </div>
                                                <div aria-labelledby="week-tab-pane" class="tab-pane" id="week-tab-pane"
                                                    role="tabpanel" tabindex="0">

                                                    <ul class="app-timeline-box activity-timeline">
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-success  h-35 w-35 d-flex-center b-r-50">
                                                                    D
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class="f-s-16">
                                                                    <span class="text-secondary"><span
                                                                            class="text-success f-s-16 mb-0">Dane
                                                                            Wiza</span> added reaction in <span
                                                                            class="badge text-outline-success me-2">#product
                                                                            website</span>post</span>
                                                                </div>
                                                                <div class="timeline-border-box me-2 ms-0 mt-3">
                                                                    <h6 class="mb-0">Need a feature</h6>
                                                                    <p class="mb-4 text-secondary">Hello everyone,
                                                                        question on email marketing. What are some
                                                                        tips/tricks to avoid going to promotion
                                                                        spam/ junk for automated marketing emails
                                                                        going to promotion spam/ junk for automated
                                                                        marketing emails</p>
                                                                    <span
                                                                        class="badge text-outline-success me-2 timeline-badge">#🙂❤10Reactions</span>
                                                                    <span
                                                                        class="badge text-outline-success me-2">#✨12Replies</span>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>09.00AM
                                                                </p>
                                                            </div>


                                                        </li>
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-danger h-35 w-35 d-flex-center b-r-50">
                                                                    B
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class="f-s-16">
                                                                    <span class="text-danger f-s-16 mb-0">Betty Mante <span
                                                                            class="text-secondary ms-2">Request joined
                                                                            <span
                                                                                class="badge text-outline-danger me-2">#reaserchteam</span>groups</span></span>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <button class="btn btn-danger" type="button">Accept
                                                                    </button>
                                                                    <button class="btn btn-outline-danger"
                                                                        type="button">Rejects
                                                                    </button>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>4 days
                                                                    ago
                                                                </p>
                                                            </div>


                                                        </li>
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-primary h-35 w-35 d-flex-center b-r-50">
                                                                    P
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class=" f-s-16">
                                                                    <span class="text-primary f-s-16 mb-0">Pinkie
                                                                        <span class="text-secondary ms-2">uploaded
                                                                            <span
                                                                                class="text-dark f-w-600 me-2 ms-2">2</span>attachment
                                                                            <span
                                                                                class="badge text-outline-primary me-2">#reaserchteam</span></span>
                                                                    </span>
                                                                </div>

                                                                <div class="mt-3">
                                                                    <button class="btn btn-primary" type="button">Accept
                                                                    </button>
                                                                    <button class="btn btn-outline-primary"
                                                                        type="button">Rejects
                                                                    </button>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>4 days
                                                                    ago
                                                                </p>
                                                            </div>


                                                        </li>
                                                    </ul>
                                                </div>
                                                <div aria-labelledby="month-tab-pane" class="tab-pane"
                                                    id="month-tab-pane" role="tabpanel" tabindex="0">
                                                    <ul class="app-timeline-box activity-timeline">
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-success  h-35 w-35 d-flex-center b-r-50">
                                                                    D
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class="f-s-16">
                                                                    <span class="text-secondary"><span
                                                                            class="text-success f-s-16 mb-0">Dane
                                                                            Wiza</span> added reaction in <span
                                                                            class="badge text-outline-success me-2">#product
                                                                            website</span>post</span>
                                                                </div>
                                                                <div class="timeline-border-box me-2 ms-0 mt-3">
                                                                    <h6 class="mb-0">Need a feature</h6>
                                                                    <p class="mb-4 text-secondary">Hello everyone,
                                                                        question on email marketing. What are some
                                                                        tips/tricks to avoid going to promotion
                                                                        spam/ junk for automated marketing emails
                                                                        going to promotion spam/ junk for automated
                                                                        marketing emails</p>
                                                                    <span
                                                                        class="badge text-outline-success me-2 timeline-badge">#🙂❤10Reactions</span>
                                                                    <span
                                                                        class="badge text-outline-success me-2">#✨12Replies</span>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>09.00AM
                                                                </p>
                                                            </div>


                                                        </li>
                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-info h-35 w-35 d-flex-center b-r-50 icon-direction">
                                                                    <i class="ph-duotone  ph-image f-s-18"></i>
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <p class=" f-s-16 text-info mb-0">2 image files and 2
                                                                    videos uploaded</p>

                                                                <div
                                                                    class="app-timeline-info-text timeline-border-box me-2 ms-0 mt-3 p-3">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <a class="glightbox img-hover-zoom"
                                                                                data-glightbox="type: image; zoomable: true;"
                                                                                href="../assets/images/draggable/02.jpg">
                                                                                <img alt="" class="w-100 rounded"
                                                                                    src="../assets/images/draggable/02.jpg">
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="img-hover-zoom">
                                                                                <a class="glightbox img-hover-zoom"
                                                                                    data-glightbox="type: image; zoomable: true;"
                                                                                    href="../assets/images/draggable/04.jpg">
                                                                                    <img alt=""
                                                                                        class="w-100 rounded"
                                                                                        src="../assets/images/draggable/04.jpg">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="img-hover-zoom">
                                                                                <a class="glightbox img-hover-zoom"
                                                                                    data-glightbox="type: image; zoomable: true;"
                                                                                    href="../assets/images/draggable/01.jpg">
                                                                                    <img alt=""
                                                                                        class="w-100 rounded"
                                                                                        src="../assets/images/draggable/01.jpg">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>Updated
                                                                    at 12:45 pm
                                                                </p>
                                                            </div>


                                                        </li>

                                                        <li class="timeline-section">
                                                            <div class="timeline-icon">
                                                                <span
                                                                    class="text-light-primary h-35 w-35 d-flex-center b-r-50">
                                                                    P
                                                                </span>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <div class=" f-s-16">
                                                                    <span class="text-primary f-s-16 mb-0">Pinkie
                                                                        <span class="text-secondary ms-2">uploaded
                                                                            <span
                                                                                class="text-dark f-w-600 me-2 ms-2">2</span>attachment
                                                                            <span
                                                                                class="badge text-outline-primary me-2">#reaserchteam</span></span>
                                                                    </span>
                                                                </div>

                                                                <div class="mt-3">
                                                                    <button class="btn btn-primary" type="button">Accept
                                                                    </button>
                                                                    <button class="btn btn-outline-primary"
                                                                        type="button">Rejects
                                                                    </button>
                                                                </div>
                                                                <p class="f-w-500 mt-2 mb-0">
                                                                    <i class="ph ph-clock me-1 align-middle"></i>4 days
                                                                    ago
                                                                </p>
                                                            </div>


                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div aria-labelledby="ubah-password-tab" class="tab-pane fade"
                                    id="ubah-password-tab-pane" role="tabpanel" tabindex="0">
                                    <div class="card security-card-content">
                                        <div class="card-body">
                                            <div class="account-security mb-2">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-9">
                                                        <h5 class="text-primary f-w-600">Change Password</h5>
                                                        <p class="account-discription text-secondary f-s-16 mt-3">To
                                                            Ubah password jika ingin akunmu aman,dengan menggunakan
                                                            kombinasi huruf besar,kecil,angka,dan special character</p>
                                                    </div>
                                                    <div class="col-sm-3 account-security-img">
                                                        <img alt="" class="w-150"
                                                            src="{{ asset('/assets/images/setting-app/password.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="app-form">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label class="form-label" for="password">Current
                                                            Password</label>
                                                        <div class="input-group input-group-password mb-3">
                                                            <span class="input-group-text b-r-left"><i
                                                                    class="ph-bold  ph-lock f-s-20"></i></span>
                                                            <input aria-label="Amount (to the nearest dollar)"
                                                                class="form-control" id="password"
                                                                placeholder="********" type="password">
                                                            <span class="input-group-text b-r-right"><i
                                                                    class="ph ph-eye-slash f-s-20 eyes-icon "
                                                                    id="showPassword"></i></span>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label" for="password">New
                                                            Password</label>
                                                        <div class="input-group input-group-password mb-3">
                                                            <span class="input-group-text b-r-left"><i
                                                                    class="ph-bold  ph-lock f-s-20"></i></span>
                                                            <input aria-label="Amount (to the nearest dollar)"
                                                                class="form-control" id="password1"
                                                                placeholder="********" type="password">
                                                            <span class="input-group-text b-r-right"><i
                                                                    class="ph ph-eye-slash f-s-20 eyes-icon1 "
                                                                    id="showPassword1"></i></span>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label class="form-label" for="password">Confirm
                                                            Password</label>
                                                        <div class="input-group input-group-password mb-3">
                                                            <span class="input-group-text b-r-left"><i
                                                                    class="ph-bold  ph-lock f-s-20"></i></span>
                                                            <input aria-label="Amount (to the nearest dollar)"
                                                                class="form-control" id="password2"
                                                                placeholder="********" type="password">
                                                            <span class="input-group-text b-r-right"><i
                                                                    class="ph ph-eye-slash f-s-20 eyes-icon2"
                                                                    id="showPassword2"></i></span>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div aria-labelledby="list-bahan-ajar-tab" class="tab-pane fade"
                                    id="list-bahan-ajar-tab-pane" role="tabpanel" tabindex="0">

                                    <div class="card">
                                        <!-- Default Datatable start -->
                                        <div class="col-12">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h5 class="text-primary f-w-600">List Bahan Ajar</h5>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="app-datatable-default overflow-auto">
                                                        <table id="example"
                                                            class="display app-data-table default-data-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Position</th>
                                                                    <th>Office</th>
                                                                    <th>Age</th>
                                                                    <th>Start date</th>
                                                                    <th>Salary</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Tiger Nixon</td>
                                                                    <td><span class="badge text-light-primary">System
                                                                            Architect</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>61</td>
                                                                    <td>$3674.55</td>
                                                                    <td>$320,800</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Garrett Winters</td>
                                                                    <td><span
                                                                            class="badge text-light-success">Accountant</span>
                                                                    </td>
                                                                    <td>Tokyo</td>
                                                                    <td>63</td>
                                                                    <td>2011-07-25</td>
                                                                    <td>$170,750</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Ashton Cox</td>
                                                                    <td><span class="badge text-light-secondary">Junior
                                                                            Technical Author</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>66</td>
                                                                    <td>2009-01-12</td>
                                                                    <td>$86,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Cedric Kelly</td>
                                                                    <td><span class="badge text-light-info">Senior
                                                                            Javascript Developer</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>22</td>
                                                                    <td>2012-03-29</td>
                                                                    <td>$433,060</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Airi Satou</td>
                                                                    <td><span
                                                                            class="badge text-light-success">Accountant</span>
                                                                    </td>
                                                                    <td>Tokyo</td>
                                                                    <td>33</td>
                                                                    <td>2008-11-28</td>
                                                                    <td>$162,700</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Brielle Williamson</td>
                                                                    <td><span class="badge text-light-danger"> Integration
                                                                            Specialist</span></td>
                                                                    <td>New York</td>
                                                                    <td>61</td>
                                                                    <td>2012-12-02</td>
                                                                    <td>$372,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Herrod Chandler</td>
                                                                    <td><span class="badge text-light-dark">Sales
                                                                            Assistant</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>59</td>
                                                                    <td>2012-08-06</td>
                                                                    <td>$137,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Rhona Davidson</td>
                                                                    <td><span class="badge text-light-light">Integration
                                                                            Specialist</span></td>
                                                                    <td>Tokyo</td>
                                                                    <td>55</td>
                                                                    <td>2010-10-14</td>
                                                                    <td>$327,900</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Colleen Hurst</td>
                                                                    <td><span class="badge text-light-primary">Javascript
                                                                            Developer</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>39</td>
                                                                    <td>2009-09-15</td>
                                                                    <td>$205,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sonya Frost</td>
                                                                    <td><span class="badge text-light-info">Software
                                                                            Engineer</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>23</td>
                                                                    <td>2008-12-13</td>
                                                                    <td>$103,600</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jena Gaines</td>
                                                                    <td><span class="badge text-light-danger">Office
                                                                            Manager</span></td>
                                                                    <td>London</td>
                                                                    <td>30</td>
                                                                    <td>2008-12-19</td>
                                                                    <td>$90,560</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Quinn Flynn</td>
                                                                    <td><span class="badge text-light-secondary">Support
                                                                            Lead</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>22</td>
                                                                    <td>2013-03-03</td>
                                                                    <td>$342,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Charde Marshall</td>
                                                                    <td><span class="badge text-light-info">Regional
                                                                            Director</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>36</td>
                                                                    <td>2008-10-16</td>
                                                                    <td>$470,600</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Haley Kennedy</td>
                                                                    <td><span class="badge text-light-primary">Senior
                                                                            Marketing Designer</span></td>
                                                                    <td>London</td>
                                                                    <td>43</td>
                                                                    <td>2012-12-18</td>
                                                                    <td>$313,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tatyana Fitzpatrick</td>
                                                                    <td><span class="badge text-light-info">Regional
                                                                            Director</span></td>
                                                                    <td>London</td>
                                                                    <td>19</td>
                                                                    <td>2010-03-17</td>
                                                                    <td>$385,750</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Michael Silva</td>
                                                                    <td><span class="badge text-light-warning">Marketing
                                                                            Designer</span></td>
                                                                    <td>London</td>
                                                                    <td>66</td>
                                                                    <td>2012-11-27</td>
                                                                    <td>$198,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Paul Byrd</td>
                                                                    <td><span class="badge text-light-secondary">Chief
                                                                            Financial Officer (CFO)</span>
                                                                    </td>
                                                                    <td>New York</td>
                                                                    <td>64</td>
                                                                    <td>2010-06-09</td>
                                                                    <td>$725,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gloria Little</td>
                                                                    <td><span class="badge text-light-success">Systems
                                                                            Administrator</span></td>
                                                                    <td>New York</td>
                                                                    <td>59</td>
                                                                    <td>2009-04-10</td>
                                                                    <td>$237,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bradley Greer</td>
                                                                    <td><span class="badge text-light-info">Software
                                                                            Engineer</span></td>
                                                                    <td>London</td>
                                                                    <td>41</td>
                                                                    <td>2012-10-13</td>
                                                                    <td>$132,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dai Rios</td>
                                                                    <td><span class="badge text-light-danger">Personnel
                                                                            Lead</span></td>
                                                                    <td>Edinburgh</td>
                                                                    <td>35</td>
                                                                    <td>2012-09-26</td>
                                                                    <td>$217,500</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jenette Caldwell</td>
                                                                    <td><span class="badge text-light-dark">Personnel
                                                                            Lead</span></td>
                                                                    <td>New York</td>
                                                                    <td>30</td>
                                                                    <td>2011-09-03</td>
                                                                    <td>$345,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Yuri Berry</td>
                                                                    <td><span class="badge text-light-info">Development
                                                                            Lead</span></td>
                                                                    <td>New York</td>
                                                                    <td>40</td>
                                                                    <td>2009-06-25</td>
                                                                    <td>$675,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Caesar Vance</td>
                                                                    <td><span class="badge text-light-warning">Pre-Sales
                                                                            Support</span></td>
                                                                    <td>New York</td>
                                                                    <td>21</td>
                                                                    <td>2011-12-12</td>
                                                                    <td>$106,450</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Doris Wilder</td>
                                                                    <td><span class="badge text-light-dark">Sales
                                                                            Assistant</span></td>
                                                                    <td>Sydney</td>
                                                                    <td>23</td>
                                                                    <td>2010-09-20</td>
                                                                    <td>$85,600</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Angelica Ramos</td>
                                                                    <td><span class="badge text-light-secondary">Chief
                                                                            Executive Officer (CEO)</span>
                                                                    </td>
                                                                    <td>London</td>
                                                                    <td>47</td>
                                                                    <td>2009-10-09</td>
                                                                    <td>$1,200,000</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Gavin Joyce</td>
                                                                    <td><span
                                                                            class="badge text-light-light">Developer</span>
                                                                    </td>
                                                                    <td>Edinburgh</td>
                                                                    <td>42</td>
                                                                    <td>2010-12-22</td>
                                                                    <td>$92,575</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jennifer Chang</td>
                                                                    <td><span class="badge text-light-info">Regional
                                                                            Director</span></td>
                                                                    <td>Singapore</td>
                                                                    <td>28</td>
                                                                    <td>2010-11-14</td>
                                                                    <td>$357,650</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
                                                                            <i class="ti ti-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Brenden Wagner</td>
                                                                    <td><span class="badge text-light-info">Software
                                                                            Engineer</span></td>
                                                                    <td>San Francisco</td>
                                                                    <td>28</td>
                                                                    <td>2011-06-07</td>
                                                                    <td>$206,850</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-light-success icon-btn b-r-4">
                                                                            <i class="ti ti-edit text-success"></i>
                                                                        </button>
                                                                        <button type="button"
                                                                            class="btn btn-light-danger icon-btn b-r-4 delete-btn">
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
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--setting app end -->
                @endif
            @endif

        </div>
    </div>


@endsection



@section('script')

    <!-- modal -->

    {{-- <div class="modal" data-bs-backdrop="static" id="welcomeCard" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content welcome-card">

                <div class="modal-body p-0">
                    <div class="text-center position-relative welcome-card-content z-1 p-3">
                        <div class="text-end position-relative z-1">
                            <i class="ti ti-x fs-5 text-dark f-w-600" data-bs-dismiss="modal"></i>
                        </div>
                        <h2 class="f-w-700 text-primary-dark mb-0"><span>Welcome!</span> <img alt="gif"
                                class="w-45 d-inline align-baseline"
                                src="{{ asset('../assets/images/dashboard/ecommerce-dashboard/celebration.gif') }}">
                        </h2>

                        <div class="modal-img-box">
                            <img alt="img" class=" img-fluid"
                                src="{{ asset('../assets/images/modals/welcome-1.png') }}">
                        </div>
                        <div class="modal-btn mb-4">
                            <button class="btn btn-primary text-white btn-sm rounded" data-bs-dismiss="modal"
                                type="button">
                                Get Started
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}

    <!-- slick-file -->
    <script src="{{ asset('assets/vendor/slick/slick.min.js') }}"></script>

    <!-- apexcharts js-->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- filepond -->
    <script src="{{ asset('assets/vendor/filepond/file-encode.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/filepond/validate-size.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/filepond/validate-type.js') }}"></script>
    <script src="{{ asset('assets/vendor/filepond/exif-orientation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/filepond/image-preview.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/filepond/filepond.min.js') }}"></script>

    <!-- Project Dashboard js-->
    <script src="{{ asset('assets/js/project_dashboard.js') }}"></script>

    <!-- Glight js -->
    <script src="{{ asset('assets/vendor/glightbox/glightbox.min.js') }}"></script>
    <!-- select2 -->
    <script src="{{ asset('assets/vendor/select/select2.min.js') }}"></script>

    <!--setting js  -->
    <script src="{{ asset('assets/js/setting.js') }}"></script>

    <!-- data table js -->
    <script src="{{ asset('assets/vendor/datatable/jquery.dataTables.min.js') }}"></script>

    <!-- js-->
    <script src="{{ asset('assets/js/data_table.js') }}"></script>

@endsection
