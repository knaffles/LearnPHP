<?php include 'header.php'; ?>
<div id="main">
    <h1>Error</h1>
    <p>The following error(s) occurred:</p>
    <ul>
        <?php foreach ($errors as $error) : ?>
        <li><?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php include 'footer.php'; ?>