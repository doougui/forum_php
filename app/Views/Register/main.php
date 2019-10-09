<div id="register" class="box form">
	<h2>Registre-se</h2>

	<form method="POST">
		<label for="name">Nome</label>
		<input type="text" name="name" id="name">

		<label for="email">E-mail</label>
		<input type="email" name="email" id="email">

		<label for="password">Senha</label>
		<input type="password" name="password" id="password">

		<label for="sex">Sexo</label>
		<select name="sex" id="sex">
			<option value="">Selecione</option>
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
			<option value="U">Outro</option>
		</select>

		<div class="error-msg"></div>
	
		<button type="submit" class="button">Cadastrar</button>
	</form>
</div>