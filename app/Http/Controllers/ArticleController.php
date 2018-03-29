<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function __construct()
    {
        $cates = Category::with('children')->orderBy('created_at', 'desc')->get();

        view()->composer(['home.index'], function ($view) use ($cates) {
            $view->with(compact('cates'));
        });
    }

    public function index()
    {
        $pagesize = 6;
        $articles = Article::with('cate', 'tags')->published()->orderBy('published_at', 'desc')->paginate($pagesize);

        return view('home.index', compact('articles'));
    }
}
