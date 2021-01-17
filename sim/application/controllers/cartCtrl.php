<?
class CartCtrl_Controller extends Controller {
	public function addcart($id){
		
		$idbuy=cookie::get("idbuy");
		if(commonfn::isnull($idbuy)){
			$idbuy=rand(1,999999).date('Y-m-d').date('h-s');
			
			cookie::set("idbuy",$idbuy,86500);
			
		}
		$data=ORM::factory("numbersim")->find($id);
		
		
		$listOders=ORM::factory("cartsim")
		->where("idbuy",$idbuy)
		->where("number",$data->numbershow)
		->where("status","new")
		->find_all();
		
		$haveData = false;
		foreach ($listOders as $listOder){
			$haveData=true;
		}
		
		if(!$haveData){
			$cart=new Cartsim_model();
			$cart->idbuy=$idbuy;
			$cart->number=$data->numbershow;
			$cart->price=$data->price;
			$cart->status="new";
			$cart->idcat=$id;
		
			$cart->save();
		}else{
			echo "<script>alert('ไม่สามารถ ซื้อเบอร์ซ้ำได้'); history.back(); window.location.href = document.referrer; </script>";
		}
		echo "<script> history.back(); window.location.href = document.referrer;</script>";
		//$content = new View("index");
		//$content->page="mainpage";
		//$content->render(true);

		
	}
	public function cart(){
		

		
		$content = new View("index");
		$content->page="pagecart";
		$content->catid ="0";
		$content->render(true);

		
	}
	public function delcart($id){

		$data=ORM::factory("cartsim")->find($id);
		$data->delete();
		url::redirect('cartCtrl/cart');
	
	}
	public function deldetailcart($id){

		$data=ORM::factory("detaitbuysim")->find($id);
		$data->delete();
		
		echo "<script> history.back(); window.location.href = document.referrer;</script>";
	
	}
	public function detail(){
		$content = new View("index");
		$content->page="detailBuy";
		$content->catid ="0";
		$content->render(true);
	
	}
	public function send($id){
		$content = new View("index");
		$content->page="detailSend";
		$content->id=$id;
		$content->catid ="0";
		$content->render(true);
	
	}
	public function saveSend(){
		
		//$idbuy=cookie::get("idbuy");
		echo $this->input->post("id");
		
 		$order=ORM::factory("detaitbuysim")->find($this->input->post("id"));
 		$order->status="send";
 		$order->save();
		
 		$idbuy=$order->idbuy;
		
		
		$listcart=ORM::factory("cartsim")
		->where("idbuy",$idbuy)
		->where("status","wait")
		->find_all();
		$count = 0;
		$sumprice = 0;
		foreach ($listcart as $cart){
			$cartsim=ORM::factory("cartsim")->find($cart->id);
			$cartsim->status="send";
			$cartsim->save();	
			
			$datanum=ORM::factory("numbersim")
			->where('numbershow',$cartsim->number)
			->find_all();
			
			foreach($datanum as $datans){
				$dataEdit=ORM::factory("numbersim")->find($datans->id);
							$dataEdit->remark=$this->input->post("remark");
							$dataEdit->status="Sold";
							$dataEdit->soldday=date('Y-m-d');
							$dataEdit->save();
			}
		
			
// 			
			
		}
		
		url::redirect("cartCtrl/orderWaitSend");
	
	}
	public function saveDetail(){
		
		$idbuy=cookie::get("idbuy");
		$order=new Detaitbuysim_Model();
		$order->name=$this->input->post("name");
		$order->tel=$this->input->post("tel");
		$order->address=$this->input->post("address");
		$order->status="new";
		$order->idbuy=$idbuy;	
		$order->save();
		
		
		
		$listcart=ORM::factory("cartsim")
		->where("idbuy",$idbuy)
		->where("status","new")
		->find_all();
		$count = 0;
		$sumprice = 0;
		foreach ($listcart as $cart){
			$listOdersEdit=ORM::factory("cartsim")->find($cart->id);
			$listOdersEdit->status="wait";
			$listOdersEdit->save();	
		}
		cookie::set("idbuy",null);
		url::redirect();
	
	}
	public function orderWaitSend(){
		$content = new View("index");
		$content->page="orderWait";
		$content->catid ="0";
		$content->render(true);	
	}
	public function orderSend(){
		$content = new View("index");
		$content->page="orderSend";
		$content->catid ="0";
		$content->render(true);	
	}
	public function detailOrder($id){
		$content = new View("index");
		$content->page="detailOrder";
		$content->id=$id;
		$content->catid ="0";
		$content->render(true);	
	}
	public function detailOrderSend($id){
		$content = new View("index");
		$content->page="detailOrderSend";
		$content->id=$id;
		$content->catid ="0";
		$content->render(true);	
	}
	
}
?>