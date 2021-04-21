<?php
session_start();
require_once __DIR__ . '/Info.php';
View::render('headOfSite.php');

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
<div></div>

<div></div>