<?php
    $text = $_POST["todo"];
    $file = "todo.json";
    $fileJson = file_get_contents("todo.json");
    $arrayJson = json_decode($fileJson, true);
class todo
{
    public function __construct(array $data) 
    {
        $this->text = $data['text'];
        $this->archived = $data['archived'];
        $this->time = $data['time'];
    }
}
$person = new todo(array('text' => $text, 'archived' => true, "time" => "2018"));
    array_push($arrayJson, $person);
    $fini = json_encode($arrayJson);
    var_dump($fini);
    file_put_contents($file, $fini);
    header("Location: http://192.168.64.3/becode/projet-6-todolist/controllers/index.php");

?>