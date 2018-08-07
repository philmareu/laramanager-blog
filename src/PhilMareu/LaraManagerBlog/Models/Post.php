<?php

namespace PhilMareu\LaramanagerBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }
}