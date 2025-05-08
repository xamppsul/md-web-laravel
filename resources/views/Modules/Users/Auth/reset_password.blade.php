@section('title', 'Password Reset Account')
@include('layout.head')

@include('layout.css')

<body>
    <div class="app-wrapper d-block">
        <div class="">
            <!-- Body main section starts -->
            <main class="w-100 p-0">
                <div class="container-fluid">
                    <!-- Reset Your Password start -->
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="login-form-container">
                                <div class="mb-4">
                                    <a class="logo d-inline-block" href="{{ route('user.view.login') }}">
                                        <img src="{{ asset('assets/images/logo/umk.png') }}" width="100"
                                            alt="#">
                                    </a>
                                </div>
                                <div class="form_container">
                                    <form class="app-form" action="{{ route('user.do.reset.password') }}"
                                        method="POST">
                                        @csrf
                                        <div class="mb-3 text-center">
                                            <h3>Reset Your Password</h3>
                                            <p class="f-s-12 text-secondary">Create a new password and sign in to user
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" hidden>Token</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Email"
                                                value="{{ $token }}" name="token_reset_password" hidden>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Your Email" value="{{ $email }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New password</label>
                                            <input type="password"
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                name="new_password" placeholder="Enter New Password">
                                            @error('new_password')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password"
                                                class="form-control @error('retype_password') is-invalid @enderror"
                                                name="retype_password" placeholder="Retype New Password">
                                            @error('retype_password')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Reset Your Password end -->
                </div>
            </main>
            <!-- Body main section ends -->
        </div>
    </div>
</body>

@section('script')
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
@endsection
