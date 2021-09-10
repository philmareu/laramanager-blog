<?php

namespace PhilMareu\LaramanagerBlog\Models;

use Illuminate\Database\Eloquent\Model;
use PhilMareu\Laramanager\Database\Objectable;

class Post extends Model
{
    use Objectable;

    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }
}
