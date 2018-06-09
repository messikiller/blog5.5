@extends('admin.common.page')

@section('style')
{!! editor_css() !!}
@endsection

@section('breadcrumb')
<Breadcrumb>
        <Breadcrumb-Item>文章管理</Breadcrumb-Item>
        <Breadcrumb-Item>更新文章</Breadcrumb-Item>
    </Breadcrumb>
@endsection

@section('content')
<Row>
    <i-col span="24">

        @include('admin.common.error')

        <i-form :model="form" :rules="rules" :label-width="120" ref="dataForm" method="post">
            {{ csrf_field() }}
            <Form-item label="标题：" prop="title" required>
                <i-input name="title" v-model="form.title"></i-input>
            </Form-item>
            <Form-item label="分类：" prop="cate_id" required>
                <i-select name="cate_id" v-model="form.cate_id" filterable clearable>
                    @foreach ($categories as $cate)
                        <i-option value="{{ $cate->id }}">{{ $cate->title }}</i-option>
                    @endforeach
                </i-select>
            </Form-item>
            <Form-item label="标签：" prop="tag_ids" required>
                <i-select name="tag_ids" v-model="form.tag_ids" multiple filterable clearable>
                    @foreach ($tags as $tag)
                        <i-option value="{{ $tag->id }}">{{ $tag->title }}</i-option>
                    @endforeach
                </i-select>
            </Form-item>
            <Form-item label="是否隐藏：" prop="is_hidden" required>
                <i-select name="is_hidden" v-model="form.is_hidden" filterable clearable>
                    @foreach (config('define.article.is_hidden') as $is_hidden)
                        <i-option value="{{ $is_hidden['value'] }}">{{ $is_hidden['desc'] }}</i-option>
                    @endforeach
                </i-select>
            </Form-item>
            <Form-item label="摘要：" prop="summary" required>
                <Row>
                    <i-col span="12">
                        <div style="padding-right: 5px;">
                            <i-input type="textarea" name="summary_original" v-model="form.summary"></i-input>
                        </div>
                    </i-col>
                    <i-col span="12">
                        <Card dis-hover>
                            <div v-html="convert(form.summary)" style="padding: 5px;"></div>
                        </Card>
                    </i-col>
                </Row>
            </Form-item>
            <Form-item label="发布时间：" prop="published_at" required>
                <Date-Picker type="date" format="yyyy-MM-dd" name="published_at" :value="form.published_at" @on-change="handlePublishedAtChange" style="width: 100%;"></Date-Picker>
            </Form-item>
            <Form-item label=""  prop="original_content">
                <div id="editormd_id">
                    <textarea name="content_original" style="display:none;">{!! $article->content_original !!}</textarea>
                </div>
            </Form-item>
            <Form-item label="">
                <i-button type="primary" @click="handleFormSubmit">提交</i-button>
            </Form-item>
        </i-form>
    </i-col>
</Row>

@endsection

@section('script')
{!! editor_js() !!}
<script type="text/javascript">
var validateGeneral = (rule, value, callback) => {
    if (value == '') {
        callback(new Error('该字段不能为空！'));
    } else {
        callback();
    }
};

var validateTags = (rule, value, callback) => {
    if (value.length == 0) {
        callback(new Error('该字段不能为空！'));
    } else {
        callback();
    }
};

var OPTION = {
    data: {
        form: {
            title:     '{{ $article->title }}',
            cate_id:   '{{ $article->cate_id }}',
            is_hidden: '{{ $article->is_hidden }}',
            summary:   '{!! $article->summary_original !!}',
            published_at: '{{ date('Y-m-d', $article->published_at) }}',
            tag_ids: [
                @foreach ($article->tags as $tag)
                    '{{ $tag->id }}'
                    @if (! $loop->last)
                    ,
                    @endif
                @endforeach
            ]
        },
        rules: {
            title: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            cate_id: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            is_hidden: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            summary: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            published_at: [
                {validator: validateGeneral, trigger: 'blur'}
            ],
            tag_ids: [
                {validator: validateTags, trigger: 'blur'}
            ]
        }
    },
    methods: {
        handlePublishedAtChange: function (value) {
            this.form.published_at = value;
        },
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
        },
        convert: function (input) {
            if (input == undefined) {
                return;
            }
            return markdown.toHTML(input);
        }
    }
};
</script>
@endsection
