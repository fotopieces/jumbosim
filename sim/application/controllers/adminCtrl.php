<?php
class AdminCtrl_Controller extends Controller
{


	public function resold($id)
	{
		$data = ORM::factory("numbersim")->find($id);
		$data->status = "Y";
		$data->soldday = null;
		$data->save();
		url::redirect('adminCtrl/pageNumber');
	}
	public function soldNumber($id)
	{
		$data = ORM::factory("numbersim")->find($id);
		$data->status = "Sold";
		$data->soldday = date('Y-m-d');
		$data->save();
		url::redirect('adminCtrl/pageNumber');
	}
	public function delNumber($id)
	{
		$data = ORM::factory("numbersim")->find($id);
		$data->delete();
		url::redirect('adminCtrl/pageNumber');
	}
	public function saveNumber()
	{

		$pass = true;
		if (commonfn::isnull($this->input->post("id"))) {

			// 			echo  "|".$this->input->post("catall");
			// 			echo  "|".$this->input->post("baseprice");
			// 			echo  "|".$this->input->post("openday");
			// 			echo  "|".$this->input->post("closeday");
			// 			echo  "|".$this->input->post("number");
			// 			echo  "|".$this->input->post("price");

			$number = $this->input->post("number");
			//echo "---->".str_replace("-","",$number);

			$number = str_replace("-", "", $number);
			$number = str_replace("*", "", $number);
			$number = str_replace("#", "", $number);
			$number = str_replace("@", "", $number);



			$data = new Numbersim_Model();
			$data->number = $number;
			$data->numbershow = $this->input->post("number");
			$data->catalogid = $this->input->post("catall");
			$data->networkid = $this->input->post("network");
			$data->baseprice = $this->input->post("baseprice");
			$data->priceinsim = $this->input->post("priceinsim");
			$data->price = $this->input->post("price");
			$data->openday = date('Y-m-d', strtotime($this->input->post("openday")));
			$data->closeday = date('Y-m-d', strtotime($this->input->post("closeday")));
			$data->status = "Y";
			$data->remark = $this->input->post("remark");

			$listCatalogsim = ORM::factory("numbersim")->find_all();

			foreach ($listCatalogsim as $sim) {
				if ($number == $sim->number) {
					$pass = false;
					break;
				}
			}

			if ($pass) {
				$data->save();
			} else {
				echo "<script>alert('เบอร์ซ้ำ')</script>";
				echo "<script>history.back();</script>";
			}
		} else {
			$data = ORM::factory("numbersim")->find($this->input->post("id"));
			$number = $this->input->post("number");
			//echo "---->".str_replace("-","",$number);

			$number = str_replace("-", "", $number);
			$number = str_replace("*", "", $number);
			$number = str_replace("#", "", $number);
			$number = str_replace("@", "", $number);
			$data->number = $number;
			$data->numbershow = $this->input->post("number");
			$data->catalogid = $this->input->post("catall");
			$data->networkid = $this->input->post("network");
			$data->baseprice = $this->input->post("baseprice");
			$data->priceinsim = $this->input->post("priceinsim");
			$data->price = $this->input->post("price");
			$data->openday = date('Y-m-d', strtotime($this->input->post("openday")));
			$data->closeday = date('Y-m-d', strtotime($this->input->post("closeday")));
			$data->status = "Y";
			$data->remark = $this->input->post("remark");
			$data->save();
		}

		$list = ORM::factory("numbersim")->find_all();
		foreach ($data as $sim) {
			echo $sim->number . "|";
			$len = strlen($sim->number);
			$count = 0;
			$sum = 0;
			$n1 = "";
			$n2 = "";
			$n3 = "";
			$n4 = "";
			$n5 = "";
			$n6 = "";
			$n7 = "";
			while ($count < $len) {
				if ($count == 3) {
					$n1 = $sim->number[$count];
				}
				if ($count == 4) {
					$n2 = $sim->number[$count];
				}
				if ($count == 5) {
					$n3 = $sim->number[$count];
				}
				if ($count == 6) {
					$n4 = $sim->number[$count];
				}
				if ($count == 7) {
					$n5 = $sim->number[$count];
				}
				if ($count == 8) {
					$n6 = $sim->number[$count];
				}
				if ($count == 9) {
					$n7 = $sim->number[$count];
				}
				$sum = $sum + $sim->number[$count];
				$count++;
			}
			echo  $sum . "|" . $n1 . "|" . $n2 . "|" . $n3 . "|" . $n4 . "|" . $n5 . "|" . $n6 . "|" . $n7 . "|";
			$sql = " UPDATE numbersims SET sum='" . $sum . "',n1='" . $n1 . "',n2='" . $n2 . "',n3='" . $n3 . "',n4='" . $n4 . "',n5='" . $n5 . "',n6='" . $n6 . "',n7='" . $n7 . "'  WHERE id=" . $sim->id . "";
			Database::instance()->query($sql);
		}
		$listCatalogsim = ORM::factory("numbersim")->find_all();
		foreach ($listCatalogsim as $sim) {
			echo $sim->number . "|";
			$len = strlen($sim->number);
			$count = 0;
			$sum = 0;
			$n1 = "";
			$n2 = "";
			$n3 = "";
			$n4 = "";
			$n5 = "";
			$n6 = "";
			$n7 = "";
			$startw = $sim->number[0] . $sim->number[1] . $sim->number[2];

			while ($count < $len) {

				if ($count == 3) {
					$n1 = $sim->number[$count];
				}
				if ($count == 4) {
					$n2 = $sim->number[$count];
				}
				if ($count == 5) {
					$n3 = $sim->number[$count];
				}
				if ($count == 6) {
					$n4 = $sim->number[$count];
				}
				if ($count == 7) {
					$n5 = $sim->number[$count];
				}
				if ($count == 8) {
					$n6 = $sim->number[$count];
				}
				if ($count == 9) {
					$n7 = $sim->number[$count];
				}
				$sum = $sum + $sim->number[$count];
				$count++;
			}


			echo  $sum . "||";

			$sql = " UPDATE numbersims SET sum='" . $sum . "',n1='" . $n1 . "',n2='" . $n2 . "',n3='" . $n3 . "',n4='" . $n4 . "',n5='" . $n5 . "',n6='" . $n6 . "',n7='" . $n7 . "',stwith='" . $startw . "'  WHERE id=" . $sim->id . "";


			Database::instance()->query($sql);
		}
		if ($pass) {
			url::redirect('adminCtrl/pageNumber');
		}
	}
	public function importNumber()
	{

		$pass = true;
		if (commonfn::isnull($this->input->post("id"))) {

			// 			echo  "|".$this->input->post("catall");
			// 			echo  "|".$this->input->post("baseprice");
			// 			echo  "|".$this->input->post("openday");
			// 			echo  "|".$this->input->post("closeday");
			// 			echo  "|".$this->input->post("number");
			// 			echo  "|".$this->input->post("price");

			$number = $this->input->post("data");
			//echo "---->".str_replace("-","",$number);
			$datas = explode(PHP_EOL, $number);
			foreach ($datas as $value) {
				$number = "";
				$values = explode(",", $value);
				$number = trim($values[0]);
				$numbershow = $number;
				$baseprice = 0;
				$priceinsim = 0;
				$price =  trim($values[1]);
				$openday = "";
				$closeday = trim($values[2]);
				$status = "Y";
				$remark = "";
				$seq = trim($values[3]);


				$len = strlen($sim->number);
				$count = 0;
				$sum = 0;
				$n1 = "";
				$n2 = "";
				$n3 = "";
				$n4 = "";
				$n5 = "";
				$n6 = "";
				$n7 = "";
				$startw = $sim->number[0] . $sim->number[1] . $sim->number[2];
	
				while ($count < $len) {
	
					if ($count == 3) {
						$n1 = $sim->number[$count];
					}
					if ($count == 4) {
						$n2 = $sim->number[$count];
					}
					if ($count == 5) {
						$n3 = $sim->number[$count];
					}
					if ($count == 6) {
						$n4 = $sim->number[$count];
					}
					if ($count == 7) {
						$n5 = $sim->number[$count];
					}
					if ($count == 8) {
						$n6 = $sim->number[$count];
					}
					if ($count == 9) {
						$n7 = $sim->number[$count];
					}
					$sum = $sum + $sim->number[$count];
					$count++;

				$data = new Numbersim_Model();
				$data->number = $number;
				$data->numbershow = $this->input->post("number");
				$data->catalogid = $this->input->post("catall");
				$data->networkid = $this->input->post("network");
				$data->baseprice = 0;
				$data->priceinsim = $this->input->post("priceinsim");
				$data->price = $this->input->post("price");
				$data->openday = date('Y-m-d');
				$data->closeday = date('Y-m-d');
				$data->status = "Y";
				$data->remark = $this->input->post("remark");

				$listCatalogsim = ORM::factory("numbersim")->find_all();

				foreach ($listCatalogsim as $sim) {
					if ($number == $sim->number) {
						$pass = false;
						break;
					}
				}

				if ($pass) {
					$data->save();
				} 
			}
		}
		}
		if ($pass) {
			url::redirect('adminCtrl/importNumber');
		}
	}

