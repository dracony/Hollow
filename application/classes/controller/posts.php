<?php
class Posts_Controller extends Page {
	
	public function action_index(){
		$this->view->subview = 'list';
		$category = $this->request->param('category');
		if ($category == '')
			$category=null;
		$this->view->posts = $this->lookup->find(null,0,$category);
	}
}
?>