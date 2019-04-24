<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = array('id');

    protected $dates = ['deleted_at'];
}
