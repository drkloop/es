<?php
session_start();
require_once __DIR__ . '/Info.php';
View::render('headOfSite.php');

//if (isset($_GET['url'])) {
//    $url_array[] = explode('/', $_GET['url']);
//    if (isset($url_array[1])) {
//    header("Location: http://$_SERVER[HTTP_HOST]");
//    }
//}


?>
<div id="org-head">
    <?php
    View::render('header.phtml');
    View::render('MiniHeader.phtml');
    ?>
</div>
<div id="App">
    <?php
    require_once 'init.php';
    $app = new app();
    ?>

</div>

<div id="org-footer">

    <?php
    View::render('footer.phtml');
    View::render('footOfSite.php');
    ?>
</div>
