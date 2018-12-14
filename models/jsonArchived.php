<?php
if(isset($_POST["text"])) {
$text = $_POST["text"];
foreach ($text as $key => $value) {
    print_r($value."<br>");
    $file = "todo.json";
    $fileJson = file_get_contents("todo.json");
    $arrayJson = json_decode($fileJson, true);
    // print_r($arrayJson);
    $arrayJson[$key]["archived"] = 0; // replace value to true
    $encode = json_encode($arrayJson, JSON_FORCE_OBJECT);
    // var_dump($encode);
    file_put_contents($file, $encode);
    // header("Location: ../controllers/index.php");
}
}
?>
