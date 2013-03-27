<?php

return array(
	'routes' => array(
	
		array('post', array('<post>', array(
				'post'=>'.*?/\d{8}_.*?'
			)), array(
				'controller' => 'post',
				'action' => 'index'
			)
		),
		array('category', array('/<category>', array(
				'category'=>'.*?'
			)), array(
				'controller' => 'posts',
				'action' => 'index'
			)
		),
		array('default', '(/<controller>(/<action>(/<id>)))', array(
				'controller' => 'posts',
				'action' => 'index'
			)
		),
	),
	'modules' => array('haml'),
);
