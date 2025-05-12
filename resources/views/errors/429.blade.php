@extends('errors.layouts.master')
@section('title', __('Many Request | MD Febi UMK'))

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/umk.png') }}" type="image/x-icon">
        <title>Document</title>
    </head>

    <body>
        <div class='universal-nav'>
            <img alt="freeCodeCamp.org" src="{{ asset('assets/images/logo/umk.png') }}">
        </div>
        <div class="error-middle">
            <h2>
                429 | Too many requests.
            </h2>

            <br />

            <h3>
                We are getting too many requests from your IP address and temporarily blocking access to this part of
                MD Project
            </h3>

            <h3>
                This should be resolved shortly.
            </h3>
            <h3>
                Please try again in while. If you keep seeing this error, please <a href="https://google.com"
                    target="_blank" rel="noopener">find google</a>.
            </h3>

        </div>

    </body>

    </html>
@endsection
