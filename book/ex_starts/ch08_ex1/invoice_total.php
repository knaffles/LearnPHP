<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Invoice Total Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div id="content">
        <h1>Invoice Total Calculator</h1>
        <p>Enter the values below and click "Calculate".</p>
        <form action="." method="post">
            <div id="data" >
            <label>Customer Type:</label>
            <input type="text" name="type" 
                   value="<?php echo $customer_type; ?>"/><br />

            <label>Invoice Subtotal:</label>
            <input type="text" name="subtotal"
                   value="<?php echo $invoice_subtotal; ?>"/><br />

            <label>Discount Percent:</label>
            <input type="text" disabled="disabled" 
                   value="<?php echo $percent; ?>" />%<br />

            <label>Discount Amount:</label>
            <input type="text" disabled="disabled"
                   value="<?php echo $discount; ?>" /><br />

            <label>Invoice Total:</label>
            <input type="text" disabled="disabled"
                   value="<?php echo $total; ?>" /><br />
            </div>
            <div id="buttons" >
            <label>&nbsp;</label>
            <input type="submit" value="Calculate" id="calculate_button" /><br />
            </div>
        </form>

    </div>
</body>
</html>