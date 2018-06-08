<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function list(Request $request)
    {
        $pagesize = 20;

        $query = Article::query();

        $list = $query->with('tags', 'cate', 'comments')
            ->orderBy('created_at', 'desc')
            ->paginate($pagesize);

        return view('admin.article.list', compact('list'));
    }

    public function add()
    {
        $categories = Category::where('pid', '>', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.article.add', compact('categories'));
    }

    public function handleAdd(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {

    }

    public function handleEdit(Request $request, $id)
    {

    }
}
