<?php
class Post_Model{
	public $path;
	public $categories;
	public $title;
	public $date;
	public $url;
	
	protected $_base_dir;
	protected $_title;
	
	protected $_raw;
	protected $_excerpt;
	protected $_rendered;
	
	protected $_parser;
		
	
	public function __construct($path) {
		$this->_base_dir=Config::get('hollow.post_dir');
		$this->path=$path;
		$this->categories = explode('/', $path);
		
		$name = array_pop($this->categories);
		$this->title = str_replace('_', ' ', substr($name, 9, strrpos($name, '.') - 9));
		
		$this->date = substr($name, 0, 4).'-'.substr($name, 4, 2).'-'.substr($name, 6, 2);
		$this->url = '/'.substr($path, 0, strrpos($path, '.'));
		
		$this->_parser=Parser::instance();
	}
	
	public function raw(){
		if ($this->_raw !== null)
			return $this->_raw;
			
		return $this->_raw = file_get_contents($this->_base_dir.'/'.$this->path);
	}
	
	public function excerpt(){
		if($this->_excerpt !== null)
			return $this->_excerpt;
			
		preg_match('/\A.*?(?=\s*^\s*$)/smx', $this->raw(), $excerpt);
		return $this->excerpt = $this->_parser->parse($excerpt[0]);
	}
	
	public function rendered(){
		if($this->_rendered !== null)
			return $this->_rendered;
			
		return $this->_rendered = $this->_parser->parse($this->raw());
	}
	

}