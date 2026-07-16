<?php
// router.php for PHP Built-in Web Server
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Automatically redirect empty path or root to home.php
if ($uri === '/' || $uri === '') {
    header("Location: /home.php");
    exit();
}

$file = __DIR__ . $uri;

// If it's a real file, let PHP server serve it directly
if (is_file($file)) {
    return false;
}

// Otherwise, serve our custom 404 page
http_response_code(404);
include __DIR__ . '/404.php';
exit();
