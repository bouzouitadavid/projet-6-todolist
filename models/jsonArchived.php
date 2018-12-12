<?php
if(isset($_POST["text"])) {
$keys = $_POST["text"];
// print_r($keys);
$values = array_keys($keys)[0];
// print_r($values);
    $file = "todo.json";
    $fileJson = file_get_contents("todo.json");
    $arrayJson = json_decode($fileJson, true);
    // print_r($arrayJson);
    $arrayJson[$values]["archived"] = 0; // replace value to true
    $encode = json_encode($arrayJson, JSON_FORCE_OBJECT);
    // var_dump($encode);
    file_put_contents($file, $encode);
    // header("Location: http://192.168.64.3/becode/projet-6-todolist/controllers/index.php?play=1");
}
?>
