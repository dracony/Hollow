<?php
class Post_Controller extends Page {

	public function action_index(){
		$post = $this->request->param('post');
		$this->view->post=new Post_Model($post.'.md');
		$this->view->subview = 'post';
	}
		
}
?>