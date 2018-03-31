<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    public function __construct()
    {
        $navCates      = ArticleService::getNavCates();
        $siderCates    = ArticleService::getSiderCates();
        $siderArchives = ArticleService::getSiderArchives();
        $siderTags     = ArticleService::getSiderTags();
        $blogrolls     = ArticleService::getFooterBlogrolls();

        $active_cate_pid = 0;

        view()->composer(['home.index', 'home.view'], function ($view) use ($navCates, $siderCates, $siderArchives, $siderTags, $blogrolls) {
            $view->with(compact('navCates', 'siderCates', 'siderArchives', 'siderTags', 'blogrolls'));
        });
    }

    public function index(Request $request)
    {
        $pagesize = config('define.app.home_boxes_count');

        $query = Article::query()->with('cate', 'tags')->published()->orderBy('published_at', 'desc');

        $filter = $alerts = [];

        if (($filter_cate = $request->input('filter_cate', false)) !== false) {
            $query->where('cate_id', '=', $filter_cate);
            $filter['filter_cate'] = $filter_cate;

            $active_cate = Category::find($filter_cate);
            $active_cate_pid = $active_cate->pid;

            $alerts[] = [
                'type'    => 'success',
                'content' => '您正在查看分类：<b>'. $active_cate->title .'</b> 下的全部文章'
            ];
        }

        if (($filter_archive = $request->input('filter_archive', false)) !== false) {
            $start = $filter_archive;
            $end   = Carbon::parse(date('Y-m', $start))->addMonth(1)->timestamp;

            $query->where('published_at', '>=', $start)->where('published_at', '<', $end);
            $filter['filter_archive'] = $filter_archive;

            $alerts[] = [
                'type'    => 'info',
                'content' => '您正在查看归档：<b>'. date('Y年m月', $filter_archive) .'</b> 的全部文章'
            ];
        }

        if (($filter_tag = $request->input('filter_tag', false)) !== false) {
            $query->whereHas('tags', function($query) use ($filter_tag) {
                $query->where('tag_id', '=', $filter_tag);
            });
            $filter['filter_tag'] = $filter_tag;

            $active_tag = Tag::find($filter_tag);

            $alerts[] = [
                'type'    => 'warning',
                'content' => '您正在查看标签：<b>'. $active_tag->title .'</b> 下的全部文章'
            ];
        }

        $articles = $query->paginate($pagesize)->appends($filter);

        return view('home.index', compact('articles', 'filter', 'active_cate_pid', 'alerts'));
    }

    public function view($id)
    {
        $article = Article::find($id);

        return view('home.view', compact('article'));
    }
}
