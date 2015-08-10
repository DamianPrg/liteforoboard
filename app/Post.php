<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{

    /**
     * Returns posts topic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo('App\Topic', 'topic_id');
    }

}
