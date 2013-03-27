<!DOCTYPE html>
<html>
	<head>
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet"/>
		<link href="/style.css" rel="stylesheet"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
					<a class="brand" href="/">Hollow</a>
					<ul class="nav">
						<?php foreach($categories as $cat):?>
							<li><a href="<?php echo $cat->url; ?>"><?php echo $cat->name;?></a></li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="span8 offset2">
					<?php include($subview.'.php'); ?>
				</div>
			</div>
		</div>
	</body>
</html>