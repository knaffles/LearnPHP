<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Upload Image</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <div id="page">
            <div id="header">
                <h1>Upload Image</h1>
            </div>
            <div id="main">
                <h2>Images to be uploaded</h2>
                <form action="." method="POST"
                      enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload"/>
                    <label>File 1:</label>
                    <input type="file" name="file1"/><br />
                    <label>File 2:</label>
                    <input type="file" name="file2"/><br />
                    <label>File 3:</label>
                    <input type="file" name="file3"/><br />
                    <input id="upload_button" type="submit" value="Upload"/>
                </form>
                <h2>Images in the directory</h2>
                <?php if (count($files) == 0) : ?>
                    <p>No images uploaded.</p>
                <?php else: ?>
                    <ul>
                    <?php foreach($files as $filename) :
                        $file_url = $image_dir . '/' .
                                    $filename;
                        $delete_url = '.?action=delete&filename=' .
                                      urlencode($filename);
                    ?>
                        <li>
                            <a href="<?php echo $delete_url;?>">
                                <img src="delete.png" alt="Delete"/></a>
                            <a href="<?php echo $file_url; ?>">
                                <?php echo $filename; ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div><!-- end main -->
        </div><!-- end page -->
    </body>
</html>