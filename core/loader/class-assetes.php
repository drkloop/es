<?php

class Assetes
{
    public static function __callStatic($name, $arg)
    {
        switch ($name) {
            case "img":
                self::render_img($arg[0]);
                break;
            case "js":
                self::render_js($arg[0]);
                break;
            case "css":
                self::render_css($arg[0]);
                break;

        }
    }

    public static function render_img($view_name, $data = null)
    {
        $file_url = PATH_ASSET ."img".DIRECTORY_SEPARATOR . $view_name;
        echo $file_url;
    }

    public static function render_js($view_name, $data = null)
    {
        $file_url = PATH_ASSET ."js".DIRECTORY_SEPARATOR . $view_name;
        echo $file_url;
    }
    public static function render_css($view_name, $data = null)
    {
        $file_url = PATH_ASSET ."css". DIRECTORY_SEPARATOR . $view_name;
        echo $file_url;
    }
}