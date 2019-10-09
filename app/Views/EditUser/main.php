<div id="edit-user" class="box form">
	<h2>Editar perfil</h2>

	<form method="POST">
		<label for="id">ID</label>
		<input type="text" name="id" id="id" value="<?= $user['id'] ?>" readonly>

		<label for="name">Nome</label>
		<input type="text" name="name" id="name" value="<?= $user['name'] ?>">

		<label for="email">E-mail</label>
		<input type="email" name="email" id="email" value="<?= $user['email']  ?>">

		<label for="password">Senha</label>
		<input type="password" name="password" id="password">

		<label for="sex">Sexo</label>
		<select name="sex" id="sex">
			<option value="">Selecione</option>
			<option value="M" <?= ($user['sex'] == 'M') ? 'selected' : '' ?>>Masculino</option>
			<option value="F" <?= ($user['sex'] == 'F') ? 'selected' : '' ?>>Feminino</option>
			<option value="U" <?= ($user['sex'] == 'U') ? 'selected' : '' ?>>Outro</option>
		</select>

		<div class="error-msg"></div>
	
		<button type="submit" class="button">Editar</button>

		<a href="#" id="delete-user" data-userid="<?= $user['id'] ?>" class="ml-2">Excluir conta</a>
	</form>
</div>