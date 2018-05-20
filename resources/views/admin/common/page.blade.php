
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>messikiller's blog</title>
<link rel="stylesheet" href="{{ mix('css/admin.css') }}">
<style>
html, body, #app {
    height: 100%;
}

#app {
    background-color: #f5f7f9;
    display: flex;
    flex-direction: column;
}

#app .flex-breadcrumb {
    padding: 15px 20px 0 20px;
}

#app .flex-content {
    flex: 1;
    margin: 15px 15px 0 15px;
    padding: 25px;
    background-color: #ffffff;
    border: 1px solid #e3e8ee;
}

#app .flex-footer {
    text-align: center;
    line-height: 50px;
    color: #a2a2a2;
}
</style>
@yield('style')
</head>
<body>
<div id="app">
    <div class="flex-breadcrumb">
        <Row>
            <i-col span="24">
                <div>
                    @yield('breadcrumb')
                </div>
            </i-col>
        </Row>
    </div>
    <div class="flex-content">
        @yield('content')
    </div>
    <div class="flex-footer">
        Design & code by messikiller
    </div>
</div>

<script src="{{ mix('js/admin.js') }}"></script>
@yield('script')
<script type="text/javascript">
var vm = new Vue(Object.assign({
    el: '#app',
    methods: {
        handlePageChange: function (page) {
            var url = window.location.href;
            if (url.indexOf('?') === -1) {
                url += '?page=1';
            } else if (url.indexOf('?') + 1 == url.length) {
                url += 'page=1';
            } else if (url.indexOf('page=') === -1) {
                url += '&page=1';
            }

            window.location.href = url.replace(/page=\d+/, 'page='+page);
        }
    }
}, OPTION));
</script>
</body>
</html>
