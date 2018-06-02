<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Exception;

class TagController extends Controller
{
    public function list(Request $request)
    {
        $query = Tag::query();

        $pagesize = 20;
        $filter   = [];

        $this->_queryFilter($request, $query, $filter);

        $list = $query->orderBy('created_at', 'desc')->paginate($pagesize);

        return view('admin.tag.list', compact('list', 'filter'));
    }

    public function add()
    {
        return view('admin.tag.add');
    }

    public function handleAdd(Request $request)
    {
        $title = $request->title;

        if (Tag::where('title', '=', $title)->count() > 0) {
            return $this->back_error('标签名称已存在！');
        }

        $model = new Tag;

        $model->title      = $title;
        $model->color      = $request->color;
        $model->created_at = time();

        try {
            $model->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('创建标签失败！');
        }

        return $this->back_success('标签创建成功！');

    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tag.edit', compact('tag'));
    }

    public function handleEdit(Request $request, $id)
    {
        $title = $request->title;

        if (Tag::where('title', '=', $title)->where('id', '!=', $id)->count() > 0) {
            return $this->back_error('标签名称已存在！');
        }

        $model = Tag::find($id);

        $model->title = $title;
        $model->color = $request->color;

        try {
            $model->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('更新标签失败！');
        }

        return view('admin.common.close');
    }

    private function _queryFilter($request, $query, &$filter = [])
    {
        if (($title = $request->input('filter_title', false)) !== false) {
            $query->where('title', '=', $title);
            $filter['title'] = $title;
        }
    }
}
