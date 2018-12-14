// SCRIPT JS - JQUERY
//
// ********* FC LOAD *********
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
				<del><input type="checkbox" name="text[${key}]" value="${val[key].text}" id="text" class="form-check-input inputcheck" checked="checked" disabled="disabled">
				<label for="text[${key}]" class="form-check-label"><del>${val[key].text}</del></label><br>`
            }
		}
}
request.open('POST', "../models/todo.json", true);
request.send();
}
load();

// ********* AJAX *********
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
			load();
		}, 100);
	}); // end sendData()
    
    // écoute sur l'archivation FORM
    var formArch = document.getElementById("addArchived");
	formArch.addEventListener("submit", function (event) {
		event.preventDefault();
		sendData("POST", "../models/jsonArchived.php", formArch);
		setTimeout(() => {
			load();
		}, 100);
	}); // end sendData()
});
// end écoute sur window load

// ********* ANIMATE JQUERY *********
$(".todo").click(function(){
	alert("coco");
});


// ********* ECOUTE TEXTAREA *********
// supp le placeholder
$("#todo").click((event) => {
    event.target.placeholder = "";
});

// limite à 30charactère
$("#todo").on('input', (event) => {
    event.target.placeholder = "";
    event.target.value = event.target.value.substring(0, 30);
    
});