<?php 
class Welcome_Controller extends Controller {


	public function index(){

		$session = Session::instance();
		$session->set('base', "");
		$session->set('max', "");
	
		
		
		$content = new View("index");
		$content->page="index";
		$content->catid="0";
		$content->name="";
		$content->detail="";
		
		$content->render(true);
		url::redirect("page/cat/8545566/0/0");

		
	}
	public function admin(){
		

		
		$content = new View("index");
		$content->page="pageLogin";
		$content->render(true);

		
	}
}