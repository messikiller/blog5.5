<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        $pagesize = 20;

        $query = Category::query();

        $list = $query->orderBy('created_at', 'desc')
            ->paginate($pagesize);

        return view('admin.category.list', compact('list'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function handleAdd(Request $request)
    {

    }

    public function edit($id)
    {

    }

    public function handleEdit(Request $request, $id)
    {

    }
}
