@extends('admin.common.page')

@section('breadcrumb')
<Breadcrumb>
        <Breadcrumb-Item>分类管理</Breadcrumb-Item>
        <Breadcrumb-Item>添加标签</Breadcrumb-Item>
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
            <Form-item label="颜色：" prop="color" required>
                <Color-Picker v-model="form.color" />
            </Form-item>
            <Form-item label="">
                <input type="hidden" name="color" :value="form.color">
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

var OPTION = {
    data: {
        form: {
            title: '',
            color: ''
        },
        rules: {
            title: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            color: [
                {validator: validateGeneral, trigger: 'blur'}
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
