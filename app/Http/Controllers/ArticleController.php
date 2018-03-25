<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $pagesize = 20;

        $articles = Article::with('cate')->published()->orderBy('published_at', 'asc')->paginate($pagesize);

        dd($articles);
    }
}
