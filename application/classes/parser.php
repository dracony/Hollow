<?php
class Parser {
	protected $_markdown;
	protected static $_instance;
	protected function __construct(){
		include APPDIR.'/vendor/markdown.php';
		$parser_class = MARKDOWN_PARSER_CLASS;
		$this->_markdown = new $parser_class;
	}
	
	public function parse($text) {
		return $this->_markdown->transform($text);
	}
	
	public static function instance(){
		if(static::$_instance==null)
			static::$_instance=new Parser();
		return static::$_instance;
	}
}