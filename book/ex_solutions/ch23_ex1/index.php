<?php
require_once 'file_util.php';  // the get_file_list function
require_once 'image_util.php'; // the process_image function

$image_dir = 'images';
$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;

$action = '';
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

function upload_file($name) {
    global $image_dir_path;
    if (isset($_FILES[$name])) {
        $filename = $_FILES[$name]['name'];
        if (empty($filename)) {
            return;
        }
        $source = $_FILES[$name]['tmp_name'];
        $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
        move_uploaded_file($source, $target);

        // create the '400', '250', and '100' versions of the image
        process_image($image_dir_path, $filename);
    }
}

switch ($action) {
    case 'upload':
        upload_file('file1');
        upload_file('file2');
        upload_file('file3');
        break;
    case 'delete':
        $filename = $_GET['filename'];
        $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($target)) {
            unlink($target);
        }
        break;
}

$files = get_file_list($image_dir_path);
include('uploadform.php');
?>