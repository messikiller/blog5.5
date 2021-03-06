<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        $pagesize = 20;

        $filter = [];
        $query = Category::query()->with('father');

        $this->_queryFilter($request, $query, $filter);

        $list = $query->orderBy('created_at', 'desc')
            ->paginate($pagesize);

        $fathers = Category::where('pid', '=', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.category.list', compact('list', 'filter', 'fathers'));
    }

    public function add()
    {
        $fathers = Category::where('pid', '=', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.category.add', compact('fathers'));
    }

    public function handleAdd(Request $request)
    {
        $model = new Category;

        $model->title = $request->title;
        $model->pid   = $request->pid;
        $model->sort  = $request->sort;

        try {
            $model->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('添加分类失败！');
        }

        return $this->back_success('添加分类成功！');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        $fathers  = Category::where('pid', '=', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.category.edit', compact('category', 'fathers'));
    }

    public function handleEdit(Request $request, $id)
    {
        $model = Category::find($id);

        $model->title = $request->title;
        $model->pid   = $request->pid;
        $model->sort  = $request->sort;

        try {
            $model->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('更新分类失败！');
        }

        return view('admin.common.close');
    }

    private function _queryFilter($request, $query, &$filter = [])
    {
        if (($title = $request->input('filter_title', false)) !== false) {
            $query->where('title', '=', $title);
            $filter['title'] = $title;
        }

        if (($pid = $request->input('filter_pid', false)) !== false) {
            $query->where('pid', '=', $pid);
            $filter['pid'] = $pid;
        }
    }
}
