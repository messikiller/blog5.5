<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Blogroll;
use Cache;

class ArticleController extends Controller
{
    public function __construct()
    {
        $navCates = Cache::remember(config('define.cache.home_nav_cates.key'), config('define.cache.home_nav_cates.minutes'), function () {
            return Category::with('children')
                ->orderBy('sort', 'desc')
                ->orderBy('created_at', 'desc')
                ->get();
        });

        $siderCates = Cache::remember(config('define.cache.home_sider_cates.key'), config('define.cache.home_sider_cates.minutes'), function () {
            return Category::withCount('articles')
                ->orderBy('articles_count', 'desc')
                ->where('pid', '>', 0)
                ->get()
                ->where('articles_count', '>', 0);
        });

        $siderArchives = Cache::remember(config('define.cache.home_sider_archives.key'), config('define.cache.home_sider_archives.minutes'), function () {
            return Article::select(['id', 'published_at'])
                ->orderBy('published_at', 'desc')
                ->published()
                ->get()
                ->transform(function($item) {
                    $item->month = strtotime(date('Y-m', $item->published_at));
                    return $item;
                })
                ->groupBy('month')
                ->take(config('define.app.home_sider_archives_counts'));
        });

        $siderTags = Cache::remember(config('define.cache.home_sider_tags.key'), config('define.cache.home_sider_tags.minutes'), function () {
            return Tag::orderBy('created_at', 'desc')->get();
        });

        $blogrolls = Cache::remember(config('define.cache.home_footer_blogrolls.key'), config('define.cache.home_footer_blogrolls.minutes'), function () {
            return Blogroll::orderBy('created_at', 'desc')->get();
        });


        view()->composer(['home.index'], function ($view) use ($navCates, $siderCates, $siderArchives, $siderTags, $blogrolls) {
            $view->with(compact('navCates', 'siderCates', 'siderArchives', 'siderTags', 'blogrolls'));
        });
    }

    public function index()
    {
        $pagesize = 6;
        $articles = Article::with('cate', 'tags')->published()->orderBy('published_at', 'desc')->paginate($pagesize);

        return view('home.index', compact('articles'));
    }
}
