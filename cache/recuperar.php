<?php

$memcache = new Memcache();
$memcache->addserver("localhost");
//$memcache->addserver("10.7.10.31");

var_dump($memcache->get("nome"));
var_dump($memcache->get("objeto"));

