<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTag extends Model
{
    protected $table      = 't_article_tags';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
