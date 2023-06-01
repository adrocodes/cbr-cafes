<?php

namespace Core;

function crawl_site_directory(string $site_dir): array
{
  $result = array();
  $files = array_diff(scandir($site_dir), array('.', '..'));

  foreach ($files as $value) {
    $path = $site_dir . DIRECTORY_SEPARATOR . $value;

    if (!is_dir($path)) {
      $path = explode('site/', $path)[1];

      $result[] = "/" . trim(str_replace("page.php", "", $path), "/");
    } else if (is_dir($path)) {
      $result = array_merge($result, crawl_site_directory($path));
    }
  }

  return $result;
}
