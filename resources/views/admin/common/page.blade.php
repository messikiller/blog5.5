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
html{
    min-height: 100%;
    width: 100%;
    display: flex;
}

body{
    flex: 1;
    width: 100%;
}

#app {
    height: 100%;
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
function layer_success_reload()
{
    layer.closeAll();
    layer.alert('操作成功！', {
      icon: 1
    }, function () {
        window.location.reload(true);
    })
}
var vm = new Vue(__.merge({
    el: '#app',
    methods: {
        handlePageChange: function (page) {
            window.location.href = URL().removeSearch('page').addSearch('page', page).href();
        },
        handleSubmitFilter: function () {
            var _filter = this.filter;
            var _url = URL(URL().search('').href());
            for (var i in _filter) {
                if (_filter.hasOwnProperty(i) && _filter[i] != '') {
                    var _param = 'filter_' + i;
                    _url.removeSearch(_param).addSearch(_param, _filter[i]);
                }
            }
            window.location.href = _url.href();
        },
        handleResetFilter: function () {
            var _filter = this.filter;
            for (var i in _filter) {
                if (_filter.hasOwnProperty(i)) {
                    _filter[i] = '';
                }
            }
            this.handleSubmitFilter();
        }
    }
}, OPTION));
</script>
</body>
</html>
