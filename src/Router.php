<?php
class Router
{
    private $routes;

    public function __construct($routesFile)
    {
        // Cargar las rutas desde el archivo JSON
        $this->routes = json_decode(file_get_contents($routesFile), true);
    }

    public function dispatch(Request $request, Response $response)
    {
        $uri = $request->uri; 
        $method = $request->method; 

        if (isset($this->routes[$uri]) && $this->routes[$uri]['method'] === $method) {
            list($controllerName, $action) = explode("::", $this->routes[$uri]['handler']);

            require_once 'src/controllers/' . $controllerName . '.php';

            $controller = new $controllerName();

            $controller->$action($request, $response);
        } else {
            $response->send(404, ["error" => "Ruta no encontrada"]);
        }
    }
}
