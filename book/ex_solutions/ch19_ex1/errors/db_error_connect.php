<?php include 'view/header.php'; ?>
<div id="content">
    <h1>Database Error</h1>
    <p>An error occurred connecting to the database.</p>
    <p>The database must be installed as described in the appendix.</p>
    <p>MySQL must be running as described in chapter 1.</p>
    <p>Error message: <?php echo $error_message; ?></p>
    <p>&nbsp;</p>
</div><!-- end content -->
<?php include 'view/footer.php'; ?>