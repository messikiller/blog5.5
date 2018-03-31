<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table      = 't_configs';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
