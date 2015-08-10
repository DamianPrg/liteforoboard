<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends BaseModel
{
    /**
     * Topic posts
     *
     * @return array App\Post
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'topic_id');
    }
}
