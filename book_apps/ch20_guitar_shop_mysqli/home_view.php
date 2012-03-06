<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<div id="content">
    <p><br />My Guitar Shop has a great selection of
        musical instruments including guitars, basses, and drums. And we're
        constantly adding more to give you the best selection possible!
    </p>

    <!-- display product -->
    <h1>Featured products</h1>
    <table>
    <?php foreach ($products as $product) :
        // Get product data
        $list_price = $product['listPrice'];
        $discount_percent = $product['discountPercent'];
        $description = $product['description'];
        
        // Calculate unit price
        $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
        $unit_price = $list_price - $discount_amount;

        // Get first paragraph of description
        $description = add_tags($description);
        $i = strpos($description, "</p>");
        $description = substr($description, 3, $i-3);
    ?>
        <tr>
            <td id="product_image_column">
                <img src="images/<?php echo $product['productCode']; ?>_s.png"
                     alt="&nbsp;">
            </td>
            <td>
                <p>
                    <a href="catalog?action=view_product&amp;product_id=<?php 
                              echo $product['productID']; ?>">
                        <?php echo $product['productName']; ?>
                    </a>
                </p>
                <p>
                    <b>Your price:</b>
                    $<?php echo number_format($unit_price, 2); ?>
                </p>
                <p>
                    <?php echo $description; ?>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
<?php include 'view/footer.php'; ?>