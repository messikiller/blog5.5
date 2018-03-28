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

                        <div id="pager">
                            <nav aria-label="Page navigation">
                              <ul class="pagination">
                                <li>
                                  <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li class="active"><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
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

    <div id="footer">

        <div class="row">
            <div class="col-md-4">
                <div class="footer-box">
                    <div class="footer-box-title">
                        <i class="fa fa-comments-o"></i>
                        &nbsp;社交账号
                    </div>
                    <div class="footer-box-divider"></div>
                    <div class="footer-box-content">
                        <a href="#" class="footer-social-link github-link">
                            <i class="fa fa-github fa-5x"></i>
                            <span class="footer-social-text">GitHub</span>
                        </a>
                        <a href="#" class="footer-social-link weibo-link">
                            <i class="fa fa-weibo fa-5x"></i>
                            <span class="footer-social-text">GitHub</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-box">
                    <div class="footer-box-title">
                        <i class="fa fa-link"></i>
                        &nbsp;友情链接
                    </div>
                    <div class="footer-box-divider"></div>
                    <div class="footer-box-content">
                        <a href="#" class="footer-friend-link">Sadscreeper</a>
                        <a href="#" class="footer-friend-link">徐立春</a>
                        <a href="#" class="footer-friend-link">Falter UI</a>
                        <a href="#" class="footer-friend-link">SQ热r sd</a>
                        <a href="#" class="footer-friend-link">Sadscreeper</a>
                        <a href="#" class="footer-friend-link">徐立春</a>
                        <a href="#" class="footer-friend-link">Falter UI</a>
                        <a href="#" class="footer-friend-link">SQ热r sd</a>
                        <a href="#" class="footer-friend-link">Sadscreeper</a>
                        <a href="#" class="footer-friend-link">徐立春</a>
                        <a href="#" class="footer-friend-link">Falter UI</a>
                        <a href="#" class="footer-friend-link">SQ热r sd</a>
                        <a href="#" class="footer-friend-link">Sadscreeper</a>
                        <a href="#" class="footer-friend-link">徐立春</a>
                        <a href="#" class="footer-friend-link">Falter UI</a>
                        <a href="#" class="footer-friend-link">SQ热r sd</a>
                        <a href="#" class="footer-friend-link">Sadscreeper</a>
                        <a href="#" class="footer-friend-link">徐立春</a>
                        <a href="#" class="footer-friend-link">Falter UI</a>
                        <a href="#" class="footer-friend-link">SQ热r sd</a>
                        <a href="#" class="footer-friend-link">Sadscreeper</a>
                        <a href="#" class="footer-friend-link">徐立春</a>
                        <a href="#" class="footer-friend-link">Falter UI</a>
                        <a href="#" class="footer-friend-link">SQ热r sd</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-box">
                    <div class="footer-box-title">
                        <i class="fa fa-thumbs-o-up"></i>
                        &nbsp;打赏支持
                        <small class="pull-right">拿出手机扫一扫，支持一下博主</small>
                    </div>
                    <div class="footer-box-divider"></div>
                    <div class="footer-box-content text-center">
                        <div class="donation-img">
                            <img src="{{ asset('images/donate-wechat.jpg') }}" alt="微信扫一扫" class="img-responsive ">
                            <div class="text-center donation-title">
                                微信
                            </div>
                        </div>
                        <div class="donation-img">
                            <img src="{{ asset('images/donate-alipay.jpg') }}" alt="微信扫一扫" class="img-responsive">
                            <div class="text-center donation-title">
                                支付宝
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="copyright-row">
                Copyright &copy; 2018. messikiller's blog. Powered by Laravel 5.5
            </div>
            <div class="copyright-row">
                <img src="{{ asset('images/countrylogo.png') }}" alt="country" class="country">
                <a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备15117370号</a>
            </div>
        </div>
    </div>


    </div>
</div>
<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