	public function pageNumber()
	{
		$listCatalogsim = ORM::factory("numbersim")->limit(10)->find_all();
		$content = new View("index");
		$content->page = "pageNumber";
		$content->listCatalogsim = $listCatalogsim;
		$content->catid = "0";
		$content->render(true);
	}
	public function pageSerch($number, $closday)
	{

		if ($number != "N" && $closday != "N") {
			$listCatalogsim = ORM::factory("numbersim")
				->where('closeday', date('Y-m-d', strtotime($closday)))
				->like('number', $number)
				->limit(10)
				->find_all();
		} else {
			if ($number != "N") {
				$listCatalogsim = ORM::factory("numbersim")
					//->where('closeday', date('Y-m-d',strtotime($closday)))
					->like('number', $number)
					->limit(10)
					->find_all();
			} else if ($closday != "N") {


				$listCatalogsim = ORM::factory("numbersim")
					->where('closeday >=', $closday . '-1')
					->where('closeday <=', $closday . '-31')
					->find_all();
			}
		}


		$content = new View("index");
		$content->page = "pageNumber";
		$content->listCatalogsim = $listCatalogsim;
		$content->catid = "0";
		$content->render(true);
	}
	public function importPageSerch($number, $closday)
	{

		if ($number != "N" && $closday != "N") {
			$listCatalogsim = ORM::factory("numbersim")
				->where('closeday', date('Y-m-d', strtotime($closday)))
				->like('number', $number)
				->limit(10)
				->find_all();
		} else {
			if ($number != "N") {
				$listCatalogsim = ORM::factory("numbersim")
					//->where('closeday', date('Y-m-d',strtotime($closday)))
					->like('number', $number)
					->limit(10)
					->find_all();
			} else if ($closday != "N") {


				$listCatalogsim = ORM::factory("numbersim")
					->where('closeday >=', $closday . '-1')
					->where('closeday <=', $closday . '-31')
					->find_all();
			}
		}


		$content = new View("index");
		$content->page = "importNumber";
		$content->listCatalogsim = $listCatalogsim;
		$content->catid = "0";
		$content->render(true);
	}
	public function logout()
	{

		cookie::set("user_id", null);
		cookie::set("user", null);
		url::redirect();
	}

