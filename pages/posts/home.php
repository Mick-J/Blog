<div class="row">
	<div class="col-sm-8">
		<?php foreach (App::getInstance()->getTable('Post')->last() as $post ): ?>

		<h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
		<p><em><?= $post->categorie ?></em></p>

		<p><?= $post->extrait; ?></p>

		<?php endforeach; ?>
	</div>

	<div class="col-sm-4">
		<ul>
			<?php foreach (App::getInstance()->getTable('Category')->all() as $categorie): ?>
				<li><a href="<?= $categorie->url; ?>"><?= $categorie->titre;  ?></a></li>
			<?php endforeach; ?>
		</ul>
	
	</div>
</div>

