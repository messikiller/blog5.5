<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

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
        return view('admin.article.add');
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
