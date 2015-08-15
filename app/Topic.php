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

    public function addPost($message, User $user)
    {
        $this->posts()->create([
            'title' => $this->title,
            'message' => $message,
            'author_id' => $user->id
        ]);
    }

    /**
     * Update slug
     */
    public function updateSlug()
    {
        $this->update([
            'slug' => $this->id . '-' . strtolower(str_slug($this->title))
        ]);
    }
}
