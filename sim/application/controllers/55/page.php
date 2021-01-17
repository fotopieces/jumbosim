<?php 
class Page_Controller extends Controller {


	public function cat($id,$page,$detail){
		$splist = explode("!", $detail);
		
		
		if($splist[0]=="s2"){
		
			if($splist[1]==1){
			$numbers = explode(":", $splist[2]);
				
				$sql = " SELECT * FROM numbersims";
				$sql= $sql." WHERE status = 'Y'"; 
				foreach ($numbers as $nums){
					if($nums!=""){
						$sql= $sql." AND number  LIKE '%".$nums."%'";
					}
				}
		
				$listCatalogsim = Database::instance()->query($sql)->as_array();
				$crow = 0;
				foreach ($listCatalogsim as $a){
					$crow++;
				}
				
				$row=$crow;
				
			}else{
				$numbers = explode(":", $splist[2]);
				
				$sql = " SELECT * FROM numbersims";
				$sql= $sql." WHERE status = 'Y'"; 
				foreach ($numbers as $nums){
					if($nums!=""){
						$sql= $sql." AND number NOT LIKE '%".$nums."%'";
					}
				}
		
				$listCatalogsim = Database::instance()->query($sql)->as_array();
				$crow = 0;
				foreach ($listCatalogsim as $a){
					$crow++;
				}
				
				$row=$crow;
				
			}
			
		
		}else if($splist[0]=="s1"){
			
			
			
			$sql = " SELECT * FROM numbersims";
			$sql= $sql." WHERE status = 'Y'";
			if($splist[1]!="0"){
				$sql= $sql." AND stwith ='".$splist[1]."'";
			}
			$numbers = explode(":", $splist[2]);
			if($numbers[0]!=""){
				$sql= $sql." AND n1 ='".$numbers[0]."'";
			}
			if($numbers[1]!=""){
				$sql= $sql." AND n2 ='".$numbers[1]."'";
			}
			if($numbers[2]!=""){
				$sql= $sql." AND n3 ='".$numbers[2]."'";
			}
			if($numbers[3]!=""){
				$sql= $sql." AND n4 ='".$numbers[3]."'";
			}
			if($numbers[4]!=""){
				$sql= $sql." AND n5 ='".$numbers[4]."'";
			}
			if($numbers[5]!=""){
				$sql= $sql." AND n6 ='".$numbers[5]."'";
			}
			if($numbers[6]!=""){
				$sql= $sql." AND n7 ='".$numbers[6]."'";
			}
			if($splist[3]!="0"){
				$sql= $sql." AND networkid ='".$splist[3]."'";
			}
			if($splist[4]!="0"){
				$sql= $sql." AND sum ='".$splist[4]."'";
			}
			if($splist[5]!="0"){
				$sql= $sql." AND catalogid like '%".$splist[5]."%'";
			}
			if($splist[6]!="0"){
				
				
				$sql= $sql." AND price > ".($splist[6]-1)."";
			
			
				$sql= $sql." AND price < ".($splist[7]+1)."";
				
				
			}
			
			
			$listCatalogsim = Database::instance()->query($sql)->as_array();
			$crow = 0;
			foreach ($listCatalogsim as $a){
				$crow++;
			}
			
			$row=$crow;
			
		
		
		
		
		}else{

		$row=ORM::factory("numbersim")->like('catalogid',$id)->where('status','Y')->count_all();
		$listCatalogsim=ORM::factory("numbersim")->like('catalogid',$id)->where('status','Y')->find_all();
		}
		
		
	    $content = new View("index");
		$content->page="mainpage";
		$content->catid=$id;
		$content->counts=$page;
		$content->row=$row;
		$content->listCatalogsim=$listCatalogsim;
		$content->detail=$detail;
		//$content->wont=$wont;
		//$content->ck=$ck;
		
		
		//$content->catid="0";
		$content->render(true);

		
	}
	public function addsum(){
		$listCatalogsim=ORM::factory("numbersim")->find_all();
		foreach ($listCatalogsim as $sim){
			echo $sim->number."|";
			$len = strlen($sim->number);
			$count = 0;
			$sum=0;
			$n1="";
			$n2="";
			$n3="";
			$n4="";
			$n5="";
			$n6="";
			$n7="";
			$startw = $sim->number[0].$sim->number[1].$sim->number[2];
	
			while ($count<$len){
				
				if($count==3){
					$n1=$sim->number[$count];
				}
				if($count==4){
					$n2=$sim->number[$count];
				}
				if($count==5){
					$n3=$sim->number[$count];
				}
				if($count==6){
					$n4=$sim->number[$count];
				}
				if($count==7){
					$n5=$sim->number[$count];
				}
				if($count==8){
					$n6=$sim->number[$count];
				}
				if($count==9){
					$n7=$sim->number[$count];
				}
				$sum=$sum+$sim->number[$count];
				$count++;
			}
			
			
			echo  $sum."||";
			
			$sql = " UPDATE numbersims SET sum='".$sum."',n1='".$n1."',n2='".$n2."',n3='".$n3."',n4='".$n4."',n5='".$n5."',n6='".$n6."',n7='".$n7."',stwith='".$startw."'  WHERE id=".$sim->id."";
			
			
			Database::instance()->query($sql);
			
		}
	}
	public function detail($id){
		$data=ORM::factory("pagesim")->find($id);
		$content = new View("index");
		$content->page="index";
		$content->catid="0";
		$content->name=$data->name;
		$content->detail=$data->detail;
		
		$content->catid="0";$content->render(true);
	}
	public function sum($id){
		$datas=ORM::factory("pagesim")
		->where('name',$id)
		->find_all();
		
		
		foreach ($datas as $data){
			$content = new View("index");
			$content->page="index";
			$content->catid="0";
			$content->name="";
			$content->detail=$data->detail;
			
			$content->catid="0";$content->render(true);
		}
		
	}

}

















