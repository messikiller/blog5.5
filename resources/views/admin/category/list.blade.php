@extends('admin.common.page')

@section('breadcrumb')
<Breadcrumb>
        <Breadcrumb-Item>分类管理</Breadcrumb-Item>
        <Breadcrumb-Item>分类列表</Breadcrumb-Item>
    </Breadcrumb>
@endsection

@section('content')
<Card dis-hover>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <i-form>
                    <Form-item :label-width="100" label="名称：">
                        <i-input size="small" v-model="filter.title"></i-input>
                    </Form-item>
                </i-form>
            </div>
            <div class="col-md-4">
                <i-form>
                    <Form-item :label-width="100" label="父类：">
                        <i-select size="small" v-model="filter.pid">
                            @foreach ($fathers as $father)
                                <i-option value="{{ $father->id }}">{{ $father->title }}</i-option>
                            @endforeach
                        </i-select>
                    </Form-item>
                </i-form>
            </div>
            <div class="col-md-12">
                <i-form>
                    <Form-item :label-width="100" label="">
                        <i-button type="primary" size="small" @click="handleSubmitFilter">筛选</i-button>
                        <i-button type="warning" size="small" @click="handleResetFilter">重置</i-button>
                    </Form-item>
                </i-form>
            </div>
        </div>
    </div>
</Card>
<div style="height: 15px;"></div>
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
        filter: {
            title: '{{ empty($filter['title']) ? '' : $filter['title'] }}',
            pid: '{{ empty($filter['pid']) ? '' : $filter['pid'] }}'
        },
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
                                layer.open({
                                    type: 2,
                                    title: false,
                                    shadeClose: true,
                                    shade: 0.8,
                                    area: ['60%', '70%'],
                                    content: params.row.edit_url
                                });
                            }
                        }
                    }, '编辑')
                ]);
            }}
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
    methods: {

    }
};
</script>
@endsection
