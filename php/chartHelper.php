<?php

    $data = "[";
    $labels = "[";
    $average = "[";
    $paverage = "[";
    $pnumber = 0;
    
    //Writes the data into an array, so I can read it in reverse order later on.
    while($row = $statement->fetch()){
	    $newData[] = $row;
	}
	
	for($i = count($newData)-1; $i >= 0; $i--) {
        $labels = $labels.'"'.$newData[$i][1].'", ';
        $data = $data.'"'.$newData[$i][2].'", ';
        $average = $average.'"3.5", ';
        $pnumber = $pnumber + $newData[$i][2];
        $pcalculated = $pnumber / (count($newData)-$i);
        $paverage = $paverage.'"'.$pcalculated.'", ';
    }
    echo $i;
    $data = substr($data, 0, -2);
    $labels = substr($labels, 0, -2);
    $average = substr($average, 0, -2);
    $paverage = substr($paverage, 0, -2);
    $data = $data."],";
    $labels = $labels."],";
    $average = $average."],";
    $paverage = $paverage."],";
    
?>
