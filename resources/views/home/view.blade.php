@extends('home.layouts.home')

@section('content')
<div id="content">

    <div class="content-header">
        <div class="content-title">{!! $article->title !!}</div>
        <div class="summary-container">
            <div class="summary-metas">
                <span><i class="fa fa-calendar"></i>&nbsp;2017-12-28</span>
                <span>&ensp;|&ensp;</span>
                <span><i class="fa fa-eye"></i>&nbsp;234</span>
                <span>&ensp;|&ensp;</span>
                <span><i class="fa fa-list-ul"></i>&nbsp;MySQL</span>
                <span>&ensp;|&ensp;</span>
                <span class="summary-tag"><i class="fa fa-tag"></i>&nbsp;PHP</span>
                <span class="summary-tag"><i class="fa fa-tag"></i>&nbsp;Mysql</span>
                <span class="summary-tag"><i class="fa fa-tag"></i>&nbsp;Linux</span>
            </div>
            <div class="summary-divider"></div>
            <div class="summary-content">
                {!! $article->summary !!}
            </div>
        </div>
    </div>

    <div class="content-main">

        {!! $article->content !!}

    </div>

</div>
@endsection

@section('script')
<script type="text/javascript">
var vm = new Vue({
    el: '#app',
    mounted () {
      window.addEventListener('scroll', this.handleScroll);
      hljs.initHighlightingOnLoad();
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
@endsection
