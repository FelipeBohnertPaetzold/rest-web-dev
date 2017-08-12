<?php

class Curl {

    private $method;
    private $url;
    private $body;
    private $header;
    public static $METHOD_POST = "POST";
    public static $METHOD_PUT = "PUT";
    public static $METHOD_DELETE = "DELETE";
    public static $METHOD_GET = "GET";

    function __construct($method, $url, $body = "", $header = []) {
        $this->method = $method;
        $this->url = $url;
        $this->body = $body;
        $this->header = $header;
    }

    function exec() {
        $ch = curl_init($this->url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);

        switch ($this->method) {
            case Curl::$METHOD_POST:
                curl_setopt($ch, CURLOPT_POST, 1);
                break;
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);
        curl_close($ch);

        echo $resultado;
    }

}
