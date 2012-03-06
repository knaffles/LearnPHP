<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Loop Tester</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>

<body>
<div id="content">
    <h1>Loop Tester</h1>
    <h2>Process Scores</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="process_scores" />

        <label>Score 1:</label>
        <input type="text" name="scores[]"
               value="<?php echo $scores[0]; ?>"/><br />

        <label>Score 2:</label>
        <input type="text" name="scores[]"
               value="<?php echo $scores[1]; ?>"/><br />

        <label>Score 3:</label>
        <input type="text" name="scores[]"
               value="<?php echo $scores[2]; ?>"/><br />

        <label>&nbsp;</label>
        <input type="submit" value="Process Scores" /><br />

        <label>Scores:</label>
        <span><?php echo $scores_string; ?></span><br />

        <label>Score Total:</label>
        <span><?php echo $score_total; ?></span><br />

        <label>Average Score:</label>
        <span><?php echo $score_average; ?></span><br />
    </form>
    <br />
    <h2>Process 1000 Die Rolls</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="process_rolls" />

        <label>Number to Roll:</label>
        <select name="number_to_roll">
            <!-- TODO: Use a for loop to display these options ! -->
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br />

        <label>&nbsp;</label>
        <input type="submit" value="Process Rolls" /><br />

        <label>Maximum Rolls:</label>
        <span><?php echo $max_rolls; ?></span><br />

        <label>Average Rolls:</label>
        <span><?php echo $average_rolls; ?></span><br />

    </form>

</div>
</body>
</html>