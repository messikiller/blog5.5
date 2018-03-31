<div id="header">
    <div class="header-bg">
        <div class="header-logo-container">
            <img src="{{ asset('/images/header-logo.jpg') }}" alt="logo" class="header-logo">
            <div class="header-motto">
                <div class="header-motto-text">折而不挠，终不为下</div>
                <div class="header-motto-divider"></div>
                <div class="header-motto-text">welcome to messikiller's home</div>
            </div>
        </div>
    </div>
    <div style="height: 55px;" v-show="sticky"></div>
    <div class="header-navbar" :class="{'sticky-nav': sticky}">
        <ul class="nav-list">
            <li
                @if (empty($active_cate_pid))
                    class="active"
                @endif
            ><a href="{{ route('home.index') }}">home</a></li>
            @foreach ($navCates as $cate)
                @if ($cate->pid)
                    @continue;
                @endif
                <li
                    @if (isset($active_cate_pid) && $active_cate_pid == $cate->id)
                        class="active"
                    @endif
                >
                    <a href="javascript:void(0);">
                        {{ $cate->title }}
                        @if ($cate->children->count())
                            &ensp;&ensp;<i class="fa fa-angle-left"></i>
                        @endif
                    </a>
                        <ul class="children">
                            @foreach ($cate->children as $child)
                                <li><a href="{{ route('home.index', ['filter_cate' => $child->id]) }}">{{ $child->title }}</a></li>
                            @endforeach
                        </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
