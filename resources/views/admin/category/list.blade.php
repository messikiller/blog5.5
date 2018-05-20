@extends('admin.common.page')

@section('breadcrumb')
<Breadcrumb>
        <Breadcrumb-Item>分类管理</Breadcrumb-Item>
        <Breadcrumb-Item>分类列表</Breadcrumb-Item>
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
            {title: '名称', key: 'title'},
            {title: '父级分类', key: 'father_title'},
            {title: '排序值', key: 'sort'},
            {title: '创建时间', key: 'created_at'},
            {title: '操作', key: 'action', render: (h, params) => {
                return h('div', [
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
                                window.location.href = params.row.edit_url;
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
                    'father_title': '{{ $item->pid > 0 ? $item->father->title : '-' }}',
                    'sort': '{{ $item->sort }}',
                    'created_at': '{{ empty($item->created_at) ? '-' : date('Y-m-d', $item->created_at) }}',
                    'edit_url': '{{ route('admin.category.edit', $item->id) }}'
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
