<?php

    $data = "[";
    $labels = "[";
    $average = "[";
    $paverage = "[";
    $pnumber = 0;
    for($i = 0; $row = $statement->fetch(); $i++) {
        $labels = $labels.'"'.$row[1].'", ';
        $data = $data.'"'.$row[2].'", ';
        $average = $average.'"3.5", ';
        $pnumber = $pnumber + $row[2];
        $pcalculated = $pnumber / ($i+1);
        $paverage = $paverage.'"'.$pcalculated.'", ';
    }
    $data = substr($data, 0, -2);
    $labels = substr($labels, 0, -2);
    $average = substr($average, 0, -2);
    $paverage = substr($paverage, 0, -2);
    $data = $data."],";
    $labels = $labels."],";
    $average = $average."],";
    $paverage = $paverage."],";
    
?>
