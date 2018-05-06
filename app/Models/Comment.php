<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table      = 't_comments';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
