<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
    <div id="content">
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } // end if ?>
    <form action="display_results.php" method="post">
        <div id="data">
        <label>Investment Amount:</label>
        <select name="investment">
        <?php for ($v = 10000; $v <= 50000; $v += 5000) : ?>
            <option value="<?php echo $v; ?>" >
                <?php echo $v; ?>
            </option>
        <?php endfor; ?>
        </select><br />

        <label>Yearly Interest Rate:</label>
        <select name="interest_rate">
        <?php for ($v = 4; $v <= 12; $v += .5) : ?>
            <option value="<?php echo $v; ?>" ><?php echo $v; ?>
            </option>
        <?php endfor; ?>
        </select><br />

        <label>Number of Years:</label>
        <input type="text" name="years"
                   value="<?php echo $years; ?>"/><br />
        </div>
        
        <div id="buttons">
        <label>&nbsp;</label>
        <input type="submit" value="Calculate"/><br />
        </div>
    </form>
    </div>
</body>
</html>
