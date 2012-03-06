<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Number Tester</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
        <h1>Number Tester</h1>
        <form action="." method="post">
        <input type="hidden" name="action" value="process_data"/>

        <label>Number 1:</label>
        <input type="text" name="number1"
               value="<?php echo htmlspecialchars($number1); ?>"/>
        <br />

        <label>Number 2:</label>
        <input type="text" name="number2"
               value="<?php echo htmlspecialchars($number2); ?>"/>
        <br />

        <label>Number 3:</label>
        <input type="text" name="number3"
               value="<?php echo htmlspecialchars($number3); ?>"/>
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Submit" />
        <br />

        </form>

        <h2>Message:</h2>
        <p><?php echo nl2br(htmlspecialchars($message)); ?></p>

    </div>
</body>
</html>