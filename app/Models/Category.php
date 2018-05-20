<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    protected $table      = 't_categories';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public function children()
    {
        return $this->hasMany(self::class, 'pid', 'id');
    }

    public function father()
    {
        return $this->belongsTo(self::class, 'pid', 'id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'cate_id', 'id');
    }
}
