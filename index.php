<?php

$url = 'http://localhost/qoute_rest/info.php';
$content = file_get_contents($url);
$json = json_decode($content, true);

foreach($json['info'] as $item) {
    echo  'Todays Qoute is "'.$item['qoute'].'"';
    echo '<br>';
}
