<div class="box">
	<div class="article">
		<article>
			<p>Autor: <strong><?= $topic['user'] ?></strong></p>
			<h1><?= $topic['title'] ?></h1>

			<?= $topic['content'] ?>
		</article>
		
		<div class="article-btns">
			<?php if (isset($_SESSION['user'])): ?>
<!-- 		<a href="DIRPAGE" data-topicid="$topic['id']" id="like">
					<i class="fas fa-heart"></i> 
					Curtir
				</a> -->
				<?php if ($topic['id_author'] == $_SESSION['user']['id']): ?>
					<!-- <span>/</span> -->
					<a href="<?= DIRPAGE ?>topic/edit/<?= $topic['id'] ?>">Editar</a>
					<span>/</span>
					<a href="<?= DIRPAGE ?>topic/delete/<?= $topic['id'] ?>">Excluir</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

	<hr>

	<div class="posts">
		<h2>Respostas</h2>
	
		<?php if (isset($_SESSION['user'])): ?>
			<div class="form">
				<form id="reply" method="POST" action="<?= DIRPAGE ?>topic/reply/<?= $topic['id'] ?>">
					<label for="email">Responder</label>
					<textarea name="reply" id="editor" rows="5"></textarea>

					<button type="submit" class="button">Responder</button>
				</form>
			</div>
		<?php endif; ?>

		<?php foreach ($posts as $post): ?>
			<div class="post">
				<p>
					<strong><?= $post['user'] ?></strong> - 
					Postado em: <?= date('d/m/Y H:i', strtotime($post['msg_date'])) ?>
				</p>
				<p><?= $post['msg'] ?></p>
			</div>
		<?php endforeach; ?>
	</div>
</div>