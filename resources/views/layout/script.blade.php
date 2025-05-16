    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Simple bar js-->
    <script src="{{ asset('assets/vendor/simplebar/simplebar.js') }}"></script>

    <!-- phosphor js -->
    <script src="{{ asset('assets/vendor/phosphor/phosphor.js') }}"></script>
    <!-- prism js-->
    <script src="{{ asset('assets/vendor/prism/prism.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    <!-- Toatify js-->
    <script src="{{ asset('assets/vendor/notifications/toastify-js.js') }}"></script>

    <!-- sweetalert js-->
    <script src="{{ asset('assets/vendor/sweetalert/sweetalert.js') }}"></script>

    <!-- js -->
    <script src="{{ asset('assets/js/sweet_alert.js') }}"></script>

    <!-- conf sweetalert -->
    <script src="{{ asset('assets/js/sweetalert.conf.js') }}"></script>

    @if (!Route::is('admin.view.login'))
        <!-- Customizer js-->
        <script src="{{ asset('assets/js/customizer.js') }}"></script>
    @endif

    @yield('script')
