<?php

namespace Controllers;

use Core\Controller;

class Home
{
  public static function index()
  {
    Controller::view('home', ['name' => 'World']);
  }

  public static function about()
  {
    Controller::view('home', ['name' => 'About']);
  }
}
