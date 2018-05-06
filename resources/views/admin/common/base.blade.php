
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>messikiller's blog</title>
<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
@yield('style')
</head>
<body>
<div id="app" class="layout">

    <Row>
        <i-col span="24">
            <div class="layout-breadcrumb">
                @yield('breadcrumb')
            </div>
        </i-col>
    </Row>

    <Row>
        <i-col span="24">
            <div class="layout-content" id="main-content">
                <div class="layout-content-main">
                    @yield('main-content')
                </div>
            </div>
            <div class="layout-copy">
                Design & code by messikiller
            </div>
        </i-col>
    </Row>

</div>

<script src="{{ mix('js/admin.js') }}"></script>
@yield('script')
</body>
</html>
