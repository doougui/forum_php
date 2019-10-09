<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Douglas Pinheiro Goulart">
	<meta name="description" content="<?= $this -> getDescription() ?>">
	<meta name="keywords" content="<?= $this -> getKeywords() ?>">
	<title><?= $this -> getTitle() ?></title>
	<link rel="stylesheet" href="<?= DIRCSS ?>bootstrap.min.css">
	<link rel="stylesheet" href="<?= DIRCSS ?>normalize.css">
	<link rel="stylesheet" href="<?= DIRCSS ?>quill.snow.css">
	<link rel="stylesheet" href="<?= DIRCSS ?>style.css">
	<?= $this -> addExtraHead($data) ?>
</head>
<body>
	<header class="navbar navbar-expand-lg navbar-light bg-white nav-shadow mb-3">
		<nav class="container">
			<a href="<?= DIRPAGE ?>" class="navbar-brand">Fórum</a>

			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse collapse" id="navbarMenu">
				<ul class="navbar-nav">
					<li class="nav-item"><a href="<?= DIRPAGE ?>" class="nav-link">Ínicio</a></li>
				</ul>

				<ul class="navbar-nav navbar-user ml-auto">
					<?php if (isset($_SESSION['user'])): ?>
						<a href="<?= DIRPAGE ?>user/edit/<?= $_SESSION['user']['id'] ?>" class="ml-2">
							<?= $_SESSION['user']['name'] ?>								
						</a>

						<a href="<?= DIRPAGE ?>login/logout" class="ml-2">
							<i class="fas fa-sign-out-alt"></i>
							Sair
						</a>
					<?php else: ?>
						<a href="<?= DIRPAGE ?>login" class="ml-2">Login</a>
						<a href="<?= DIRPAGE ?>register" class="ml-2">Register</a>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
	</header>
	
	<div class="container">
		<main>
			<section id="navigation" class="box box-infos">
				<nav class="breadcrumbs">
					<li>
						<?php 
							$breadcrumb = new Src\Classes\ClassBreadcrumb();
							echo $breadcrumb -> addBreadcrumb();
						?>
					</li>
				</nav>

				<div class="btn-newpost">
					<?= $this -> addNavBtns($data) ?>
					<a href="<?= DIRPAGE ?>topic/new">
						<button class="button" <?= (!isset($_SESSION['user'])) ? 'disabled' : '' ?>>
							NOVA POSTAGEM
						</button>
					</a>
				</div>
			</section>

			<section id="content">
				<?= $this -> addMainContent($data) ?>
			</section>
		</main>
	</div>
	
	
	<div class="container">
		<footer>
<!-- 	<div class="box box-infos">
				<ol class="footer-infos">
					<li>
						<span class="info-badge">247</span>
						<i class="fas fa-file-alt"></i>
						Tópicos
					</li>

					<li>
						<span class="info-badge">984</span>
						<i class="fas fa-reply-all"></i>
						Posts
					</li>

					<li>
						<span class="info-badge">1082</span>
						<i class="fas fa-users"></i>
						Membros
					</li>

					<li>
						<span class="info-badge">guigamer123</span>
						<i class="fas fa-user-plus"></i>
						Membro mais novo
					</li>

					<li>
						<span class="info-badge">5</span>
						<i class="fas fa-layer-group"></i>
						Categorias
					</li>
				</ol>
			</div>

			<div class="box">
				<div class="online-users">
					<p><strong>3 usuários ativos</strong></p>
				</div>

				<div class="users-infos">
					<p>
						<span class="name"><strong>Amarau</strong></span>,
						<span class="name"><strong>Dg_ThePlayer</strong></span>,
						<span class="name"><strong>Doougui</strong></span>
					</p>
					<p>
						<strong>Grupos:</strong> 
						Dono | Administrador | Moderador | Membro
					</p>
				</div>
			</div> -->

			<div class="box footer-copyright">
				<h4>Copyright © Todos os direitos reservados.</h4>
			</div>
		</footer>
	</div>

	<!-- JavaScript -->
	<script src="<?= DIRJS ?>jquery-3.4.1.min.js"></script>
	<script src="<?= DIRJS ?>bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/f8d095f64b.js" crossorigin="anonymous"></script>
	<script src="<?= DIRJS ?>ckeditor.js"></script>
	<script>
		ClassicEditor
			.create( document.querySelector( '#editor' ), {
				toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote', '|', 'undo', 'redo']
			} )
			.then( editor => {
				window.editor = editor;
			} )
			.catch( err => {
				console.error( err.stack );
			} );
	</script>
	<script>var DIRPAGE = '<?= DIRPAGE ?>';</script>
	<script src="<?= DIRJS ?>script.js"></script>
</body>
</html>