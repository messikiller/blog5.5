<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>messikiller's blog | 折而不挠，终不为下</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" media="screen"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div id="app">

    @include('home.layouts.header')

    <div id="body">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    @yield('content')

                </div>

                <div class="col-md-4">

                    @include('home.layouts.sider')

                </div>

            </div>
        </div>
    </div>

    @include('home.layouts.footer')

    </div>
</div>
<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

@yield('script')

</body>
</html>
