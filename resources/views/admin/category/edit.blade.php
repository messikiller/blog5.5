@extends('admin.common.page')

@section('breadcrumb')
<Breadcrumb>
        <Breadcrumb-Item>分类管理</Breadcrumb-Item>
        <Breadcrumb-Item>编辑分类</Breadcrumb-Item>
    </Breadcrumb>
@endsection

@section('content')
<Row>
    <i-col span="12">

        @include('admin.common.error')

        <i-form :model="form" :rules="rules" :label-width="120" ref="dataForm" method="post">
            {{ csrf_field() }}
            <Form-item label="名称：" prop="title" required>
                <i-input name="title" v-model="form.title"></i-input>
            </Form-item>
            <Form-item label="父类：" prop="pid" required>
                <i-select v-model="form.pid" name="pid" v-model="form.pid">
                    <i-option value="0">无</i-option>
                    @foreach ($fathers as $father)
                        <i-option value="{{ $father->id }}">{{ $father->title }}</i-option>
                    @endforeach
                </i-select>
            </Form-item>
            <Form-item label="排序值：" prop="sort" required>
                <Input-Number name="sort" v-model="form.sort" style="width: 100%;"></Input-Number>
            </Form-item>
            <Form-item label="">
                <i-button type="primary" @click="handleFormSubmit">提交</i-button>
            </Form-item>
        </i-form>
    </i-col>
</Row>
@endsection

@section('script')
<script type="text/javascript">
const validateGeneral = (rule, value, callback) => {
    if (value == '') {
        callback(new Error('该字段不能为空！'));
    } else {
        callback();
    }
};

const validateNumber = (rule, value, callback) => {
    if (typeof(value) != 'number') {
        callback(new Error('该字段不能为空！'));
    } else {
        callback();
    }
};
var OPTION = {
    data: {
        form: {
            title: '{{ $category->title }}',
            pid: '{{ $category->pid }}',
            sort: {{ $category->sort }}
        },
        rules: {
            title: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            pid: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            sort: [
                {validator: validateNumber, trigger: 'blur'}
            ]
        }
    },
    methods: {
        handleFormSubmit: function () {
            this.$refs.dataForm.validate((valid) => {
                if (valid) {
                   this.$refs.dataForm.$el.submit();
                } else {
                   this.$Notice.warning({
                       title: '提示',
                       desc: '表单填写完整后提交！'
                   });
                }
            });
        }
    }
};
</script>
@endsection
