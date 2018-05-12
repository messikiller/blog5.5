<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
<style>
html, body, #app{
    height: 100%;
}

#app {
    display: flex;
    justify-content: center;
    align-items: center;
}

body {
    margin: 0;
    background-image: url('/images/login-bg.jpg');
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
}

.login-header {
    text-align: center;
    margin-bottom: 30px;
}

.avatar {
    height: 60px;
    border-radius: 50%;
}

.login-panel {
    padding: 15px 30px;
    width: 360px;
}
</style>
</head>
<body>

<div id="app">

<div class="panel panel-default login-panel">
    <div class="panel-body">
        <div class="login-header">
            <img src="{{ asset('images/header-logo.jpg') }}" alt="logo" class="avatar">
        </div>
        <div>
            <form class="form-horizontal" method="post" action="{{ route('admin.auth.login') }}" ref="dataForm" @keydown.enter="clickSubmitBtn">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input type="text" class="form-control login-input" name="username" autofocus autocomplete="off" placeholder="username" style="padding-right: 10px; padding-left: 40px;">
                    <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true" style="left: 5px;"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control login-input" name="password" autocomplete="off" placeholder="password" style="padding-right: 10px; padding-left: 40px;">
                    <span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true" style="left: 5px;"></span>
                </div>
                <div class="form-group has-feedback">
                    <a href="javascript:void(0)" @click="clickSubmitBtn" class="btn btn-primary btn-block">登录</a>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

<script src="{{ mix('js/admin.js') }}" type="text/javascript"></script>
<script type="text/javascript">
new Vue({
    el: '#app',
    data: {

    },
    methods: {
        clickSubmitBtn: function () {
            this.$refs.dataForm.submit();
        }
    }
});
</script>
</body>
</html>
