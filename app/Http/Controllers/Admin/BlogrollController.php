<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogroll;
use Exception;

class BlogrollController extends Controller
{
    public function list(Request $request)
    {
        $pagesize = 20;
        $filter   = [];

        $query = Blogroll::query();

        $this->_queryFilter($request, $query, $filter);

        $list = $query->orderBy('created_at', 'desc')->paginate($pagesize);

        return view('admin.blogroll.list', compact('list', 'filter'));
    }

    public function add()
    {
        return view('admin.blogroll.add');
    }

    public function handleAdd(Request $request)
    {
        $title = $request->title;

        if (Blogroll::where('title', '=', $title)->count() > 0) {
            return $this->back_error('名称已存在！');
        }

        $model = new Blogroll;

        $model->title      = $title;
        $model->link       = $request->link;
        $model->created_at = time();

        try {
            $model->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('添加友链失败！');
        }

        return $this->back_success('添加友链成功！');
    }

    public function edit($id)
    {
        $blogroll = Blogroll::find($id);

        return view('admin.blogroll.edit', compact('blogroll'));
    }

    public function handleEdit(Request $request, $id)
    {
        $title = $request->title;

        if (Blogroll::where('title', '=', $title)->where('id', '!=', $id)->count() > 0) {
            return $this->back_success('名称已存在！');
        }

        $model = Blogroll::find($id);

        $model->title = $title;
        $model->link  = $request->link;

        try {
            $model->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('更新失败！');
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
