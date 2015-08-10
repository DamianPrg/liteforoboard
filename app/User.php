<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

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
     * Check if user can do some action based on permissions.
     *
     * Example: can('edit', 'topic', -1), will mean that user can edit all topics, because content_id = -1.
     *
     * @param $action
     * @param $type
     * @param int $content_id
     * @return bool
     */
    public function can($action, $type, $content_id = -1)
    {
        if($this->hasGroup() == false)
        {
            return false;
        }

        if($this->hasGroup())
        {
            if($this->group->hasPermission($action, $type, $content_id)) {
                return true;
            }
            else {
                return false;
            }
        }

        return false;
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
