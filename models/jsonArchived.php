<?php
$clef = $_POST["text"];
// print_r($clef);
$values = array_values($clef)[0];

    $file = "todo.json";
    $fileJson = file_get_contents("todo.json");
    $arrayJson = json_decode($fileJson, true);
    print_r($arrayJson);
    $arrayJson[$values]["archived"] = 0;
    $fini = json_encode($arrayJson);
    // var_dump($fini);
    file_put_contents($file, $fini);
    header("Location: http://192.168.64.3/becode/projet-6-todolist/controllers/index.php");

?>