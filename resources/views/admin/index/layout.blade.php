<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>messikiller's blog</title>
<link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
<style>
html, body, #app {
    height: 100%;
    width: 100%;
}

#layout {
    height: 100%;
    width: 100%;
    display: flex;
}

#aside {
  flex: none;
  width: 200px;
  overflow-y: auto;
  display: block;
  background-color: #495060;
}

#aside .logo {
    color: #ffffff;
    background-color: #5c6371;
    text-align: center;
    padding: 30px 0;
}

#main {
  flex: auto;
  display: flex;
  flex-direction: column;
  overflow-y: auto;
}

#header {
    min-height: 60px;
    display: flex;
    align-items: center;
    border: 1px solid #dddee1;
}

.rotate {
    transform: rotate(90deg);
}

#content {
  flex: auto;
  height: 100%;
}
</style>
</head>
<body>
<div id="app">

    <div id="layout">
        <div id="aside" v-show="showLeft">
            <div class="logo">
                <Icon type="paper-airplane" size="28"></Icon>
            </div>
            <i-menu active-name="1" theme="dark" width="auto" accordion>

                @foreach (config('navtree') as $menu)
                    <Submenu name="{{ $loop->iteration }}">
                        <template slot="title">
                            <Icon type="{{ $menu['icon'] }}" size="20"></Icon>
                            {{ $menu['title'] }}
                        </template>
                            @foreach ($menu['sub'] as $subtitle => $subpath)
                                <a href="{{ route($subpath) }}" target="blog">
                                    <Menu-item name="{{ $loop->parent->iteration }}-{{ $loop->iteration }}">{{ $subtitle }}</Menu-item>
                                </a>
                            @endforeach
                    </Submenu>
                @endforeach

            </i-menu>
        </div>
        <div id="main">
            <div id="header">
                <div>
                    <i-button type="text" @click="toggleLeft" v-show="showLeft">
                        <Tooltip content="隐藏侧边栏" placement="right">
                            <Icon type="navicon" size="32"></Icon>
                        </Tooltip>
                    </i-button>
                    <i-button type="text" @click="toggleLeft" v-show="!showLeft">
                        <Tooltip content="展开侧边栏" placement="right">
                            <Icon type="navicon" size="32" class="rotate"></Icon>
                        </Tooltip>
                    </i-button>


                </div>
                <div style="flex: 1;">

                </div>
                <div style="margin-right: 20px;">
                    <i-Menu mode="horizontal" theme="light" style="height: auto;">
                        <Submenu name="1">
                            <template slot="title">
                                <Icon type="person"></Icon>
                                欢迎登录，administrator
                            </template>
                            <a href="{{ route('admin.auth.logout') }}"><Menu-Item name="1-1">退出系统</Menu-Item></a>
                        </Submenu>
                    </i-Menu>
                </div>
                <div style="margin-right: 40px;">
                    <i-button
                        type="info"
                        shape="circle"
                        size="small"
                        icon="arrow-left-a"
                        onClick="window.sonoscape.window.history.back()"
                    >
                        后退
                    </i-button>
                </div>
            </div>
            <div id="content">
                <iframe
                    name="blog"
                    src="{{ route('admin.index.welcome') }}"
                    width="100%"
                    height="100%"
                    frameborder="no"
                    border="0"
                    marginwidth="0"
                    marginheight="0"
                    scrolling="yes"
                    allowtransparency="yes"
                    style="display: block;">
                </iframe>
            </div>
        </div>
    </div>

</div>

<script src="{{ mix('js/admin.js') }}"></script>
<script>
var OPTION = {
    data () {
        return {
            spanRight: 21,
            showLeft: true
        }
    },
    methods: {
       toggleLeft () {
           if (this.showLeft) {
               this.showLeft  = false;
               this.spanRight = 24;
           } else {
               this.spanRight = 21;
               this.showLeft  = true;
           }
       }
   }
};
</script>
<script type="text/javascript">
var vm = new Vue(Object.assign({
    el: '#app'
}, OPTION));
</script>
</body>
</html>
