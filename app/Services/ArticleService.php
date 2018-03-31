<?php

namespace App\Services;

use Cache;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Blogroll;
use App\Models\Article;

class ArticleService
{
    public static function getNavCates()
    {
        return Cache::remember(config('define.cache.home_nav_cates.key'), config('define.cache.home_nav_cates.minutes'), function () {
            return Category::with('children')
                ->orderBy('sort', 'desc')
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }

    public static function getSiderCates()
    {
        return Cache::remember(config('define.cache.home_sider_cates.key'), config('define.cache.home_sider_cates.minutes'), function () {
            return Category::withCount('articles')
                ->orderBy('articles_count', 'desc')
                ->where('pid', '>', 0)
                ->get()
                ->where('articles_count', '>', 0);
        });
    }

    public static function getSiderArchives()
    {
        return Cache::remember(config('define.cache.home_sider_archives.key'), config('define.cache.home_sider_archives.minutes'), function () {
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
    }

    public static function getSiderTags()
    {
        return Cache::remember(config('define.cache.home_sider_tags.key'), config('define.cache.home_sider_tags.minutes'), function () {
            return Tag::orderBy('created_at', 'desc')->get();
        });
    }

    public static function getFooterBlogrolls()
    {
        return Cache::remember(config('define.cache.home_footer_blogrolls.key'), config('define.cache.home_footer_blogrolls.minutes'), function () {
            return Blogroll::orderBy('created_at', 'desc')->get();
        });
    }
}
