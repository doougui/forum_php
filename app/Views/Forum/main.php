<center>
	<h1><?= $forum['name'] ?></h1>
</center>
<div class="box">
	<table class="table-list">
		<thead>
			<tr>
				<!-- <th>Curtidas</th> -->
				<th colspan="2">
					<h2>Título</h2>
				</th>
				<th>Respostas</th>
				<th>Autor</th>
			</tr>
		</thead>
		<?php if (count($topics) > 0): ?>
			<tbody>
				<?php foreach ($topics as $topic): ?>
					<tr>
						<!-- <td class="table-number">$topic['upvotes']</td> -->
						<td colspan="2">
							<h3>
								<a href="<?= DIRPAGE ?>topic/open/<?= $topic['id'] ?>"><?= $topic['title'] ?></a>
							</h3>
						</td>
						<td>
							<a href="<?= DIRPAGE ?>topic/open/<?= $topic['id'] ?>">
								<?php 
									foreach ($qt_replies as $quantity) {
										if ($quantity['id_topic'] == $topic['id']) {
											echo $quantity['count'];
										}
									}
								?>
							</a>
						</td>
						<td><?= $topic['user'] ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		<?php endif; ?>
	</table>
</div>