<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ArticleTag;
use Exception;
use Parsedown;

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
        $tags       = Tag::orderBy('created_at', 'desc')->get();

        return view('admin.article.add', compact('categories', 'tags'));
    }

    public function handleAdd(Request $request)
    {
        $markdown = Parsedown::instance();

        $article = new Article;

        $article->title            = $request->title;
        $article->cate_id          = $request->cate_id;
        $article->summary_original = $request->summary_original;
        $article->summary          = $markdown->text($request->summary_original);
        $article->content_original = $request->content_original;
        $article->content          = $markdown->text($request->content_original);
        $article->is_hidden        = $request->is_hidden;
        $article->published_at     = strtotime($request->published_at);
        $article->created_at       = time();

        try {
            $article->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('文章创建失败！');
        }

        $tag_ids      = explode(',', $request->tag_ids);
        $article_id   = $article->id;
        $article_tags = [];

        foreach ($tag_ids as $tag_id) {
            $article_tags[] = [
                'article_id' => $article_id,
                'tag_id'     => $tag_id,
                'created_at' => time()
            ];
        }

        try {
            ArticleTag::insert($article_tags);
        } catch (Exception $e) {
            report($e);
            return $this->back_error('文章标签添加失败！');
        }

        return $this->back_success('文章已发布！');
    }

    public function edit($id)
    {
        $article    = Article::find($id);
        $categories = Category::where('pid', '>', 0)->orderBy('created_at', 'desc')->get();
        $tags       = Tag::orderBy('created_at', 'desc')->get();

        return view('admin.article.edit', compact('article', 'categories', 'tags'));
    }

    public function handleEdit(Request $request, $id)
    {
        $markdown = Parsedown::instance();

        $article = Article::find($id);

        $article->title            = $request->title;
        $article->cate_id          = $request->cate_id;
        $article->summary_original = $request->summary_original;
        $article->summary          = $markdown->text($request->summary_original);
        $article->content_original = $request->content_original;
        $article->content          = $markdown->text($request->content_original);
        $article->is_hidden        = $request->is_hidden;
        $article->published_at     = strtotime($request->published_at);

        try {
            $article->save();
        } catch (Exception $e) {
            report($e);
            return $this->back_error('文章更新失败！');
        }

        $tag_ids      = explode(',', $request->tag_ids);
        $article_id   = $article->id;
        $article_tags = [];

        foreach ($tag_ids as $tag_id) {
            $article_tags[] = [
                'article_id' => $article_id,
                'tag_id'     => $tag_id,
                'created_at' => time()
            ];
        }

        try {
            ArticleTag::where('article_id', $article_id)->delete();
            ArticleTag::insert($article_tags);
        } catch (Exception $e) {
            report($e);
            return $this->back_error('文章标签添加失败！');
        }

        return $this->back_success('文章已更新！');
    }
}
