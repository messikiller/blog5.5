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
            <i class="fa fa-list-ul"></i>
            &nbsp;分类
        </div>
        <div class="sider-box-divider"></div>
        <div class="sider-box-content">
            @foreach ($siderCates as $cate)
                <a href="{{ route('home.index', ['filter_cate' => $cate->id]) }}" class="sider-list-item"><i class="fa fa-angle-double-right"></i>&nbsp;{{ $cate->title }}（{{ $cate->articles_count }}）</a>
            @endforeach
        </div>
    </div>

    <div class="sider-box">
        <div class="sider-box-title">
            <i class="fa fa-folder-open"></i>
            &nbsp;归档
        </div>
        <div class="sider-box-divider"></div>
        <div class="sider-box-content">
            @foreach ($siderArchives as $month => $archive)
                <a href="{{ route('home.index', ['filter_archive' => $month]) }}" class="sider-list-item"><i class="fa fa-calendar"></i>&nbsp;{{ date('Y年m月', $month) }}（{{ $archive->count() }}）</a>
            @endforeach
        </div>
    </div>

    <div class="sider-box">
        <div class="sider-box-title">
            <i class="fa fa-folder-open"></i>
            &nbsp;标签云
        </div>
        <div class="sider-box-divider"></div>
        <div class="sider-box-content">
            @foreach ($siderTags as $tag)
                <a href="{{ route('home.index', ['filter_tag' => $tag->id]) }}"
                    class="btn sider-list-tag"
                    style="color: {{ $tag->color }};border-color: {{ $tag->color }};"
                    onmouseover="this.style.cssText='background-color: {{ $tag->color }};color: #ffffff;'"
                    onmouseout="this.style.cssText='color: {{ $tag->color }};border-color: {{ $tag->color }};'"
                >{{ $tag->title }}</a>
            @endforeach
        </div>
    </div>

</div>
