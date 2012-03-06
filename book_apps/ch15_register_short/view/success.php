<?php include 'header.php'; ?>
<div id="content">
    <h2>Success</h2>
    <p>The following registration information has been successfully
       submitted.</p>
    <ul>
        <li>First Name: <?php echo htmlspecialchars($firstName); ?></li>
        <li>Last Name: <?php echo htmlspecialchars($lastName); ?></li>
        <li>Phone: <?php echo htmlspecialchars($phone); ?></li>
        <li>Email: <?php echo htmlspecialchars($email); ?></li>
    </ul>
</div>
<?php include 'footer.php'; ?>