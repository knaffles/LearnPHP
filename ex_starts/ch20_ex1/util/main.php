<?php
// Get the document root
$doc_root = $_SERVER['DOCUMENT_ROOT'];

// Get the application path
$uri = $_SERVER['REQUEST_URI'];
$dirs = explode('/', $uri);
$app_path = '/' . $dirs[1] . '/' . $dirs[2] . '/';

// Set the include path
set_include_path($doc_root . $app_path);

// Start session to store user and cart data
// session_start();
?>