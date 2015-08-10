<?php

namespace App;

trait UserPermission
{
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
}