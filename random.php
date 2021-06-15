<?php
function randomURL($URLlength = 16) {
    $url = '';
    $charray = array_merge(range('a','z'), range('0','9'));
    $max = count($charray) - 1;
    for ($i = 0; $i < $URLlength; $i++) {
        $randomChar = mt_rand(0, $max);
        $url .= $charray[$randomChar];
    }
    return $url;
}