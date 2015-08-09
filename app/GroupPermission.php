<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    /**
     *
     */
    protected $fillable = ['permission_action', 'permission_type', 'group_id', 'content_id'];
}
