@extends('errors.layouts.master')
@section('title', __('Page Expired | MD Febi UMK'))

@section('content')
    <div class='universal-nav'>
        <img alt="freeCodeCamp.org" src="{{ asset('assets/images/logo/umk.png') }}">
    </div>
    <div class="error-middle">
        <h2>
            429 | Too Page Expired.
        </h2>

        <br />

        <h3>
            We are getting too Page Expireds from your IP address please back to home page and try again.
        </h3>

        <h3>
            This should be resolved shortly.
        </h3>
        <h3>
            Please try again in while. If you keep seeing this error, please <a href="https://google.com" target="_blank"
                rel="noopener">find google</a>.
        </h3>

    </div>
@endsection
