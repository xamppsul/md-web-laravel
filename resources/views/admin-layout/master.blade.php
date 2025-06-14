<!DOCTYPE html>
<html lang="en">

<head>
    <!-- All meta and title start-->
    @include('admin-layout.head')
    <!-- meta and title end-->

    <!-- css start-->
    @include('admin-layout.css')
    <!-- css end-->
</head>

<body>
    <!-- Loader start-->
    <div class="app-wrapper">
        <div class="loader-wrapper">
            <div class="loader_16"></div>
        </div>
        <!-- Loader end-->

        <!-- Menu Navigation start -->
        @include('admin-layout.sidebar')
        <!-- Menu Navigation end -->


        <div class="app-content">
            <!-- Header Section start -->
            @include('admin-layout.header', ['profile' => !empty($profile) ? $profile : ''])
            <!-- Header Section end -->

            <!-- Main Section start -->
            <main>
                {{-- main body content --}}
                @yield('main-content')
            </main>
            <!-- Main Section end -->
        </div>

        <!-- tap on top -->
        <div class="go-top">
            <span class="progress-value">
                <i class="ti ti-chevron-up"></i>
            </span>
        </div>

        <!-- Footer Section start -->
        @include('admin-layout.footer')
        <!-- Footer Section end -->
    </div>
</body>

<!--customizer-->
<div id="customizer"></div>

<!-- scripts start-->
@include('admin-layout.script')
<!-- scripts end-->

</html>
