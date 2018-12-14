<!-- Form pour archived -->
<section class="todoGroup">
<!-- <header>
<ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Dernière ajout => <span>Faire le sapin</span></div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
</header> -->
	<section class="cardGroup">
	<!-- <h1>Coucou toi !</h1> -->
	<h3><i class="far fa-file-alt"></i> Liste des tâches</h3>
	<div class="listGroup">
		<form id="addArchived">
			<div class="form-check">
			<div id="todoList"></div><!-- emplacement pour mes todo -->
			</div>
			<input id="btn-archiver" class="btn mt-3" type="submit" value="Archiver">
		</form>
	</div>
	</section>
	<section class="cardGroup">
		<h3><i class="far fa-edit"></i> Ajouter une tâche</h3>
		<div class="addGroup">
		<form id="addTodo">
			<div class="form-group">
			<textarea name="todo" id="todo" class="form-control" rows="3" placeholder="ex : Faire les courses"></textarea>
			</div>
			<input class="btn" type="submit" value="Ajouter">
		</form>
		</div>
	</section>

	<section class="cardGroup">
	<h3><i class="far fa-paper-plane"></i> Tâches archivée</h3>
		<div class="archivedGroup">
		<div class="form-check">
			<div id="todoArchived"></div><!-- emplacement pour mes archive -->
		</div>
		</div>
	</section>
</section> <!-- end todoGroup-->

<script>
function load() {
var request = new XMLHttpRequest();
request.reponseType = "json";
request.onload = function() {
	// count = request.response.split("},").length; // pas besoin mais c cool 
	console.log(request.response);
	val = request.response;
	val = JSON.parse(val);
    document.getElementById("todoList").innerHTML = "";
	document.getElementById("todoArchived").innerHTML = "";
		for (const key in val) {
		    if(val[key].archived == 1) {
				document.getElementById("todoList").innerHTML += `
				<input type="checkbox" name="text[${key}]" value="${val[key].text}" id="text" class="form-check-input inputcheck">
				<label for="text[${key}]" class="form-check-label">${val[key].text}</label><br>`
            } else {
                document.getElementById("todoArchived").innerHTML += `
				<input type="checkbox" name="text[${key}]" value="${val[key].text}" id="text" class="form-check-input inputcheck" disabled="disabled">
				<label for="text[${key}]" class="form-check-label">${val[key].text}</label><br>`
            }
		}
}
request.open('POST', "../models/todo.json", true);
request.send();
}
load();
</script>

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
		event.preventDefault();
		sendData("POST", "../models/formAdd.php", formAdd);
        document.getElementById("todo").value = ""; // je vide le champ textarea
		 setTimeout(() => {
			load()
		}, 100);
	}); // end sendData()
    
    // écoute sur l'archivation FORM
    var formArch = document.getElementById("addArchived");
	formArch.addEventListener("submit", function (event) {
		event.preventDefault();
		sendData("POST", "../models/jsonArchived.php", formArch);
		setTimeout(() => {
			load()
		}, 100);
	}); // end sendData()
});// end écoute sur window load
</script>
<script>
// script pour cacher et montrer le btn archiver

	// input = document.getElementById("btn-archiver")
	// check = document.querySelectorAll("input[type=checkbox]")
	// check.forEach(element => {
	// 	element.addEventListener("click", function(){
	// 	alert("coco")
	// })
	// });
</script>