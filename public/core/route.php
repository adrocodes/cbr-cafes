<?php

namespace Core;

class Route
{
  public $paths = array();

  public function add(string $path, callable $controller): Route
  {
    $this->paths[$path] = $controller;

    return $this;
  }
}
