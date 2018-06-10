@extends('home.layouts.home')

@section('content')
<div id="content">

    <div class="content-header">
        <div class="content-title">{!! $article->title !!}</div>
        <div class="summary-container">
            <div class="summary-metas">
                <span><i class="fa fa-calendar"></i>&nbsp;{{ date('Y-m-d', $article->published_at) }}</span>
                <span>&ensp;|&ensp;</span>
                <span><i class="fa fa-eye"></i>&nbsp;{{ $article->read_num }}</span>
                <span>&ensp;|&ensp;</span>
                <span><i class="fa fa-list-ul"></i>&nbsp;MySQL</span>
                @if ($article->tags->count() > 0)
                    <span>&ensp;|&ensp;</span>
                    @foreach ($article->tags as $tag)
                        <span class="summary-tag"><i class="fa fa-tag"></i>&nbsp;{{ $tag->title }}</span>
                    @endforeach
                @endif
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

    <div class="content-footer-divider"></div>

    <div class="content-footer-nav">
        <a class="content-nav-btn content-nav-left"
            href="{{ empty($previous) ? 'javascript:void(0)' : route('home.view', $previous->id) }}"
            data-toggle="tooltip"
            data-placement="top"
            title="{{ empty($previous) ? '无' : $previous->title }}"
        >
                <i class="fa fa-chevron-left"></i>&nbsp;
                上一篇：{{ empty($previous) ? '无' : $previous->title }}
        </a>
        <a
            href="{{ empty($next) ? 'javascript:void(0)' : route('home.view', $next->id) }}"
            class="content-nav-btn content-nav-right"
            data-toggle="tooltip"
            data-placement="top"
            title="{{ empty($next) ? '无' : $next->title }}"
        >
                下一篇：{{ empty($next) ? '无' : $next->title }}
                &nbsp;<i class="fa fa-chevron-right"></i>
        </a>
    </div>

    <div class="content-copyright">
        本文链接：<a href="{{ route('home.view', $article->id) }}" target="_blank">{{ route('home.view', $article->id) }}</a>，欢迎转载，请注明来源<i class="fa fa-creative-commons"></i>&nbsp;<a href="https://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh" target="_blank">创意共享3.0许可证</a>
    </div>

    <div class="content-share">
        <span><i class="fa fa-share-alt"></i>&nbsp;分享：</span>
        <span class="social-share"
            data-url="{{ route('home.view', $article->id) }}"
            data-title="{{ $article->title }}"
            data-description="{{ $article->summary_original }}"
        ></span>
    </div>

</div>

<!-- @include('home.layouts.comment') -->

@endsection

@section('script')
<script type="text/javascript">
var vm = new Vue({
    el: '#app',
    mounted () {
      window.addEventListener('scroll', this.handleScroll);
      hljs.initHighlightingOnLoad();
      $('[data-toggle="tooltip"]').tooltip();
      $('#content img').on('click', function () {
          $.fancybox.open({
            	src  : $(this).attr('src'),
            	type : 'image'
            });
      });
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
