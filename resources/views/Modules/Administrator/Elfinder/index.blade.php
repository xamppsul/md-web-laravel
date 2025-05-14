@extends('layout.master')
@section('title', 'Elfinder')
@section('css')
    <!-- flatpickr css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/datepikar/flatpickr.min.css') }}">
@endsection
@section('main-content')
    <div class="container-fluid">

        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12 ">
                <h4 class="main-title">Elfinder</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a class="f-s-14 f-w-500" href="#">
                            <span>
                                <i class="ph-duotone  ph-cardholder f-s-16"></i> Data
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="{{ route('admin.elfinder.index') }}">Show</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb end -->

        <!-- Form Validation start -->
        <div class="row ">
            <!-- Tooltips start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column gap-2">
                    </div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Validation end -->

    </div>
@endsection

@section('script')
    <!--customizer-->
    <div id="customizer"></div>

    <!--js-->
    <script src="{{ asset('assets/js/formvalidation.js') }}"></script>

    <!-- flatpickr js-->
    <script src="{{ asset('assets/vendor/datepikar/flatpickr.js') }}"></script>

    <!--datepicker-->
    <script src="{{ asset('assets/js/date_picker.js') }}"></script>
@endsection
