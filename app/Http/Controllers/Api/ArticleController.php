<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ArticleTag;
use Exception;
use Parsedown;

class ArticleController extends ApiController
{
    public function list(Request $request)
    {
        $pagesize = $request->input('pagesize', 20);
        $pageno   = $request->input('pageno', 1);
        $offset   = ($pageno - 1) * $pagesize;

        $query = Article::query()->with('cate', 'tags');

        $list = $query->published()
            ->orderBy('created_at', 'desc')    
            ->offset($offset)
            ->limit($pagesize)
            ->get();

        $data = [];
        foreach ($list as $article)
        {
            $cate = optional($article->category);
            $tags = [];

            foreach ($article->tags as $tag)
            {
                $tags[] = [
                    'tag_id'    => $tag->id,
                    'tag_title' => $tag->title,
                    'color'     => $tag->color
                ];
            }

            $data[] = [
                'id'           => $article->id,
                'title'        => $article->title,
                'summary'      => $article->summary,
                'cate_id'      => $article->cate_id,
                'cate_title'   => strval(optional($article->cate)->title),
                'tags'         => $tags,
                'read_num'     => $article->read_num,
                'published_at' => $article->published_at
            ];
        }

        $ext = [
            'pagesize' => $pagesize,
            'pageno'   => $pageno
        ];

        return $this->success($data, $ext);
    }

    public function view(Request $request)
    {
        $id = intval($request->input('id', 0));
        if ($id <= 0) {
            return $this->failed();
        }

        $article = Article::find($id);

        $tags = [];
        foreach ($article->tags as $tag)
        {
            $tags[] = [
                'tag_id'    => $tag->id,
                'tag_title' => $tag->title,
                'color'     => $tag->color
            ];
        }

        $data = [
            'id'           => $article->id,
            'title'        => $article->title,
            'summary'      => $article->summary,
            'cate_id'      => $article->cate_id,
            'cate_title'   => strval(optional($article->cate)->title),
            'tags'         => $tags,
            'read_num'     => $article->read_num,
            'published_at' => $article->published_at,
            'content'      => $article->content
        ];

        return $this->success($data);
    }
}
