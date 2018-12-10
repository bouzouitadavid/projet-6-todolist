<h3>Controller</h3>
<form method="post" action="../models/jsonArchived.php">


<?php 

    $fileJson = file_get_contents("../models/todo.json");
    $arrayJson = json_decode($fileJson, true);
    foreach ($arrayJson as $key => $value) {
        $text = $arrayJson[$key]["text"];
        $archived = $arrayJson[$key]["archived"];
        if($archived == 1) {
            echo '<input type="checkbox" name="text[]" value="todo" id="text">'.$text.'<br>';
        } else {
            echo '<input type="checkbox" name="text[]" value="todo" disabled="disabled">'.$text.'<br>';
        }
    }
?>
<input type="checkbox" name="text[]" value="todo" id="text">
    <input type="submit" value="Archiver">
</form>
<div id="demo">COUCOU</div>

<h3>Ajouter</h3>
<form method="post" action="../models/formAdd.php">
<textarea name="todo" id="todo" cols="0" rows="3"></textarea>
<input type="submit" value="Ajouter">
</form>
<script>
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    let test = myObj;
    document.getElementById("demo").innerHTML = test;

  }
};
xmlhttp.open("GET", "../models/todo.json", true);
xmlhttp.send();
</script>