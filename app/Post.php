<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $visible = ['id','name', 'category_id', 'short_content', 'content' ];
}