	public function login()
	{


		$ck = 0;
		$user = $this->input->post("username");
		$pass = $this->input->post("password");
		//echo $user;
		$admins = ORM::factory("adminsim")
			->where('user', $user)
			->where('pass', $pass)
			->find_all();

		foreach ($admins as $admin) {
			$ck = 1;
			$id = $admin->id;
			$name = $admin->user;
		}
		if ($ck == 1) {
			cookie::set("user_id", $id, 86500);
			cookie::set("user", $user, 86500);

			url::redirect();
		} else {
			url::redirect('adminCtrl/pageLogin');
		}
	}
	public function pageLogin()
	{

		$content = new View("index");
		$content->page = "pageLogin";
		$content->catid = "0";
		$content->render(true);
	}
	public function pageCatalog()
	{

		$content = new View("index");
		$content->page = "pageCatalog";
		$content->catid = "0";
		$content->render(true);
	}
	public function pageMenu()
	{

		$content = new View("index");
		$content->page = "pageMenu";
		$content->catid = "0";
		$content->render(true);
	}
	public function newMenu($id)
	{

		if ($id == "0") {
			$content = new View("index");
			$content->page = "newMenu";
			$content->id = "0";
			$content->name = "";
			$content->detail = "";
			$content->catid = "0";
			$content->render(true);
		} else {
			$data = ORM::factory("pagesim")->find($id);
			$content = new View("index");
			$content->page = "newMenu";
			$content->id = $id;
			$content->name = $data->name;
			$content->detail = $data->detail;
			$content->catid = "0";
			$content->render(true);
		}
	}
	public function saveMenu()
	{

		if ($this->input->post("id") != "0") {
			$data = ORM::factory("pagesim")->find($this->input->post("id"));

			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "M";

			$data->save();
			url::redirect('adminCtrl/pageMenu');
		} else {
			$data = new Pagesim_Model();
			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "M";

			$data->save();
			url::redirect('adminCtrl/pageMenu');
		}
	}

