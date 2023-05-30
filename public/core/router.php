<?php

namespace Core;

class Router
{
  private array $route_groups = array();

  public function register(Route $route, $group = '')
  {
    if (key_exists($group, $this->route_groups)) {
      $this->route_groups[$group] = array_merge($this->route_groups[$group], $route);
    } else {
      $this->route_groups[$group] = $route;
    }
  }

  public function lookup()
  {
    $path = $_SERVER['REQUEST_URI'];
    $parts = explode('/', $path);

    $first = $parts[0];

    if (key_exists($first, $this->route_groups)) {
      $this->route_groups[$first]->paths[$path]();
    } else {
      echo '404';
    }
  }
}
