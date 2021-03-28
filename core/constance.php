<?php
$path =  "http://$_SERVER[HTTP_HOST]";
$path_project=$_SESSION['PATH_PROJECT'];
define('PATH',$path);
define('PATH_ASSET',$path.DIRECTORY_SEPARATOR."asetes".DIRECTORY_SEPARATOR);
define('PATH_ASSET_DIR',$path_project.DIRECTORY_SEPARATOR."asetes".DIRECTORY_SEPARATOR);
define('PATH_VIEW_DIR',$path_project.DIRECTORY_SEPARATOR."view".DIRECTORY_SEPARATOR);
define('PATH_CORE',$path.DIRECTORY_SEPARATOR."core".DIRECTORY_SEPARATOR);
define('PATH_CORE_DIR',$path_project.DIRECTORY_SEPARATOR."core".DIRECTORY_SEPARATOR);
?>

<!--<img src="-->


