<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogroll;

class BlogrollController extends Controller
{
    public function list()
    {
        $pagesize = 20;

        $list = Blogroll::orderBy('created_at', 'desc')->paginate($pagesize);

        return view('admin.blogroll.list', compact('list'));
    }

    public function add()
    {

    }

    public function handleAdd(Request $request)
    {

    }

    public function edit(Request $request)
    {

    }

    public function handleEdit(Request $request)
    {

    }
}
