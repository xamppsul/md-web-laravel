@section('title', 'Not Found')
@include('layout.head')

@include('layout.css')

<div class="error-container p-0">
    <div class="container">
        <div>
            <div>
                <img src="{{ asset('../assets/images/background/error-404.png') }}" class="img-fluid" alt=""
                    width="50%">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 ">
                        <p class="text-center text-secondary f-w-500">You search page is not found back to home.</p>
                    </div>
                </div>
            </div>
            <a role="button" href="{{ route('user.view.login') }}" class="btn btn-lg btn-primary"><i
                    class="ti ti-home"></i> Back
                To Home</a>
        </div>
    </div>
</div>
@section('script')
    <!--jquery-->
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
@endsection
