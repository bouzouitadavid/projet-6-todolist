<?php
if(isset($_POST["todo"]) && !empty($_POST["todo"])) {
    // SANITIZE
    $options = array(
    'todo' 	=> FILTER_SANITIZE_STRING,);
    $result = filter_input_array(INPUT_POST, $options); 
        if ($result != null AND $result != FALSE) {            
            $text = $result['todo'];
        }
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
        $person = new todo(array('text' => $text, 'archived' => true, "time" => time()));
            array_push($arrayJson, $person);
            $encode = json_encode($arrayJson, JSON_FORCE_OBJECT);
            file_put_contents($file, $encode);
            // header("Location: ../controllers/index.php");
} // sinon ne rien faire
?>