<?php

namespace App;

/**
 * Class Form
 * @package App
 */
class Form
{
    public $title = '';
    public $desc  = '';
    public $route = '';
    protected $source = '';

    protected $detailAlignLeft = false;
    protected $inputAlignLeft = false;

    public function __construct()
    {
        $this->source = '';
    }

    public function input($name, $type, $value, $placeholder = '')
    {
        $sname = strtolower($name);
        return "<input style='width:50%;' type='$type' name='$sname' value='$value' placeholder='$placeholder'>";
    }

    public function detail($name, $desc='')
    {
        $d = "";

        $sname = strtolower($name);
        $d .= "<label class='normal-text' for='$sname'>$name</label><br>";

        if(strlen($desc) > 0) {

            $d .= "<span class='muted-text small-text'>$desc</span>";
        }

        return $d;
    }

    public function base($left = '', $right = '')
    {
        $c = '';

        $c .= "<div class='form-element'>";

        $c .= "<div class='detail'>$left</div>";
        $c .= "<div class='input'>$right</div>";

        $c .= "</div>";

        return $c;
    }

    public function space()
    {
        $this->source .= $this->base('<br>', '<br>');
    }

    public function text($name, $desc, $value, $placeholder = '')
    {
        $this->source .= $this->base($this->detail($name, $desc), $this->input($name, 'text', $value, $placeholder));
    }

    public function submit($title)
    {
        $this->source .= $this->base('', "<button class='btn btn-black' type='submit'>$title</button>");
    }

    public function getForm()
    {
        return view('skins.default.form', [
            'route' => route($this->route),
            'name' => $this->title,
            'desc' => $this->desc,
            'form_source' => $this->source

        ]);
    }
}
