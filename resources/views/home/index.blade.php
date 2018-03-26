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

                        <div class="box">
                            <div class="box-header">
                                <a href="#">MySQL InnoDB 事务隔离级别理解</a>
                            </div>
                            <hr class="box-divider">
                            <div class="box-body">
                                <p>事务隔离级别分为：未提交读（Read Uncommitted，RU），提交读（Read Committed，RC），可重复读（Repeatable Read，RR）和串行化（Serializable）</p>
                            </div>
                            <div class="box-footer">
                                <div class="box-footer-metas">
                                    <span class="footer-meta"><i class="fa fa-calendar"></i>&nbsp;2017-12-23</span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span class="footer-meta"><i class="fa fa-eye"></i>&nbsp;25</span>
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

                    </div>

                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
<script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
