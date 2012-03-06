<?php
    require('secure_conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <div id="page">
            <div id="header">
                <h1>My Guitar Shop</h1>
            </div>
            <div id="main">
                <h1>SSL</h1>
                <p>This page contains sensitive data.</p>
                <p><a href="index.php">
                       Continue using a secure connection</a></p>
                <p><a href="http://localhost/book_apps/ch21_ssl/index.php">
                       Return to a regular connection</a></p>
            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>