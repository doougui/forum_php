<div class="box">
	<?php 
	if (count($categories) > 0): ?>
		<table class="table-list">
			<?php foreach ($categories as $category): ?>
				<thead>
					<tr>
						<th colspan="2">
							<h2><?= $category['name'] ?></h2>
						</th>
						<th>Tópicos</th>
					</tr>
				</thead>

				<?php if (count($forums) > 0): ?>
					<tbody>
						<?php foreach ($forums as $forum): 
							if ($forum['id_category'] == $category['id']): ?>
								<tr>
									<td colspan="2">
										<h3><a href="<?= DIRPAGE ?>forum/open/<?= $forum['id'] ?>"><?= $forum['name'] ?></a></h3>
										<small class="description"><?= $forum['description'] ?></small>
									</td>
									<td class="table-number">
										<a href="<?= DIRPAGE ?>forum/open/<?= $forum['id'] ?>">
											<?php 
												foreach ($qt_topics as $quantity) {
													if ($quantity['id_forum'] == $forum['id']) {
														echo $quantity['count'];												
													}
												}
											?>
										</a>
									</td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</tbody>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>
	<?php else: ?>
		<center>	
			<h3>Não há categorias.</h3>
		</center>	
	<?php endif; ?>
</div>