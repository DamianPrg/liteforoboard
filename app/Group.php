<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class Group
 * @package App
 *
 * id 1 - members group
 * id 2 - moderators group
 * id 3 - administrators group
 * id 4 - banned group
 */
class Group extends Model
{
	/**
	 *	Permissions owned by this group.
	 */
    public function permissions()
    {
    	return $this->hasMany('App\GroupPermission', 'group_id');
    }

    /**
     * Add permission
 	 *
	 * Note: when called without arguments, group will have '*', '*' permissions it means access to anything.
 	 *
 	 * @return \App\GroupPermission
     */
    public function addPermission($action = '*', $type = '*', $content_id = -1)
    {
    	$existingGroupPermission = $this->permissions->where('permission_action', $action)
    										  ->where('permission_type', $type)
    										  ->where('content_id', $content_id)
    										  ->first();

    	if($existingGroupPermission == null)
    	{
	    	$groupPermission = GroupPermission::create([
	    		'permission_action' => $action,
	    		'permission_type'   => $type,
	    		'content_id'        => $content_id,
	    		'group_id'          => $this->id
	    	]);
	    }
	    else 
	    {
	    	$groupPermission = $existingGroupPermission;
	    }

    	return $groupPermission;
    }

    /**
     * Has permission?
 	 *
 	 *
     */
    public function hasPermission($action, $type, $content_id = -1)
    {
    	$groupPermission = $this->permissions->where('permission_action', $action)
    										  ->where('permission_type', $type)
    										  ->where('content_id', $content_id)
    										  ->first();

    	// dd($groupPermission);

    	if($groupPermission == null)
    	{
    		return false;
    	}

    	return true;
    }

}
