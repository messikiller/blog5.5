<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Category;
use App\Models\ArticleTag;

class Article extends Model
{
    protected $table      = 't_articles';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', time());
    }

    public function scopeNormal($query)
    {
        return $query->where('is_hidden', '=', config('define.article.is_hidden.false.value'));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, (new ArticleTag)->getTable(), 'article_id', 'tag_id');
    }

    public function cate()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}
