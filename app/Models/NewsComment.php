<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsComment extends Model
{
    protected $table = 'news_comments';

    public function user() {
        return $this->belongsTo(User::class );
    }
}
