<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function categories()
    {
        return $this->hasMany('App\Category', 'category_id');
    }

    public function topics()
    {
        return $this->hasMany('App\Topic', 'category_id');
    }

    public function link()
    {
        return "<a href='" . route('board.category.show', [$this->slug]) . "'>" . $this->title . "</a>";
    }

    /**
     * @param $title
     * @param $desc
     * @return Model
     */
    public function addCategory($title, $desc)
    {
        $subCategory = $this->categories()->create([
            'title' => $title,
            'desc' => $desc,
        ]);

        $subCategory->updateSlug();

        return $subCategory;
    }

    public function addTopic($title, $message, User $user, $pinned = false, $locked = false)
    {
        $topic = $this->topics()->create([
            'title' => $title,
            'author_id' => $user->id,
            'locked' => $locked,
            'pinned' => $pinned
        ]);

        $topic->updateSlug();

        // add post
        $topic->addPost($message, $user);
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
