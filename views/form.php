<!-- Form pour archived -->
<h3>Controller</h3>
<form id="addArchived" enctype="multipart/form-data">
<div id="todoList"></div><!-- emplacement pour mes todo -->
<input type="submit" value="Archiver">
</form>


<h3>Ajouter</h3>
<form id="addTodo" enctype="multipart/form-data">
<textarea name="todo" id="todo" cols="0" rows="3"></textarea>
<input type="submit" value="Ajouter">
</form>


<!-- AJAX -->
<script>
window.addEventListener("load", function () {
	function sendData(method, target, form) {
		let request = new XMLHttpRequest();
		let FD = new FormData(form);
		request.addEventListener("load", function(event) {
		//   alert(event.target.responseText);
		//   console.log(event.target.responseText)
		});
		request.addEventListener("error", function(event) {
			alert('Oups! Quelque chose s\'est mal passé.');
		});
		request.open(method, target);
		request.send(FD);
	}

    // écoute sur l'ajout d'élément FORM
    var formAdd = document.getElementById("addTodo");
	formAdd.addEventListener("submit", function (event) {
		// event.preventDefault();
		sendData("POST", "../models/formAdd.php", formAdd);
        document.getElementById("todo").value = "";
		load();
	}); // end sendData()
    
    // écoute sur l'archivation FORM
    var formArch = document.getElementById("addArchived");
	formArch.addEventListener("submit", function (event) {
		// event.preventDefault();
		sendData("POST", "../models/jsonArchived.php", formArch);
		load();
	}); // end sendData()
});// end écoute sur window load

// charge les éléments et les affiches sur la page
function load() {
document.getElementById("todoList").innerHTML = "";
var request = new XMLHttpRequest();
request.open('POST', "../models/todo.json");
request.responseType = 'text';

request.onload = function() {
	count = request.response.split("},").length;
	val = request.responseText;
	val = JSON.parse(val)
	console.log(val);
		for (const key in val) {
		    if(val[key].archived == 1) {
						document.getElementById("todoList").innerHTML += `<input type="checkbox" name="text[${key}]" value="${val[key].text}" id="text"><label for="text[${key}]">${val[key].text}</label><br>`
            } else {
                        document.getElementById("todoList").innerHTML += `<input type="checkbox" name="text[${key}]" value="${val[key].text}" id="text" disabled="disabled"><label for="text[${key}]" style="background:red">${val[key].text}</label><br>`
            }
		}
};
request.send();
} //end load()
// je lance load pour qu'elle se lance au lancement de la page
load();
</script>
