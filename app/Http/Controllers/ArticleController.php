<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $pagesize = 6;
        $articles = Article::with('cate')->published()->orderBy('published_at', 'desc')->paginate($pagesize);

        return view('home.index', compact('articles'));
    }
}
