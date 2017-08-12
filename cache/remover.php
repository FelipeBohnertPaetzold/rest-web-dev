<?php

$memcache = new Memcache();
$memcache->addserver("localhost");

$memcache->delete("nome");
