<?php
class Lookup_Model {
	protected $_tree;
	public function __construct() {
		$this->_tree=$this->file_tree(Config::get('hollow.post_dir'));
	}
	public function find($limit = null, $offset = 0, $category = null) {
		$tree = $this->subdir($category);
		$files = $this->get_files($tree);
		ksort($files);
		$files = array_slice($files, $offset, $limit);
		$posts = array();
		foreach($files as $file)
			$posts[] = new Post_Model($file);
		return $posts;
	}
	
	public function categories($parent = null) {
		$tree = $this->subdir($parent);
		$categories=array();
		foreach($tree['dirs'] as $dir) {
			$categories[]=new Category_Model($dir['path'],$this->categories($dir['path']));
		}
		return $categories;
	}
	
	protected function get_files($tree) {
		$files = $tree['files'];
		foreach($tree['dirs'] as $dir)
			$files = array_merge($files,$this->get_files($dir));
		return $files;
	}
	
	protected function subdir($category = null) {
		if ($category === null)
			return $this->_tree;
		$tree=$this->_tree;
		$path = explode('/', $category);
		foreach($path as $subdir) {
			$tree = $tree['dirs'][$subdir];
		}
		return $tree;
	}
	protected function file_tree($base_dir, $path='') {
		$full_path = $base_dir.'/'.$path;
		$dir = opendir($full_path);
		
		$tree = array(
			'files' => array(),
			'dirs' => array(),
			'path' => $path
		);
		
		while (($item = readdir($dir)) !== false) {
		
			if ($item == '.' || $item == '..')
				continue;
				
			$item_path = $path==''?$item:($path.'/'.$item);
			$full_item_path = $full_path.'/'.$item;
			
            if (is_dir($full_item_path)) {
				$tree['dirs'][$item]=$this->file_tree($base_dir,$item_path);
			}else {
				$tree['files'][$item] = $item_path;
			}
        }
		closedir($dir);
		return $tree;
	}
	
}