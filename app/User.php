<?php

namespace App;

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
    protected $fillable = ['username', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];
}
