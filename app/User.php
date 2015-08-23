<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model
{
    use UserPermission;

    /**
     * Returns user group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group()
    {
        return $this->hasOne('App\Group', 'id', 'group_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post', 'author_id');
    }

    public function getLatestPosts($num = 10)
    {
        return $this->posts()->orderBy('updated_at', 'desc')->take($num)->get();
    }

    /**
     * Check if user has group
     *
     * @return bool
     */
    public function hasGroup()
    {
        if($this->group == null)
        {
            return false;
        }

        return true;
    }

    /**
     * Is user administrator?
     *
     * @return bool
     */
    public function isAdmin()
    {
        if ($this->can('access', 'acp')) return true;

        return false;
    }

    /**
     * Is user moderator
     *
     * @return bool
     */
    public function isModerator()
    {
        if ($this->can('access', 'modcp')) return true;

        return false;
    }

    /**
     * Is user either admin or mod
     *
     * @return bool
     */
    public function isStaff()
    {
        if($this->isAdmin() || $this->isModerator()) return true;

        return false;
    }

    /**
     *
     */
    public function updateSlug()
    {
        $this->update([
            'slug' => $this->id . '-' . strtolower($this->username)
        ]);
    }

    /**
     * @return string
     */
    public function link()
    {
       // return "<a href='#'>" . $this->username . "</a>";
        $color = $this->group->color;

        return "<a style='color: $color;' href='" . route('user.profile', [$this->slug]) . "'>" . $this->username . "</a>";
    }

    public function updateLastActivity()
    {
        $this->update(['last_activity' => Carbon::now()]);
    }

    public function isInactive()
    {
        $activity = new Carbon($this->last_activity);

        $now      = Carbon::now();

        $diff = $now->diffInMinutes($activity);

       //dd($diff);

        if($diff >= 15)
        {
           // dd("GIT");
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'password', 'last_activity', 'online'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    protected $dates = ['last_activity'];

}
