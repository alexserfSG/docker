<?php
declare(strict_types=1);

$redis = new Redis();
$redis->connect('redis');

$arr = [];

if ($redis->ping()) {
    $arr['redis'] = "Redis is work!";
}


$mc = new Memcached();
$mc->addServer("memcached", 11211);

$mc->set("memcached", "Memcached is work!");

$arr['memcahed'] = $mc->get("memcached") ? $mc->get("memcached") : 'Memcached doesnt work ...';

print_r($arr);