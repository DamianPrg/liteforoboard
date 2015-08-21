<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends BaseModel
{
    public function latestPost()
    {

        return $this->posts()->orderBy('updated_at', 'desc')->first();
    }

    /**
     * Topic posts
     *
     * @return array App\Post
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'topic_id');
    }

    public function link()
    {
        return "<a href='" . route('board.topic.show', [$this->slug]) ."'>" . $this->title . "</a>";
    }

    public function addPost($message, $user)
    {
        $p = $this->posts()->create([
            'title' => $this->title,
            'message' => $message,
            'author_id' => $user->id
        ]);

        $this->touch(); // update timestamps

        return $p;
    }

    /**
     * Pin/Unpin topic
     * @param bool|true $v
     */
    public function pin($v = true)
    {
        $this->update(['pinned' => $v]);
    }

    /**
     * Lock/Unlock topic
     * @param bool|true $v
     */
    public function lock($v = true)
    {
        $this->update(['locked' => $v]);
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

    protected $fillable = ['title', 'slug', 'pinned', 'locked'];

    protected $guarded = [];

}
