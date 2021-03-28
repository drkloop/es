<?php
require_once 'constance.php';
class Autoloader{
    public function autoload( $class_name )
    {
        $file= $this->convert_class_to_file($class_name);
        if (is_file($file)&& file_exists($file)&& is_readable($file)){
            include $file;
        }
    }

    public function convert_class_to_file($class_name)
    {
        $class=strtolower($class_name);
        $class='class-'.$class;
        $class.=".php";
        return PATH_CORE_DIR.'loader'.DIRECTORY_SEPARATOR.$class;
    }
}
 $instance=new  Autoloader();
spl_autoload_register(array($instance, 'autoload'));
?>

