<?php

if ($_POST['brightness'] !== null) {
    $setting = fopen("brightness.txt", "w") or die('error');
    fwrite($setting, $_POST['brightness']);
    fclose($setting);
    header("HTTP/1.1 200 OK");
    echo "OK";
} else {
    $setting = fopen("brightness.txt", "r");
    $brightness = fread($setting, filesize("brightness.txt"));
    $brightness = str_pad($brightness, 2, "0", STR_PAD_LEFT);
    echo $brightness;
    fclose($setting);
}