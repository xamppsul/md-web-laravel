@section('title', 'Administrator Login')
@include('layout.head')

@include('layout.css')

<body class="sign-in-bg">
    <div class="app-wrapper d-block">
        @session('success')
            <div class="flash-data-success" data-flashdata-success="{{ $value }}"></div>
        @endsession
        @session('error')
            <div class="flash-data-error" data-flashdata-error="{{ $value }}"></div>
        @endsession
        <div class="main-container">
            <!-- Body main section starts -->
            <div class="container">
                <div class="row sign-in-content-bg">
                    <div class="col-lg-6 image-contentbox d-none d-lg-block">
                        <div class="form-container ">
                            <div class="signup-content mt-4">
                                <span>
                                    <img src="{{ asset('assets/images/logo/umk.png') }}" alt=""
                                        class="img-fluid">
                                </span>
                            </div>

                            <div class="signup-bg-img">
                                <img src="{{ asset('assets/images/login/04.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6 form-contentbox">
                        <div class="form-container">
                            <form class="app-form" action="{{ route('admin.do.login') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-5 text-center text-lg-start">
                                            <h2 class="text-primary f-w-600">Welcome To Login Administrator! </h2>
                                            <p>Sign in with your username or email</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="umail" class="form-label">Username Or Email</label>
                                            <input type="text"
                                                class="form-control @error('umail') is-invalid @enderror" name="umail"
                                                value="{{ old('umail') }}" autocomplete="umail" autofocus
                                                placeholder="Enter Your Email Or Username" id="username">
                                            @error('umail')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" value="{{ old('password') }}" autocomplete="password"
                                                placeholder="Enter Your Password" id="password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check mb-3">
                                            {{-- <input class="form-check-input" type="checkbox" value=""
                                                id="checkDefault">
                                            <label class="form-check-label text-secondary" for="checkDefault">
                                                Remember me
                                            </label> --}}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <button type="submit" role="button" class="btn btn-primary w-100">Sign
                                                In</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        {{-- <div class="text-center text-lg-start">
                                            Don't Have Your Account yet? <a href="{{ route('sign_up') }}"
                                                class="link-primary text-decoration-underline"> Sign up</a>
                                        </div> --}}
                                    </div>
                                    <div class="app-divider-v justify-content-center">
                                        {{-- <p>Or sign in with</p> --}}
                                    </div>
                                    <div class="col-12">
                                        {{-- <div class="text-center">
                                            <button type="button" class="btn btn-facebook icon-btn b-r-22 m-1"><i
                                                    class="ti ti-brand-facebook text-white"></i></button>
                                            <button type="button" class="btn btn-gmail icon-btn b-r-22 m-1"><i
                                                    class="ti ti-brand-google text-white"></i></button>
                                            <button type="button" class="btn btn-github icon-btn b-r-22 m-1"><i
                                                    class="ti ti-brand-github text-white"></i></button>
                                        </div> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Body main section ends -->
        </div>
    </div>


</body>
@include('layout.script')
