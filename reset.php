<?php

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

$str=file_get_contents('./reset.html');
file_put_contents('./index.html', $str);

redirect("./Minions.php");