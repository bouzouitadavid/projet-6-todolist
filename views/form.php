<h3>Controller</h3>
<div id="demo">Emplacement pour mes todo</div>

<form method="post" action="../models/jsonArchived.php">

<!-- <?php 
// function putTodo() {
//     $fileJson = file_get_contents("../models/todo.json");
//     $arrayJson = json_decode($fileJson, true);
//     foreach ($arrayJson as $key => $value) {
//         $text = $arrayJson[$key]["text"];
//         $archived = $arrayJson[$key]["archived"];
//         if($archived == 1) {
//             echo '<input type="checkbox" name="text[]" value="'.$key.'" id="text"><label>'.$text.'</label><br>';
//         } else {
//             echo '<input type="checkbox" name="text[]" value="todo" disabled="disabled"><label style="background-color:red; color:white">'.$text.'</label><br>';
//         }
//     }
// }
?> -->
<!-- <input type="checkbox" name="text[]" value="todo" id="text"> -->
<input type="submit" value="Archiver DONT TOUCH !!!">
</form>


<h3>Ajouter</h3>
<form id="addTodo" enctype="multipart/form-data">
<textarea name="todo" id="todo" cols="0" rows="3"></textarea>
<input type="submit" value="Ajouter">
</form>


<!-- AJAX -->
<script>

window.addEventListener("load", function () {
  function sendData() {
    var XHR = new XMLHttpRequest();
    var FD = new FormData(form);
    XHR.addEventListener("load", function(event) {
        document.getElementById("demo").innerHTML = "";
    //   alert(event.target.responseText);
    //   console.log(event.target.responseText)
    //   val = event.target.responseText;
    //   val = JSON.parse(val)
    // //   console.log(val[0].text);
    //   for (let i = 0; i < 10; i++) {
    //         document.getElementById("demo").innerHTML = val[i].text
    //   }
    });
    XHR.addEventListener("error", function(event) {
      alert('Oups! Quelque chose s\'est mal passé.');
    });
    XHR.open("POST", "../models/formAdd.php");
    XHR.send(FD);
  }
  var form = document.getElementById("addTodo");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    sendData();
    load();
  });
  
});
</script>
<!-- <script>

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("demo").innerHTML = 
            }
        };
        xmlhttp.open("POST", "../models/formAdd.php");
        xmlhttp.send();
    

</script> -->
<script>
function load() {
var request = new XMLHttpRequest();
request.open('GET', "../models/todo.json");
request.responseType = 'text';

request.onload = function() {

  val = request.responseText;
      val = JSON.parse(val)
    //   console.log(val[1].text);
      for (let i = 0; i < val.length ; i++) {
            document.getElementById("demo").innerHTML += `<input type="checkbox" name="text[]" value="'.$key.'" id="text"><label>${val[i].text}</label><br>`
      }

};
request.send();
}
</script>