	public function delMenu($id)
	{
		$data = ORM::factory("pagesim")->find($id);
		$data->delete();

		url::redirect('adminCtrl/pageMenu');
	}
	public function saveCatalog()
	{


		if (commonfn::isnull($this->input->post("id"))) {
			$data = new Catalogsim_Model();
			$data->name = $this->input->post("name");
			$data->status = $this->input->post("status");
			$data->random = rand(1, 100000);
			$data->save();
		} else {
			$data = ORM::factory("catalogsim")->find($this->input->post("id"));
			$data->name = $this->input->post("name");
			$data->status = $this->input->post("status");
			$data->save();
		}
		url::redirect('adminCtrl/pageCatalog');
	}
	public function pageNetwork()
	{

		$content = new View("index");
		$content->page = "pageNetwork";
		$content->catid = "0";
		$content->render(true);
	}
	public function saveNetwork()
	{

		if (commonfn::isnull($this->input->post("id"))) {
			$data = new Networksim_Model();
			$data->name = $this->input->post("name");
			$data->status = $this->input->post("status");
			$data->save();
		} else {
			$data = ORM::factory("networksim")->find($this->input->post("id"));
			$data->name = $this->input->post("name");
			$data->status = $this->input->post("status");
			$data->save();
		}
		url::redirect('adminCtrl/pageNetwork');
	}


	public function pageSum()
	{

		$content = new View("index");
		$content->page = "pageSum";
		$content->catid = "0";
		$content->render(true);
	}
	public function newSum($id)
	{

		if ($id == "0") {
			$content = new View("index");
			$content->page = "newSum";
			$content->id = "0";
			$content->name = "";
			$content->detail = "";
			$content->catid = "0";
			$content->render(true);
		} else {
			$data = ORM::factory("pagesim")->find($id);
			$content = new View("index");
			$content->page = "newSum";
			$content->id = $id;
			$content->name = $data->name;
			$content->detail = $data->detail;
			$content->catid = "0";
			$content->render(true);
		}
	}
	public function saveSum()
	{

		if ($this->input->post("id") != "0") {
			$data = ORM::factory("pagesim")->find($this->input->post("id"));

			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "S";

			$data->save();
			url::redirect('adminCtrl/pageSum');
		} else {
			$data = new Pagesim_Model();
			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "S";

			$data->save();
			url::redirect('adminCtrl/pageSum');
		}
	}

	public function delSum($id)
	{
		$data = ORM::factory("pagesim")->find($id);
		$data->delete();

		url::redirect('adminCtrl/pageSum');
	}

	public function pagePal()
	{

		$content = new View("index");
		$content->page = "pagePal";
		$content->catid = "0";
		$content->render(true);
	}

	public function newPal($id)
	{

		if ($id == "0") {
			$content = new View("index");
			$content->page = "newPal";
			$content->id = "0";
			$content->name = "";
			$content->detail = "";
			$content->catid = "0";
			$content->render(true);
		} else {
			$data = ORM::factory("pagesim")->find($id);
			$content = new View("index");
			$content->page = "newPal";
			$content->id = $id;
			$content->name = $data->name;
			$content->detail = $data->detail;
			$content->catid = "0";
			$content->render(true);
		}
	}
	public function savePal()
	{

		if ($this->input->post("id") != "0") {
			$data = ORM::factory("pagesim")->find($this->input->post("id"));

			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "P";

			$data->save();

			url::redirect('adminCtrl/pagePal');
		} else {
			$data = new Pagesim_Model();
			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "P";

			$data->save();
			url::redirect();
		}
	}

	public function delPal($id)
	{
		$data = ORM::factory("pagesim")->find($id);
		$data->delete();

		url::redirect('adminCtrl/pagePal');
	}


	public function pageGif()
	{

		$content = new View("index");
		$content->page = "pageGif";
		$content->catid = "0";
		$content->render(true);
	}

	public function newGif($id)
	{

		if ($id == "0") {
			$content = new View("index");
			$content->page = "newGif";
			$content->id = "0";
			$content->name = "";
			$content->detail = "";

			$content->catid = "0";
			$content->render(true);
		} else {
			$data = ORM::factory("pagesim")->find($id);
			$content = new View("index");
			$content->page = "newGif";
			$content->id = $id;
			$content->name = $data->name;
			$content->detail = $data->detail;

			$content->catid = "0";
			$content->render(true);
		}
	}
	public function saveGif()
	{

		if ($this->input->post("id") != "0") {
			$data = ORM::factory("pagesim")->find($this->input->post("id"));

			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "G";

			$data->save();

			url::redirect('adminCtrl/pageGif');
		} else {
			$data = new Pagesim_Model();
			$data->name = $this->input->post("name");
			$data->detail = $this->input->post("detail");
			$data->status = "G";

			$data->save();
			url::redirect();
		}
	}

	public function delGif($id)
	{
		$data = ORM::factory("pagesim")->find($id);
		$data->delete();

		url::redirect('adminCtrl/pageGif');
	}


	public function importNumber()
	{
		$listCatalogsim = ORM::factory("numbersim")->limit(10)->find_all();
		$content = new View("index");
		$content->page = "importNumber";
		$content->listCatalogsim = $listCatalogsim;
		$content->catid = "0";
		$content->render(true);
	}
}
