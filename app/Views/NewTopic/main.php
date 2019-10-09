<div id="topic" class="box form">
	<h2>Criar tópico</h2>

	<form method="POST">
		<label for="title">Título</label>
		<input type="text" name="title" id="title">

		<label for="forum">Forum</label>
		<select name="forum" id="forum">
			<?php foreach ($forums as $forum): ?>
				<option value="<?= $forum['id'] ?>"><?= $forum['name'] ?></option>
			<?php endforeach; ?>
		</select>
		
		<label for="editor">Texto</label>
		<textarea name="content" id="editor"></textarea>

		<div class="error-msg"></div>
	
		<button type="submit" class="button">Postar</button>
	</form>
</div>