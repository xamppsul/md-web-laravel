@extends('layout.master')
@section('title', 'Elfinder')
@section('css')
    <!-- elFinder CSS + JS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/theme.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css">
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
                        <div id="elfinder"></div>
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
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <!-- elfinder js -->
    <script src="{{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>

    <!-- elfinder -->
    <script type="text/javascript">
        $(document).ready(function() {
            var csrf_token = '{{ csrf_token() }}';
            $('#elfinder').elfinder({
                //call route elfinder
                url: '{{ url('elfinder/connector') }}',
                customHeaders: {
                    'X-CSRF-TOKEN': csrf_token
                },
            });
        });
    </script>
@endsection
