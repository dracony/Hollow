<?php foreach($posts as $post):?>
	<section>
		<div class="page-header">
			<h2><a href="<?php echo $post->url;?>" ><?php echo $post->title;?></a></h2>
			<p>
				<?php echo $post->excerpt();?>
			</p>
		</div>
	</section>
<?php endforeach;?>