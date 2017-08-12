<?php

$memcache = new Memcache();
$memcache->addserver("localhost");
//$memcache->addserver("10.7.10.31");

$memcache->set("nome", "Luiz Henrique", MEMCACHE_COMPRESSED, 5);
$memcache->set("objeto", new stdClass);
