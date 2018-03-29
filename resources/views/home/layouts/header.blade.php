<div id="header">
    <div class="header-bg"></div>
    <div class="header-navbar">
        <ul class="nav-list">
            <li class="active"><a href="#">home</a></li>
            @foreach ($cates as $cate)
                @if ($cate->pid)
                    @continue;
                @endif
                <li>
                    <a href="#">
                        {{ $cate->title }}
                        @if ($cate->children->count())
                            &ensp;&ensp;<i class="fa fa-angle-left"></i>
                        @endif
                    </a>
                        <ul class="children">
                            @foreach ($cate->children as $child)
                                <li><a href="#">{{ $child->title }}</a></li>
                            @endforeach
                        </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
