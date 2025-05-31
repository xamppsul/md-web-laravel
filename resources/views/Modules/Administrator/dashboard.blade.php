@extends('admin-layout.master')
@section('title', 'Administrator Dashboard | MD Project')
@section('css')

    <!-- apexcharts css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/apexcharts/apexcharts.css') }}">

    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick-theme.css') }}">

    <!-- filepond css -->
    <link href="{{ asset('assets/vendor/filepond/filepond.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/filepond/image-preview.min.css') }}" rel="stylesheet">

@endsection
@section('main-content')
    <div class="container-fluid mt-3">
        @session('success')
            <div class="flash-data-success" data-flashdata-success="{{ $value }}"></div>
        @endsession
        @session('error')
            <div class="flash-data-error" data-flashdata-error="{{ $value }}"></div>
        @endsession

        @if (Auth::guard('admin')->check())
            @if (Auth::guard('admin')->user()->roles_id == 1)
                <div class="row">

                    <div class="col-lg-6 col-xxl-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Aktivitas User</p>
                                            <h2 class="text-success-dark mb-0">{{ $data['aktivitas_user']->total }}</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Jumlah Dosen</p>
                                            <h2 class="text-success-dark mb-0">{{ $data['jumlah_dosen']->total }}</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-sm-6">
                                <div class="col-12">
                                    <div class="card product-store-card">
                                        <div class="card-body">
                                            <i class="ph-bold  ph-circle circle-bg-img"></i>
                                            <div>
                                                <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Jumlah Staff</p>
                                                <h2 class="text-success-dark mb-0">-6,876</h2>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="col-md-6 col-xxl-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card product-store-card">
                                    <div class="card-body">
                                        <i class="ph-bold  ph-circle circle-bg-img"></i>
                                        <div>
                                            <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Aset Rusak</p>
                                            <h2 class="text-success-dark mb-0">{{ $data['total_aset_rusak']->total }}</h2>
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
                                            <h2 class="text-success-dark mb-0">{{ $data['total_kerjasama']->total }}</h2>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xxl-4 ">
                        {{-- <div class="card project-connect-card">
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
                        </div> --}}
                        <div class="col-12">
                            <div class="card product-store-card">
                                <div class="card-body">
                                    <i class="ph-bold  ph-circle circle-bg-img"></i>
                                    <div>
                                        <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Aset Baik</p>
                                        <h2 class="text-success-dark mb-0">{{ $data['total_aset_baik']->total }} </h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card product-store-card">
                                <div class="card-body">
                                    <i class="ph-bold  ph-circle circle-bg-img"></i>
                                    <div>
                                        <p class="text-success f-s-18 f-w-600 txt-ellipsis-1">📝 Total Kegiatan Dalam Tahun:
                                            {{ date('Y') }}</p>
                                        <h2 class="text-success-dark mb-0">{{ $data['total_kegiatan_dalam_tahun']->total }}
                                        </h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

        @endif
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

@endsection
