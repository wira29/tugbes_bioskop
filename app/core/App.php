<?php
require_once 'Controller.php';
require_once 'Koneksi.php';
require_once 'Route.php';

class App
{
  protected $controller = 'login';
  protected $method = 'index';
  protected $params = [];
  protected $routes;

  public function __construct()
  {
    $this->routing();
  }
  private function routing()
  {
    $routes = Route::getRoutes();

    $requestUri = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    foreach ($routes as  $route => $callback) {
      list($method, $uri) = explode('@', $route);
      $pattern = "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($uri)) . "$@D";
      if ($requestMethod == $method && preg_match($pattern, $requestUri, $params)) {
        list($controller, $action) = explode('@', $callback);
        array_shift($params);
        $controllerPath = './app/controllers/' . $controller . '.php';
        if (file_exists($controllerPath)) {
          require_once $controllerPath;
          $controller = new $controller();
          return call_user_func_array([$controller, $action], $params);
        }
      }
    }
    // if not found
    require_once './app/views/404.php';
  }
}
