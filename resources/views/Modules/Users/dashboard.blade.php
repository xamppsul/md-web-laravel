@extends('layout.master')
@section('title', 'User Dashboard | MD Project')
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
        <div class="row">

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
                                            <span class="badge text-light-secondary f-s-9 f-w-700">Not Started</span>
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
                                                    class="ti ti-circle-filled me-2 f-s-6"></i> Initial setup </span>
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
                                                <i class="ti ti-circle-filled me-2 f-s-6"></i> Keyword analysis ongoing
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
                        <li class="page-item disabled"><a class="page-link b-r-left" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>

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

@endsection
