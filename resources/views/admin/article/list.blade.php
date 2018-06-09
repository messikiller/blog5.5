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
      show-total
      show-elevator>
 </Page>
@endsection

@section('script')
<script type="text/javascript">
var OPTION = {
    data: {
        columns: [
            {title: '#', key: 'index'},
            {title: '标题', key: 'title'},
            {title: '分类', key: 'cate_title'},
            {title: '阅读数', key: 'read_num'},
            {title: '是否隐藏', key: 'is_hidden_desc'},
            {title: '发布时间', key: 'published_at'},
            {title: '创建时间', key: 'created_at'},
            {title: '操作', key: 'action', render: (h, params) => {
                return h('div', [
                    h('Button', {
                        props: {
                            type: 'primary',
                            size: 'small'
                        },
                        style: {
                            marginRight: '5px'
                        },
                        on: {
                            click: () => {
                                window.open(params.row.view_url);
                            }
                        }
                    }, '查看'),
                    h('Button', {
                        props: {
                            type: 'warning',
                            size: 'small'
                        },
                        style: {
                            marginRight: '5px'
                        },
                        on: {
                            click: () => {
                                window.open(params.row.edit_url);
                            }
                        }
                    }, '编辑')
                ]);
            }},
        ],
        table: [
            @foreach ($list as $item)
                {
                    'index': '{{ $list->perPage() * ($list->currentPage() - 1) + $loop->iteration }}',
                    'title': '{{ $item->title }}',
                    'cate_title': '{{ $item->cate->title }}',
                    'read_num': '{{ $item->read_num }}',
                    'is_hidden_desc': '{{ value_desc('define.article.is_hidden', $item->is_hidden) }}',
                    'published_at': '{{ empty($item->published_at) ? '-' : date('Y-m-d', $item->published_at) }}',
                    'created_at': '{{ empty($item->created_at) ? '-' : date('Y-m-d', $item->created_at) }}',
                    'view_url': '{{ route('home.view', $item->id) }}',
                    'edit_url': '{{ route('admin.article.edit', $item->id) }}'
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
