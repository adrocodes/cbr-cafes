<?php

// ob_clean();

// header_remove();

// header("Content-type: application/json");

http_response_code(200);

echo json_encode([
  "message" => "Hello, World!"
]);
