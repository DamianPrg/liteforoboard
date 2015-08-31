<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function latestTopic()
    {
        $topic = $this->topics()->orderBy('updated_at', 'desc')->first();

       //dd($topic);

        return $topic;
    }

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
     * @return int
     */
    public function numPosts()
    {
        $num = 0;

        foreach($this->topics as $tops)
        {

                $num += $tops->posts->count();

        }

        return $num;
    }

    public function numReplies()
    {
        $num = 0;

        foreach($this->topics as $tops)
        {

            $num += $tops->posts->count() - 1;

        }

        return $num;
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


    /**
     * @param $title
     * @param $message
     * @param User $user
     * @param bool|false $pinned
     * @param bool|false $locked
     * @return Model
     */
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

        return $topic;
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

    public function remove()
    {
        // @todo: remove posts/topics

        if($this->category_id == -1)
        {
            foreach($this->categories() as $category)
            {
                $category->delete();
            }
        }

        $this->delete();
    }

    protected $fillable = ['category_id', 'title', 'desc'];

}
