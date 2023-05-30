<?php

namespace Core;

class Controller
{
  public static function view(string $view, array $data = [])
  {
    extract($data);

    require_once __DIR__ . '/../views/' . $view . '.php';
  }
}
