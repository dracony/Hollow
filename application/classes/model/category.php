<?php
class Category_Model {
	public $name;
	public $path;
	public $categories=array();
	public $url;
	
	public function __construct($path,$categories) {
		$this->path = $path;
		$this->categories = $categories;
		$this->name=substr($path,strrpos($path,'/'));
		$this->name = ucwords(str_replace('_', ' ', $this->name));
		$this->url = '/'.$path;
	}
}