@extends('admin.common.page')

@section('breadcrumb')
<Breadcrumb>
        <Breadcrumb-Item>友链管理</Breadcrumb-Item>
        <Breadcrumb-Item>友链列表</Breadcrumb-Item>
    </Breadcrumb>
@endsection

@section('content')
<i-table border :columns="columns" :data="table"></i-table>
<div style="height: 15px;"></div>
<Page :total="{{ $list->total() }}"
      :page-size="{{ $list->perPage() }}"
      :current="{{ $list->currentPage() }}"
      @on-change="handlePageChange"
      show-elevator>
 </Page>
@endsection

@section('script')
<script type="text/javascript">
var OPTION = {
    data: {
        columns: [
            {title: '#', key: 'index'},
            {title: '名称', key: 'title'},
            {title: '链接', key: 'link'},
            {title: '创建时间', key: 'created_at'}
        ],
        table: [
            @foreach ($list as $item)
                {
                    'index': '{{ $list->perPage() * ($list->currentPage() - 1) + $loop->iteration }}',
                    'title': '{{ $item->title }}',
                    'link': '{!! $item->link !!}',
                    'created_at': '{{ empty($item->created_at) ? '-' : date('Y-m-d', $item->created_at) }}',
                }
                @if (! $loop->last)
                ,
                @endif
            @endforeach
        ]
    },
    method: {

    }
};
</script>
@endsection
