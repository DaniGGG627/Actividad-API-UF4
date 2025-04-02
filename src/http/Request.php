<?php
class Request
{
    public $method;
    public $uri;
    public $parameters;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD']; 
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
        $this->parameters = [];

        $this->parseParameters();
    }

    public function parseParameters()
    {
        switch ($this->method) {
            case 'GET':
                $this->parameters = $_GET;
                break;
            case 'POST':
            case 'PUT':
            case 'DELETE':
                parse_str(file_get_contents('php://input'), $this->parameters);
                break;
        }
    }
}
