<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Return author
     *
     *
     * @return App\User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    /**
     * Check if it has author
     *
     * @return bool
     */
    public function hasAuthor()
    {
        if($this->author != null) return true;

        return false;
    }
}
