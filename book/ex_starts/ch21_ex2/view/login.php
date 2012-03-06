<?php
    require_once('util/secure_conn.php');  // require a secure connection
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

            <h1>Login</h1>
            
            <form action="." method="post" id="login_form" class="aligned">
                <input type="hidden" name="action" value="login"/>

                <label>Email:</label>
                <input type="text" class="text" name="email" />
                <br />

                <label>Password:</label>
                <input type="password" class="text" name="password" />
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Login"/>
            </form>
            
            <p><?php echo $login_message; ?></p>
            
            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>