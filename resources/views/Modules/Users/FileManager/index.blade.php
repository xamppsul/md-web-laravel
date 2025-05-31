@extends('user-layout.master')
@section('title', 'File Manager')
@section('css')
    <!-- elFinder CSS + JS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/theme.css') }}">
@endsection

@php
    $lang = app()->getLocale();
@endphp

@section('main-content')
    <div class="container-fluid">

        <!-- Breadcrumb start -->
        <div class="row m-1">
            <div class="col-12 ">
                <h4 class="main-title">FileManager</h4>
                <ul class="app-line-breadcrumbs mb-3">
                    <li class="">
                        <a class="f-s-14 f-w-500" href="#">
                            <span>
                                <i class="ph-duotone  ph-cardholder f-s-16"></i> Data
                            </span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="f-s-14 f-w-500" href="{{ route('staffdosen.FileManager.index') }}">Show</a>
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
    @if ($lang)
        <!-- elFinder translation (OPTIONAL) -->
        <script src="{{ asset('packages/barryvdh/elfinder/js/i18n/elfinder.' . $lang . '.js') }}"></script>
    @endif
    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
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
                soundPath: '{{ asset('packages/barryvdh/elfinder/sounds') }}',
            });
        });
    </script>
@endsection
