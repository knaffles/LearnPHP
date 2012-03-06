<?php
if (isset($_POST['tasklist'])) {
    $task_list = $_POST['tasklist'];
} else {
    $task_list = array();

    // some hard-coded starting values to make testing easier
    $task_list[] = 'Write chapter';
    $task_list[] = 'Edit chapter';
    $task_list[] = 'Proofread chapter';
}

$errors = array();

switch( $_POST['action'] ) {
    case 'Add Task':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
        }
        break;
    case 'Delete Task':
        $task_index = $_POST['taskid'];
        unset($task_list[$task_index]);
        $task_list = array_values($task_list);
        break;
/*
    case 'Modify Task':
    
    case 'Save Changes':
    
    case 'Cancel Changes':
    
    case 'Promote Task':
        
    case 'Sort Tasks':
    
*/
}

include('task_list.php');
?>