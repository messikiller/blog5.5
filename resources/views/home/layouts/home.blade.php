<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>blog</title>
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
<script type="text/javascript">
var vm = new Vue({
    el: '#app',
    mounted () {
      window.addEventListener('scroll', this.handleScroll);
    },
    data: {
        sticky: false
    },
    methods: {
        handleScroll: function (event) {
            this.sticky = document.documentElement.scrollTop >= 300 ? true : false;
        }
    }
});
</script>
</body>
</html>
