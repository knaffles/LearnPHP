<?php

// start the session with a persistent cookie of 1 year
$lifetime = 60 * 60 * 24 * 365;             // 1 year in seconds
session_set_cookie_params($lifetime, '/');
session_start();

// get the array of tasks from the session
if (isset($_SESSION['tasklist'])) {
    $task_list = $_SESSION['tasklist'];
} else {
    $task_list = array();
}

$errors = array();

switch($_POST['action']) {
    case 'add':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
        }
        break;
    case 'delete':
        $task_index = $_POST['taskid'];
        unset($task_list[$task_index]);
        $task_list = array_values($task_list);
        break;
}

// set the array of tasks in the session
$_SESSION['tasklist'] = $task_list;

include('task_list.php');

?>