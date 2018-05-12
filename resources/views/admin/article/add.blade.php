@extends('admin.common.page')

@section('style')
{!! editor_css() !!}
@endsection

@section('breadcrumb')
<Breadcrumb>
        <Breadcrumb-Item>文章管理</Breadcrumb-Item>
        <Breadcrumb-Item>发布文章</Breadcrumb-Item>
    </Breadcrumb>
@endsection

@section('content')
<div id="editormd_id">
    <textarea name="content" style="display:none;"></textarea>
</div>
@endsection

@section('script')
{!! editor_js() !!}
<script type="text/javascript">
var OPTION = {
    data: {

    },
    method: {

    }
};
</script>
@endsection
