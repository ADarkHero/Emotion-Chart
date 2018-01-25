<?php
    $search_limit = 20;

    if(isset($_GET["search"]) && $_GET["search"] !== ""){
        $search = '%'.$_GET["search"].'%';	//Search term can be on the beginning, middle or end
        $sql = "SELECT * FROM ".$table_name." WHERE ";
        for($i = 0; $i < sizeof($tables); $i++){
            $sql = $sql.$tables[$i].' LIKE "'.$search.'" OR ';
        }
        $sql = substr($sql, 0, -3); //Cut last "OR"
        $chart_title = 'Latest '.$search_limit.' entries for "'.$_GET["search"].'" are shown.';
    }
    else{
        $sql = "SELECT * FROM ".$table_name." ORDER BY ".$tables[1]." DESC LIMIT ".$search_limit;      
        $chart_title = 'Latest '.$search_limit.' entries are shown.';
    }
    $statement = $pdo->prepare($sql);
    $result = $statement->execute();
    
    
?>