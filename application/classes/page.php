<?php
class Page extends Controller{
	protected $view;
	protected $lookup;
	public function before(){
		$this->view = View::get('main');
		$this->lookup = new Lookup_Model();
		$this->view->categories = $this->lookup->categories();
	}
	public function after(){
		$this->response->body = $this->view->render();
	}
}