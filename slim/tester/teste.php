<?php

include_once './Curl.php';

$curl = new Curl(CURL::$METHOD_GET, "http://localhost/Rest2017/slim/aplicacao/cliente/");
$curl->exec();
