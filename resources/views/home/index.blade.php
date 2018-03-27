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

                    <div id="boxes">

                        @foreach ($articles as $article)
                        <div class="box">
                            <div class="box-header">
                                <a href="#">{{ $article->title }}</a>
                            </div>
                            <hr class="box-divider">
                            <div class="box-body">
                                {!! $article->summary !!}
                            </div>
                            <div class="box-footer">
                                <div class="box-footer-metas">
                                    <span class="footer-meta"><i class="fa fa-calendar"></i>&nbsp;{{ date('Y-m-d', $article->published_at) }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="footer-meta"><i class="fa fa-eye"></i>&nbsp;{{ $article->read_num }}</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="footer-meta"><i class="fa fa-list-ul"></i>&nbsp;PHP</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="footer-meta footer-meta-tag"><i class="fa fa-tag"></i>&nbsp;MysQL</span>
                                    <span class="footer-meta footer-meta-tag"><i class="fa fa-tag"></i>&nbsp;Linux</span>
                                    <span class="footer-meta footer-meta-tag"><i class="fa fa-tag"></i>&nbsp;MysQL</span>
                                </div>
                                <div class="box-footer-btn">
                                    <a href="#" class="btn btn-primary btn-more"><i class="fa fa-search"></i>&nbsp;阅读全文</a>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>

                </div>

                <div class="col-md-4">

                    <div id="sider">

                        <div class="sider-box">
                            <div class="sider-box-title">
                                <i class="fa fa-bookmark"></i>
                                &nbsp;微语
                            </div>
                            <div class="sider-box-divider"></div>
                            <div class="sider-box-content">
                                <div class="sider-motto">
                                    一万年来谁著史，八千里外觅封侯
                                </div>
                                <div class="sider-submotto">
                                    —— 李鸿章
                                </div>
                            </div>
                        </div>

                        <div class="sider-box">
                            <div class="sider-box-title">
                                <i class="fa fa-bookmark"></i>
                                &nbsp;微语
                            </div>
                            <div class="sider-box-divider"></div>
                            <div class="sider-box-content">
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                            </div>
                        </div>

                        <div class="sider-box">
                            <div class="sider-box-title">
                                <i class="fa fa-bookmark"></i>
                                &nbsp;微语
                            </div>
                            <div class="sider-box-divider"></div>
                            <div class="sider-box-content">
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                                <a href="#" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;Redis(5)</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    </div>
</div>
<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
