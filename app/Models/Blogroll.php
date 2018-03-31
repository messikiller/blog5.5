<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogroll extends Model
{
    protected $table      = 't_blogrolls';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
