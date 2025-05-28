@extends('layout.master', ['profile' => $data['profile']])
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

    <!-- flatpickr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datepikar/flatpickr.min.css') }}">

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
                                                            class="ti ti-circle-filled me-2 f-s-6"></i> Campaign to begin
                                                        in
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
                                            <h2 class="text-success-dark mb-0">{{ $data['total_bahan_ajar'] }}</h2>
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
                                            <h2 class="text-success-dark mb-0">{{ $data['total_penelitian'] }}</h2>
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
                                            <h2 class="text-success-dark mb-0">{{ $data['total_pengabdian'] }}</h2>
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
                                                    aria-selected="true"> <i
                                                        class="ph-duotone ph-globe-hemisphere-west pe-2"></i>
                                                    List Publikasi</button>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="riwayat-jabatan-tab" data-bs-toggle="tab"
                                                    data-bs-target="#riwayat-jabatan-tab-pane" type="button"
                                                    role="tab" aria-controls="riwayat-jabatan-tab-pane"
                                                    aria-selected="false"><i
                                                        class="ph-bold  ph-user-list pe-2"></i>Riwayat Jabatan</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="list-bahan-ajar-tab" data-bs-toggle="tab"
                                                    data-bs-target="#list-bahan-ajar-tab-pane" type="button"
                                                    role="tab" aria-controls="list-bahan-ajar-tab-pane"
                                                    aria-selected="false"><i class="ph-bold ph-book-open pe-2"></i>List
                                                    Bahan Ajar</button>
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
                                                <form class="app-form"
                                                    action="{{ route('user.updateOrCreateUserProfile.dashboard') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="image-details">
                                                        <img class="profile-image"
                                                            src="{{ !empty($data['profile']->photo_banner) ? asset("profile_banner/{$data['profile']->photo_banner}") : asset('assets/images/background/No_Image_Available.jpg') }}" />
                                                        <div class="profile-pic">
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input accept=".png, .jpg, .jpeg" id="imageUpload"
                                                                        type="file" name="photo">
                                                                    <label for="imageUpload"><i
                                                                            class="ti ti-photo-heart"></i></label>
                                                                </div>
                                                                <div class="avatar-preview">
                                                                    <div id="imgPreview">
                                                                        <img src="{{ !empty($data['profile']->photo) ? asset("profile_photo/{$data['profile']->photo}") : asset('build/assets/9-AaFbjrgd.png') }}"
                                                                            class="rounded-circle"
                                                                            style="width:100%; height:100%; object-fit:cover; border-radius:100%;"
                                                                            alt="Profile Photo" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="person-details">
                                                        <h5 class="f-w-600">{{ Auth::guard('user')->user()->name }}
                                                            <img alt="instagram-check-mark" height="20"
                                                                src="{{ asset('assets/images/profile-app/01.png') }}"
                                                                width="20">
                                                        </h5>
                                                        <p>Roles:
                                                            {{ Auth::guard('user')->user()->roles_id == 2 ? 'StaffDosen' : 'FacultyUpps' }}
                                                        </p>
                                                    </div>

                                                    <h5 class="mb-2 text-dark f-w-600">Personal Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="nidn">Nidn</label>
                                                                <input
                                                                    class="form-control @error('nidn') is-invalid @enderror"
                                                                    id="nidn" placeholder="Masukan Nidn"
                                                                    type="text"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->nidn) ? $data['profile']->nidn : old('nidn')) : old('nidn') }}"
                                                                    name="nidn">
                                                                @error('nidn')
                                                                    <span class="text-danger"
                                                                        id="nidn">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="nip">Nip</label>
                                                                <input
                                                                    class="form-control @error('nip') is-invalid @enderror"
                                                                    id="nip" placeholder="Masukan Nip"
                                                                    type="text" name="nip"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->nip) ? $data['profile']->nip : old('nip')) : old('nip') }}">
                                                                @error('nip')
                                                                    <span class="text-danger"
                                                                        id="nip">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="nama_lengkap">Nama
                                                                    Lengkap</label>
                                                                <input
                                                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                                    id="nama_lengkap" placeholder="Masukan Nama Lengkap"
                                                                    type="text" name="nama_lengkap"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->nama_lengkap) ? $data['profile']->nama_lengkap : old('nama_lengkap')) : old('nama_lengkap') }}">
                                                                @error('nama_lengkap')
                                                                    <span class="text-danger"
                                                                        id="nama_lengkap">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gelar_depan">Gelar
                                                                    Depan</label>
                                                                <input
                                                                    class="form-control @error('gelar_depan') is-invalid @enderror"
                                                                    id="gelar_depan" placeholder="Masukan Gelar Depan"
                                                                    type="text" name="gelar_depan"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->gelar_depan) ? $data['profile']->gelar_depan : old('gelar_depan')) : old('gelar_depan') }}">
                                                                @error('gelar_depan')
                                                                    <span class="text-danger"
                                                                        id="gelar_depan">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="gelar_belakang">Gelar
                                                                    Belakang</label>
                                                                <input
                                                                    class="form-control @error('gelar_belakang') is-invalid @enderror"
                                                                    id="gelar_belakang"
                                                                    placeholder="Masukan Gelar Belakang" type="text"
                                                                    name="gelar_belakang"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->gelar_belakang) ? $data['profile']->gelar_belakang : old('gelar_belakang')) : old('gelar_belakang') }}">
                                                                @error('gelar_belakang')
                                                                    <span class="text-danger"
                                                                        id="gelar_belakang">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="jenis_kelamin">Jenis
                                                                    Kelamin</label>
                                                                <select
                                                                    class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                                                    id="jenis_kelamin" name="jenis_kelamin">
                                                                    <option selected="">Pilih Jenis Kelamin</option>
                                                                    <option value="L"
                                                                        {{ (!empty($data['profile']) ? ($data['profile']->jenis_kelamin == 'L' ? 'selected' : '') : old('jenis_kelamin') == 'L') ? 'selected' : '' }}>
                                                                        L</option>
                                                                    <option value="P"
                                                                        {{ (!empty($data['profile']) ? ($data['profile']->jenis_kelamin == 'P' ? 'selected' : '') : old('jenis_kelamin') == 'P') ? 'selected' : '' }}>
                                                                        P</option>
                                                                </select>
                                                                @error('jenis_kelamin')
                                                                    <span class="text-danger"
                                                                        id="jenis_kelamin">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="tempat_lahir">Tempat
                                                                    Lahir</label>
                                                                <input
                                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                                    id="tempat_lahir" placeholder="Masukan Tempat Lahir"
                                                                    type="text" name="tempat_lahir"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->tempat_lahir) ? $data['profile']->tempat_lahir : old('tempat_lahir')) : old('tempat_lahir') }}">
                                                                @error('tempat_lahir')
                                                                    <span class="text-danger"
                                                                        id="tempat_lahir">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="tanggal_lahir">Tanggal
                                                                    Lahir</label>
                                                                <input
                                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror
                                                                    basic-date"
                                                                    id="tanggal_lahir" placeholder="Masukan Tanggal Lahir"
                                                                    type="text" name="tanggal_lahir"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->tanggal_lahir) ? $data['profile']->tanggal_lahir : old('tanggal_lahir')) : old('tanggal_lahir') }}">
                                                                @error('tanggal_lahir')
                                                                    <span class="text-danger"
                                                                        id="tanggal_lahir">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="agama">Agama</label>
                                                                <input
                                                                    class="form-control @error('agama') is-invalid @enderror"
                                                                    id="agama" placeholder="Masukan Agama"
                                                                    type="text" name="agama"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->agama) ? $data['profile']->agama : old('agama')) : old('agama') }}">
                                                                @error('agama')
                                                                    <span class="text-danger"
                                                                        id="agama">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="profile_status_perkawinan">Status
                                                                    Perkawinan</label>
                                                                <select
                                                                    class="form-select @error('profile_status_perkawinan') is-invalid @enderror"
                                                                    id="profile_status_perkawinan"
                                                                    name="profile_status_perkawinan">
                                                                    <option selected="">Pilih Status Perkawinan</option>
                                                                    @foreach ($data['status_perkawinan'] as $statusPerkawinan)
                                                                        <option value="{{ $statusPerkawinan->id }}"
                                                                            {{ (!empty($data['profile']->profile_status_perkawinan) ? ($data['profile']->profile_status_perkawinan == $statusPerkawinan->id ? 'selected' : '') : old('profile_status_perkawinan') == $statusPerkawinan->id) ? 'selected' : '' }}>
                                                                            {{ $statusPerkawinan->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('profile_status_perkawinan')
                                                                    <span class="text-danger"
                                                                        id="profile_status_perkawinan">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="alamat">alamat</label>
                                                                <input
                                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                                    id="alamat" placeholder="Masukan Alamat"
                                                                    type="text" name="alamat"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->alamat) ? $data['profile']->alamat : old('alamat')) : old('alamat') }}">
                                                                @error('alamat')
                                                                    <span class="text-danger"
                                                                        id="alamat">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="no_hp">No
                                                                    Handphone</label>
                                                                <input
                                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                                    id="no_hp" placeholder="Masukan Nomor Handphone"
                                                                    type="text" name="no_hp"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->no_hp) ? $data['profile']->no_hp : old('no_hp')) : old('no_hp') }}">
                                                                @error('no_hp')
                                                                    <span class="text-danger"
                                                                        id="no_hp">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                                <input
                                                                    class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                                                                    id="pendidikan_terakhir"
                                                                    placeholder="Masukan Pendidikan Terakhir"
                                                                    type="text" name="pendidikan_terakhir"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->pendidikan_terakhir) ? $data['profile']->pendidikan_terakhir : old('pendidikan_terakhir')) : old('pendidikan_terakhir') }}">
                                                                @error('pendidikan_terakhir')
                                                                    <span class="text-danger"
                                                                        id="pendidikan_terakhir">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="program_studi">Program
                                                                    Studi</label>
                                                                <input
                                                                    class="form-control @error('program_studi') is-invalid @enderror"
                                                                    id="program_studi" placeholder="Masukan Program Studi"
                                                                    type="text" name="program_studi"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->program_studi) ? $data['profile']->program_studi : old('program_studi')) : old('program_studi') }}">
                                                                @error('program_studi')
                                                                    <span class="text-danger"
                                                                        id="program_studi">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="fakultas">Fakultas</label>
                                                                <input
                                                                    class="form-control @error('fakultas') is-invalid @enderror"
                                                                    id="fakultas" placeholder="Masukan Fakultas"
                                                                    type="text" name="fakultas"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->fakultas) ? $data['profile']->fakultas : old('fakultas')) : old('fakultas') }}">
                                                                @error('fakultas')
                                                                    <span class="text-danger"
                                                                        id="fakultas">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="jabatan_akademik">Jabatan
                                                                    Akademik</label>
                                                                <input
                                                                    class="form-control @error('jabatan_akademik') is-invalid @enderror"
                                                                    id="jabatan_akademik"
                                                                    placeholder="Masukan Jabatan Akademik" type="text"
                                                                    name="jabatan_akademik"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->jabatan_akademik) ? $data['profile']->jabatan_akademik : old('jabatan_akademik')) : old('jabatan_akademik') }}">
                                                                @error('jabatan_akademik')
                                                                    <span class="text-danger"
                                                                        id="jabatan_akademik">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="jabatan_golongan">Golongan
                                                                    Jabatan</label>
                                                                <input
                                                                    class="form-control @error('jabatan_golongan') is-invalid @enderror"
                                                                    id="jabatan_golongan"
                                                                    placeholder="Masukan Jabatan Golongan" type="text"
                                                                    name="jabatan_golongan"
                                                                    value="{{ !empty($data['profile']) ? (!empty($data['profile']->jabatan_golongan) ? $data['profile']->jabatan_golongan : old('jabatan_golongan')) : old('jabatan_golongan') }}">
                                                                @error('jabatan_golongan')
                                                                    <span class="text-danger"
                                                                        id="jabatan_golongan">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="profile_status_ikatan_kerja">Status
                                                                    Ikatan Kerja</label>
                                                                <select
                                                                    class="form-select @error('profile_status_ikatan_kerja') is-invalid @enderror"
                                                                    id="profile_status_ikatan_kerja"
                                                                    name="profile_status_ikatan_kerja">
                                                                    <option selected="">Pilih Status Ikatan Kerja
                                                                    </option>
                                                                    @foreach ($data['status_ikatan_kerja'] as $statusIkatanKerja)
                                                                        <option value="{{ $statusIkatanKerja->id }}"
                                                                            {{ (!empty($data['profile']->profile_status_ikatan_kerja) ? ($data['profile']->profile_status_ikatan_kerja == $statusIkatanKerja->id ? 'selected' : '') : old('profile_status_ikatan_kerja') == $statusIkatanKerja->id) ? 'selected' : '' }}>
                                                                            {{ $statusIkatanKerja->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('profile_status_ikatan_kerja')
                                                                    <span class="text-danger"
                                                                        id="profile_status_ikatan_kerja">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="profile_status_mengajar">Status
                                                                    Mengajar</label>
                                                                <select
                                                                    class="form-select @error('profile_status_mengajar') is-invalid @enderror"
                                                                    id="profile_status_mengajar"
                                                                    name="profile_status_mengajar">
                                                                    <option selected="">Pilih Status Mengajar</option>
                                                                    @foreach ($data['status_mengajar'] as $statusMengajar)
                                                                        <option value="{{ $statusMengajar->id }}"
                                                                            {{ (!empty($data['profile']->profile_status_mengajar) ? ($data['profile']->profile_status_mengajar == $statusMengajar->id ? 'selected' : '') : old('profile_status_mengajar') == $statusMengajar->id) ? 'selected' : '' }}>
                                                                            {{ $statusMengajar->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('profile_status_mengajar')
                                                                    <span class="text-danger"
                                                                        id="profile_status_mengajar">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="photo_banner">Photo
                                                                    Banner</label>
                                                                <input type="file"
                                                                    class="form-control @error('photo_banner') is-invalid @enderror"
                                                                    id="photo_banner" placeholder="Masukan Photo Banner"
                                                                    name="photo_banner">
                                                                @error('photo_banner')
                                                                    <span class="text-danger"
                                                                        id="photo_banner">{{ $message }}</span>
                                                                @enderror
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
                                                                    <th>Judul Publikasi</th>
                                                                    <th>Jenis Publikasi</th>
                                                                    <th>Nama Jurnal</th>
                                                                    <th>Volume</th>
                                                                    <th>Nomor</th>
                                                                    <th>Tahun Terbit</th>
                                                                    <th>Tanggal Terbit</th>
                                                                    <th>Status Publikasi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data['list_publikasi'] as $ListPublikasi)
                                                                    <tr>
                                                                        <td>{{ $ListPublikasi->judul_publikasi }}</td>
                                                                        <td>{{ $ListPublikasi->list_publikasi_jenis_name }}
                                                                        </td>
                                                                        <td>{{ $ListPublikasi->nama_jurnal }}</td>
                                                                        <td>{{ $ListPublikasi->volume }}</td>
                                                                        <td>{{ $ListPublikasi->nomor }}</td>
                                                                        <td>{{ $ListPublikasi->tahun_terbit }}</td>
                                                                        <td>{{ $ListPublikasi->tanggal_terbit }}</td>
                                                                        <td>{{ $ListPublikasi->list_publikasi_status_name }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
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
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="OutlineContent">
                                                <div aria-labelledby="today-tab" class="tab-pane fade show active"
                                                    id="today-tab-pane" role="tabpanel" tabindex="0">

                                                    <ul class="app-timeline-box activity-timeline">
                                                        @foreach ($data['riwayatJabatan'] as $RiwayatJabatan)
                                                            <li class="timeline-section">
                                                                <div class="timeline-icon">
                                                                    {{-- <span
                                                                        class="text-light-primary h-35 w-35 d-flex-center b-r-50">
                                                                    </span> --}}
                                                                    <img class="h-35 w-35 d-flex-center b-r-50"
                                                                        src="{{ !empty($data['profile']->photo) ? asset("profile_photo/{$data['profile']->photo}") : asset('assets/images/background/No_Image_Available.jpg') }}"
                                                                        alt="profile_photo">
                                                                </div>
                                                                <div class="timeline-content">
                                                                    <div class="f-s-16">
                                                                        <span
                                                                            class="text-primary f-s-16 mb-0">{{ $RiwayatJabatan->nama_jabatan }}<span
                                                                                class="text-secondary ms-2">{{ $RiwayatJabatan->unit_kerja }}
                                                                                <span
                                                                                    class="badge text-outline-primary me-2">#{{ $RiwayatJabatan->riwayat_jabatan_jenis_name }}
                                                                                </span>{{ $RiwayatJabatan->riwayat_jabatan_status_name }}</span></span>
                                                                    </div>
                                                                    <p class="f-w-500 mt-2 mb-0">
                                                                        <i
                                                                            class="ph ph-clock me-1 align-middle"></i>{{ $RiwayatJabatan->tanggal_mulai }}
                                                                        ~ {{ $RiwayatJabatan->tanggal_selesai ?: '-' }}
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
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
                                                                    <th>Judul</th>
                                                                    <th>Jenis Bahan Ajar</th>
                                                                    <th>Matakuliah</th>
                                                                    <th>Program Studi</th>
                                                                    <th>Semester</th>
                                                                    <th>Tanggal Terbit</th>
                                                                    <th>Deskripsi</th>
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
                                                                    </tr>
                                                                @endforeach
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

    <!-- flatpickr js-->
    <script src="{{ asset('assets/vendor/datepikar/flatpickr.js') }}"></script>
    <!--date picker js-->
    <script src="{{ asset('assets/js/date_picker.js') }}"></script>

    <!-- js-->
    <script src="{{ asset('assets/js/data_table.js') }}"></script>

    <!-- slick-file -->
    <script src="{{ asset('assets/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/shepherdjs/shepherd.js') }}"></script>

    <!-- image preview or show data profile on database-->
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const imageUpload = document.getElementById('imageUpload');
            const imgPreview = document.getElementById('imgPreview');

            if (imageUpload && imgPreview) {
                imageUpload.addEventListener('change', function(event) {
                    const [file] = event.target.files;
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imgPreview.innerHTML =
                                `<img src="${e.target.result}" class="rounded-circle" style="width: 100%; height: 100%; object-fit: cover; border-radius: 100%;" alt="Profile Photo">`;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>

@endsection
