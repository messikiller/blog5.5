<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>messikiller's blog</title>
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

#main {
  flex: auto;
  display: flex;
  flex-direction: column;
  overflow-y: auto;
}

#header {
    min-height: 60px;

    background-color: red;
}

#content {
  flex: auto;
  height: 100%;
}

#footer {
    min-height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
</head>
<body>
<div id="app">

    <div id="layout">
        <div id="aside" v-show="showLeft">
            <i-menu active-name="1" theme="dark" width="auto" accordion>
                <div>
                    <Icon type="paper-airplane" size="22"></Icon>&ensp;blog
                </div>

                @foreach (config('navtree') as $menu)
                    <Submenu name="{{ $loop->iteration }}">
                        <template slot="title">
                            <Icon type="{{ $menu['icon'] }}" size="20"></Icon>
                            {{ $menu['title'] }}
                        </template>
                            @foreach ($menu['sub'] as $subtitle => $subpath)
                                <a href="{{ route($subpath) }}" target="sonoscape">
                                    <Menu-item name="{{ $loop->parent->iteration }}-{{ $loop->iteration }}">{{ $subtitle }}</Menu-item>
                                </a>
                            @endforeach
                    </Submenu>
                @endforeach

            </i-menu>
        </div>
        <div id="main">
            <div id="header">
                <i-menu mode="horizontal">
                    <Row>
                        <i-col span="4">
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
                        </i-col>

                        <i-col span="20">
                            <Row type="flex" justify="end">
                                <i-col span="8">
                                    <div >
                                        <Submenu name="1">
                                            <template slot="title">
                                                <Icon type="person" size="16"></Icon>欢迎登陆，administrator
                                            </template>
                                            <a href="" target="sonoscape"><Menu-item name="1-1">个人中心</Menu-item></a>
                                            <a href="" target="sonoscape"><Menu-item name="1-2">重置密码</Menu-item></a>
                                            <a href=""><Menu-item name="1-3">退出系统</Menu-item></a>
                                        </Submenu>
                                    </div>
                                    <i-button
                                        type="info"
                                        shape="circle"
                                        size="small"
                                        icon="arrow-left-a"
                                        onClick="window.sonoscape.window.history.back()"
                                    >
                                        后退
                                    </i-button>
                                </i-col>
                            </Row>
                        </i-col>
                    </Row>
                </i-menu>
            </div>
            <div id="content">
                <iframe name="blog"
                    src="https://www.baidu.com"
                    width="100%"
                    height="100%"
                    frameborder="no"
                    border="0"
                    marginwidth="0"
                    marginheight="0"
                    scrolling="yes"
                    allowtransparency="yes">
                </iframe>
            </div>
            <div id="footer">
                Design & Code By messikiller
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
