<?php
require_once("Request.php");
require_once("RequestMethod.php");
require_once("RequestParams.php");
require_once("RequestBody.php");
require_once("RequestHeader.php");

class Builder implements Request, RequestMethod, RequestParams, RequestBody, RequestHeader
{

    protected $baseUrl;
    protected $method;
    protected $body;

    protected $headers = array(
        "Content-Type: application/json",
        "api_key: QXBpIGtleSDRgdC10YDQstC10YDQsCA=",
        "Accept: application/json"
    );

    protected $params = [];

    private $GET = "GET";
    private $POST = "POST";

    function post()
    {
        $this->method = $this->POST;
        return $this;
    }

    function get()
    {
        $this->method = $this->GET;
        return $this;
    }

    function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    function baseUrl($url)
    {
        $this->baseUrl = $url;
        return $this;
    }

    function addHeader($header)
    {
        $this->headers[] = $header;
        return $this;
    }

    function addHeaderWithValue($name, $value)
    {
        $this->headers[] = "$name: $value";
        return $this;
    }

    function addParamWithName($name, $value)
    {
        $this->params[$name] = $value;
        return $this;
    }

    function build()
    {
        $curl = curl_init($this->baseUrl);
        $url = $this->baseUrl . '?' . http_build_query($this->params);
        echo $url;
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->body);
        return new RequestBuilder($curl);
    }
}

class RequestBuilder
{

    static function newBuilder()
    {
        return new Builder();
    }

    private $curl;

    public function __construct($curl)
    {
        $this->curl = $curl;
    }

    function sendRequest()
    {
        $resp = curl_exec($this->curl);
        curl_close($this->curl);
        return $resp;
    }
}