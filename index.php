<?php

const MODE_COLOR_SLIDER = 6;

if ($_POST['mode'] !== null) {
    $setting = fopen("setting.txt", "w") or die('error');
    fwrite($setting, $_POST['mode']);
    fclose($setting);

    if ($_POST['mode'] == MODE_COLOR_SLIDER) {
	$color = fopen("color.txt", "w") or die('error');
	$colorhex = '';
	$colorhex .= str_pad(dechex($_POST['red']),   2, "0", STR_PAD_LEFT);
	$colorhex .= str_pad(dechex($_POST['green']), 2, "0", STR_PAD_LEFT);
	$colorhex .= str_pad(dechex($_POST['blue']),  2, "0", STR_PAD_LEFT);
	fwrite($color, $colorhex);
	fclose($color);
    }
    if ($_POST['mode'] == 3) {
        $color = fopen("color.txt", "w") or die('error');
        if ($_POST['color']) {
            $colorhex = '0000FF';
        } else {
            $colorhex = 'FFFFFF';
        }
        fwrite($color, $colorhex);
	    fclose($color);
    }

    header("HTTP/1.1 200 OK");
    echo "OK";
} else {
    $setting = fopen("setting.txt", "r");
    $mode = fread($setting, filesize("setting.txt"));
	$color = fopen("color.txt", "r");
	$mode .= fread($color, filesize("color.txt"));
    fclose($setting);
    echo $mode;
}

?>
