<?php

namespace Routers;

class Routeur
{
   public $routes=[];
   public $pathParams=[];

    public function get(string $url, string $action)
  {
    $this->routes['GET'][$url]=$action;
  }

  public function post(string $url, string $action)
  {
    $this->routes['POST'][$url]=$action;
  }

  public function run()
  {
    $userPath=$_SERVER['REQUEST_URI'];
    $userPath=explode('?', $userPath)[0];
    $method=$_SERVER['REQUEST_METHOD'];
    foreach ($this->routes[$method] as $path => $action)
    {

      if($this->checkRoute($path, $userPath))
      {
        $a=explode('@', $action);
        $method=$a[1];
        $controller= 'Controllers\\'.$a[0];
        $controller=new $controller();
        $controller->$method($this->pathParams);
        return;
      }
    }
  
  }

 public function checkRoute($pathServer, $pathUser)
    {
       $pathServer = preg_replace('#:([\w]+)#', '([^/]+)', $pathServer);
       $pathRegex = "#^$pathServer$#";
      //  var_dump($pathServer);
      //  echo '<br>';
        if (preg_match($pathRegex, $pathUser, $pathParams)) {
            $this->pathParams = array_slice($pathParams, 1);
            return true;
        }

        return false;
    }

}


