@section('title', 'Login')
@include('layout.head')

@include('layout.css')

<body>
    <div class="app-wrapper d-block">
        <div class="">
            <!-- Body main section starts -->
            <main class="w-100 p-0">
                <!-- Login to your Account start -->
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-12 p-0">
                            <div class="login-form-container">
                                <div class="mb-4">
                                    <a class="logo d-inline-block" href="{{ route('user.view.login') }}">
                                        <img src="{{ asset('../assets/images/logo/umk.png') }}" width="100"
                                            alt="#">
                                    </a>
                                </div>
                                <div class="form_container">

                                    <form class="app-form" action="{{ route('user.do.login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3 text-center">
                                            <h3>MD Febi UMK</h3>
                                            <p class="f-s-12 text-secondary">Get started with our app, just login with
                                                email and password.</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                placeholder="please enter email" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <a href="{{ route('user.view.login') }}"
                                                class="link-primary float-end">Forgot Password ?</a>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="please enter password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-2 form-check">
                                            {{-- <input type="checkbox" class="form-check-input" id="formCheck1">
                                            <label class="form-check-label" for="formCheck1">remember me</label> --}}
                                        </div>
                                        <div>
                                            <button class="btn btn-primary w-100">Login</button>
                                        </div>
                                        {{-- <div class="app-divider-v justify-content-center">
                                            <p>OR</p>
                                        </div> --}}
                                        {{-- <div class="mb-3">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-primary icon-btn b-r-5 m-1"><i
                                                        class="ti ti-brand-facebook text-white"></i></button>
                                                <button type="button" class="btn btn-danger icon-btn b-r-5 m-1"><i
                                                        class="ti ti-brand-google text-white"></i></button>
                                                <button type="button" class="btn btn-dark icon-btn b-r-5 m-1"><i
                                                        class="ti ti-brand-github text-white"></i></button>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Login to your Account end -->
            </main>
            <!-- Body main section ends -->
        </div>
    </div>

</body>
@section('script')

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
@endsection
