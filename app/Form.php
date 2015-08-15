<?php

namespace App;

/**
 * Class Form
 * @package App
 */
class Form
{
    protected $route = '';
    protected $type  = '';
    protected $source = '';

    public function __construct()
    {

    }

    public function base($left = '', $right = '')
    {
        $c = '';

        $c .= "<div class='form-element'>";

        $c .= "<div class='input-detail'>" . $left . "</div>";
        $c .= "<div class='input'>" . $right ."</div>";

        $c .= "</div>";

        return $c;
    }

    public function text($name, $desc, $value = '', $placeholder = '', $required = false)
    {
        $this->source .= $this->base();
    }

    public function getHtmlCode()
    {

    }
}
