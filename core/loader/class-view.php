<?php
class View{
    public static function __callStatic($name, $arg)
    {
        switch ($name) {
            case "render":
                self::render_view($arg[0]);
                break;
                case "GoTo":
                self::render_GoTo($arg[0]);
                break;
        }
    }
    public static function render_view($view_name, $data = null)
    {
        $file_url = PATH_VIEW_DIR . $view_name;
        require_once $file_url;
    }
    public static function render_GoTo($view_name)
    {
        $file_url = PATH .'/'. $view_name;
       echo $file_url;
    }
}