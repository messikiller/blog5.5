@extends('home.layouts.home')

@section('content')
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
                <span class="footer-meta"><i class="fa fa-list-ul"></i>&nbsp;{{ $article->cate->title }}</span>
                <span>&nbsp;/&nbsp;</span>
                @if ($article->tags->count())
                    @foreach ($article->tags as $tag)
                        <span class="footer-meta footer-meta-tag"><i class="fa fa-tag"></i>&nbsp;{{ $tag->title }}</span>
                    @endforeach
                @else
                    无标签
                @endif
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


                @if ($articles->currentPage() == $articles->firstItem())
                    <li class="disabled">
                      <span aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $articles->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                @foreach (range(1, $articles->lastPage()) as $page)
                    @if ($page == $articles->currentPage())
                        <li class="active">
                            <span>{{ $page }} <span class="sr-only">(current)</span></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $articles->url($page) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach

                @if ($articles->currentPage() == $articles->lastPage())
                    <li class="disabled">
                      <span aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $articles->nextPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @endif

          </ul>
        </nav>
    </div>
</div>

@endsection
