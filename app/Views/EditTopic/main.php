<div id="edit-topic" class="box form">
	<h2>Editar tópico</h2>

	<form method="POST">
		<label for="id">ID</label>
		<input type="text" name="id" id="id" value="<?= $topic['id'] ?>" readonly>

		<label for="title">Título</label>
		<input type="text" name="title" id="title" value="<?= $topic['title'] ?>">

		<label for="forum">Forum</label>
		<select name="forum" id="forum">
			<?php foreach ($forums as $forum): ?>
				<option value="<?= $forum['id'] ?>" <?= ($forum['id'] == $topic['id_forum']) ? 'selected' : '' ?>>
					<?= $forum['name'] ?>
				</option>
			<?php endforeach; ?>
		</select>
		
		<textarea name="content" id="editor">
			<?= $topic['content'] ?>
		</textarea>

		<div class="error-msg"></div>
	
		<button type="submit" class="button">Editar</button>
	</form>
</div>