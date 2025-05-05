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
                                            <a data-bs-toggle="modal" class="link-primary float-end"
                                                data-bs-target="#exampleModalScrollable">Forgot Password ?</a>
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
            <!-- scrollable-modal-start -->
            <div aria-hidden="true" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
                id="exampleModalScrollable" tabindex="-1">
                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalToggleLabel3">Scroll Modal</h5>
                            <button aria-label="Close" class="btn-close m-0 fs-5" data-bs-dismiss="modal"
                                type="button"></button>
                        </div>
                        <div class="modal-body h-90">
                            <p><i class="ti ti-chevron-right text-secondary f-w-600"></i> However, reviewers
                                tend to
                                be distracted by comprehensible content, say, a random text copied from a
                                newspaper or
                                the internet. The are likely to focus on the text, disregarding the layout
                                and its
                                elements</p>


                            <p><i class="ti ti-chevron-right text-secondary f-w-600"></i> It was found by
                                Richard McClintock, a philologist, director of publications at
                                Hampden-Sydney College in Virginia; he searched for citings of consectetur
                                in classical Latin literature, a term of remarkably low frequency in that
                                literary corpus.</p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light-primary" type="button">Save changes</button>
                            <button class="btn btn-light-secondary" data-bs-dismiss="modal" type="button">Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- scrollable-modal-end -->
        </div>
    </div>

</body>
@include('layout.script')
