<!-- Form pour archived -->
<section class="todoGroup">
	<section class="cardGroup">
	<h3><i class="far fa-file-alt"></i> Liste des tâches</h3>
	<div class="listGroup">
		<form id="addArchived">
			<div class="form-check">
			<div id="todoList">
			</div><!-- emplacement pour mes todo -->
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
