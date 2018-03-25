<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table      = 't_categories';
    protected $primaryKey = 'id';

    public $timestamps = false;
    
}
