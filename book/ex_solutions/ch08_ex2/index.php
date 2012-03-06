<?php

if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
}

switch ($action) {
    case 'start_app':
        $scores = array();
        $scores[0] = 70;
        $scores[1] = 80;
        $scores[2] = 90;
        break;
    case 'process_scores':
        $scores = $_POST['scores'];

        // validate the scores
        $is_valid = true;
        for ($i = 0; $i < count($scores); $i++) {
            if (empty($scores[$i]) || !is_numeric($scores[$i])) {
                $scores_string = 'You must enter three valid numbers for scores.';
                $is_valid = false;
                break;
            }
        }
        if (!$is_valid) {
            break;
        }

        // process the scores
        $scores_string = '';
        $score_total = 0;
        foreach ($scores as $s) {
            $scores_string .= $s . '|';
            $score_total += $s;
        }
        $scores_string = substr($scores_string, 0, strlen($scores_string)-1);

        // calculate the average
        $score_average = $score_total / count($scores);
        
        // format the total and average
        $score_total = number_format($score_total, 2);
        $score_average = number_format($score_average, 2);

        break;
    case 'process_rolls':
        $number_to_roll = $_POST['number_to_roll'];

        $total = 0;       
        $max_rolls = -INF;

        for ($count = 0; $count < 10000; $count++) {
            $rolls = 1;
            while (mt_rand(1, 6) != $number_to_roll) {
                $rolls++;
            }
            $total += $rolls;            
            $max_rolls = max($rolls, $max_rolls);
        }
        $average_rolls = $total / $count;

        break;
}
include 'loop_tester.php';
?>