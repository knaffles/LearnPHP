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

<h2>Add Item</h2>
<form action="." method="post">
    <input type="hidden" name="action" value="add"/>

    <label>Name:</label>
    <select name="productkey">
    <?php foreach($products as $key => $product) :
        $cost = number_format($product['cost'], 2);
        $name = $product['name'];
        $item = $name . ' ($' . $cost . ')';
    ?>
        <option value="<?php echo $key; ?>">
            <?php echo $item; ?>
        </option>
    <?php endforeach; ?>
    </select><br />

    <label>Quantity:</label>
    <select name="itemqty">
    <?php for($i = 1; $i <= 10; $i++) : ?>
        <option value="<?php echo $i; ?>">
            <?php echo $i; ?>
        </option>
    <?php endfor; ?>
    </select><br />

    <label>&nbsp;</label>
    <input type="submit" value="Add Item"/>
</form>
<p><a href=".?action=show_cart">View Cart</a></p>

            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>