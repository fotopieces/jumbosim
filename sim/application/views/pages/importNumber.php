<script>

function doSave(){
	//alert(document.getElementById("count").value);
	

	var data = "";
	var els = document.getElementsByName('cat');
	for (var i=0;i<els.length;i++){
	  if ( els[i].checked ) {
	    data=data+els[i].value+",";
	  }
	}
	document.getElementById("catall").value=data;
	if(document.getElementById("catall").value==""){
		alert("กรุณาเลือกหมวดซิม");
	}else if(document.getElementById("data").value==""){
		alert("กรุณากรอกรายละเอียดเบอร์");
	} else if (!checkFormat(document.getElementById("data").value)) {
                alert("ใส่ข้อมูลไม่ถูกต้อง");
	}else{
		if(confirm("ต้องการบันทึกข้อมูลหรือไม่")){
			document.getElementById("saveCatalog").submit();
		}
	}
	
}

function checkFormat(data) {
            var datas = data.split("\n");
            for (i = 0; i < datas.length; i++) {
                var n = datas[i].split(",")[0];
                if (n.length != 10 || datas[i].split(",").length != 4) {
                    return false;
                }
            }
            return true;
        }

function doEdit(id,cat,networkid,numbershow,priceinsim,baseprice,price,openday,closeday,remark){
	
	document.getElementById("btname").innerHTML = "แก้ไข";
	var els = document.getElementsByName('cat');
	for (var i=0;i<els.length;i++){
	 els[i].checked=false;
	}
	var res = cat.split(","); 
	for (var i=0;i<res.length;i++){
		if(res[i]!=""){
			document.getElementById(res[i]).checked=true;
		}	
	}
	document.getElementById("id").value = id;
	document.getElementById("networks").value = ""+networkid+"";

	
	document.getElementById("number").value = numbershow;
	document.getElementById("priceinsim").value = priceinsim;
	document.getElementById("baseprice").value = baseprice;
	document.getElementById("price").value = price;
	document.getElementById("openday").value = openday;
	document.getElementById("closeday").value = closeday;
	document.getElementById("remark").value = remark;
	
}
function doReset(){
	document.getElementById("btname").innerHTML = "บันทึก";
	document.getElementById("saveCatalog").reset();
}
function dodelete(id){
	if(confirm("ต้องการลบข้อมูลหรือไม่")){
		window.location="<?=url::base()?>adminCtrl/delNumber/"+id;
	}
}
function doSold(id){
	if(confirm("ต้องการขายหรือไม่")){
		window.location="<?=url::base()?>adminCtrl/soldNumber/"+id;
	}
}
function dore(id){
	if(confirm("ต้องการนำกลับมาขายใหม่หรือไม่")){
		window.location="<?=url::base()?>adminCtrl/resold/"+id;
	}
}


</script>

<?php  
$jquery_ui_v="1.8.5";  
$theme=array(  
    "0"=>"base",  
    "1"=>"black-tie",  
    "2"=>"blitzer",  
    "3"=>"cupertino",  
    "4"=>"dark-hive",  
    "5"=>"dot-luv",  
    "6"=>"eggplant",  
    "7"=>"excite-bike",  
    "8"=>"flick",  
    "9"=>"hot-sneaks",  
    "10"=>"humanity",  
    "11"=>"le-frog",  
    "12"=>"mint-choc",  
    "13"=>"overcast",  
    "14"=>"pepper-grinder",  
    "15"=>"redmond",  
    "16"=>"smoothness",  
    "17"=>"south-street",  
    "18"=>"start",  
    "19"=>"sunny",  
    "20"=>"swanky-purse",  
    "21"=>"trontastic",  
    "22"=>"ui-darkness",  
    "23"=>"ui-lightness",  
    "24"=>"vader"  
);  
$jquery_ui_theme=$theme[8];  
?>  
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/<?=$jquery_ui_v?>/themes/<?=$jquery_ui_theme?>/jquery-ui.css" />  
<style type="text/css">  
/* ปรับขนาดตัวอักษรของข้อความใน tabs  
สามารถปรับเปลี่ยน รายละเอียดอื่นๆ เพิ่มเติมเกี่ยวกับ tabs 
*/  
.ui-tabs{  
    font-family:tahoma;  
    font-size:11px;  
}  
</style>  
<style type="text/css">
/* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
.ui-datepicker{
	width:220px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
<script src="js/jqueryui_datepicker_thai.js"></script>
<script type="text/javascript">
$(function(){
	$("#dateInput").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
		numberOfMonths: 2,
//		buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true
	});
	
	$("#dateInput2").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
		numberOfMonths: 2,
//		buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true
	});	
	
	$("#dateInput3").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
//		buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true
	});		
	
	$("#openday").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
//		buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true
	});		
	
	$("#closeday").datepicker({
		dateFormat: 'dd-mm-yy',
		showOn: 'button',
//		buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true
	});		

		
	
	$("#date_inline").datepicker({
		dateFormat: 'dd-mm-yy',
		buttonImageOnly: false
	});
	
	$("#date_inline2").datepicker({
		dateFormat: 'dd-mm-yy',
		buttonImageOnly: false
	});	
	
});
</script>







<div class="row">
 <form id="saveCatalog" enctype="multipart/form-data" method="post" action="<?=url::base()?>adminCtrl/saveImport" >
	<div class="col-lg-6">
		<h1>
<!-- 			ค้นหา<small> เบอร์สวย เบอร์มงคล</small> -->
		</h1>
		<div class="alert alert-dismissable ">
		<h4><font color="#FFFFFF">เลือกรูปแบบ</font></h4>
                                            <select id="format" name="format" >

                                                <option value="000-0000000">000-0000000</option>
                                                <option value="00-0000-0000">00-0000-0000</option>
                                                <option value="000-000-0000">000-000-0000</option>
                                                <option value="000-00000-00">000-00000-00</option>
                                                <option value="000-000-0-000">000-000-0-000</option>
                                                <option value="00-00-00-00-00">00-00-00-00-00</option>
                                            </select>
		<h4><font color="#FFFFFF">เพิ่มเบอร์</font></h4>
		เบอร์โทร,ราคา,วันหมดอายุ m/yy,ลำดับ<br>
ตัวอย่าง : 0926164466,2000,4/21,001<br>
			<textarea id="data" name="data" class="form-control" style="width:50%;" rows="10"></textarea><br>
			<!--                         <button data-dismiss="alert" class="close" type="button">×</button> -->
			<h4><font color="#FFFFFF"> หมวดซิม</font></h4>
			<input  type="hidden" name="id" id="id" />
<?php 	$datas=ORM::factory("catalogsim")->find_all();
				
				foreach ($datas as $data){?>
				
				<input  type="checkbox" id="<?=$data->random?>" name="cat"  value="<?=$data->random?>"   /> <?=$data->name?>&nbsp; &nbsp;
				
				<?php }?>
			
				<input type="hidden" name="catall" id="catall">
				<br>
				<br>
				<h4><font color="#FFFFFF"> ชื่อเครื่อข่าย!</font></h4>
				<div id="sel">
				<select name="network" id="networks" class="form-control" style="width: 100px">
				<?php 	$datas=ORM::factory("networksim")->find_all();
				
				foreach ($datas as $data){?>
					<option value="<?=$data->name?>"><?=$data->name?></option>
					<?php }?>
					
				</select>
				</div>
		</div>
	</div>
	<div class="col-lg-6">
	<br><br>
		<div class="alert alert-dismissable ">
				<button  class="btn btn-success" type="button" onclick="doSave()"><div id="btname">บันทึก</div>  </button>
				<button class="btn btn-default" type="button" onclick="doReset()" >ยกเลิก</button>
		</div>
	</div>
		</form>
</div>
<div class="row"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
				
					<i class="fa fa-tasks"></i>
					<br>
				<br>
				<br> เบอร์โทร
				</h3>
			</div>
			<div class="panel-body">
			
			
		
			<div class="col-lg-6"><h4><font color="#FFFFFF">กรอกเบอร์ที่จะค้นหา</font></h4></div>
				<input  type="text" id="numberserch" name="numberserch" class="form-control"  />
			
				
				&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
				<button  class="btn btn-warning" type="button" onclick="doSerch()">ค้นหา</button>
				<button class="btn btn-default" type="button" onclick="window.location='<?=url::base()?>adminCtrl/importNumber'" >ยกเลิก</button>
				
				<br>
				<br>
				<script type="text/javascript">
				function doSerch(){

					if(document.getElementById("numberserch").value==""&&document.getElementById("closday").value==""){
						alert("กรุณากรอกเงื่อนไข");
					}else{
						var num = "N";
						var day = "N";
						if(document.getElementById("numberserch").value!=""){
							num = document.getElementById("numberserch").value;
						}
	
						window.location="<?=url::base()?>adminCtrl/importPageSerch/"+num+"/N";
					}
				}
				</script>
				
			
				<table style="width: 100%;font-size: 14px;" border="1" >
<?php 	
$i=1;
			foreach ($listCatalogsim as $catalogsim){?>
				<tr height="40px"
				<?php if(commonfn::todate($catalogsim->soldday)!="ยังไม่ได้ขาย"){?>
				style="background-color: #555555;"
				<?php }?>
				>
					
						<td align="center"><?=$catalogsim->networkid  ?></td>
						<td align="center"><?=commonfn::colornumber($catalogsim->numbershow)  ?></td>
						<td align="center">วันหมดอายุ</br>(<font color="red"> <?=$catalogsim->priceinsim ?></font>)</td>
						<td align="center">ขาย</br>( <font color="red"><?=$catalogsim->price ?> ฿</font>)</td>
						<td align="center">วันบันทึกข้อมูล</br>(<font color="green"> <?=commonfn::todate($catalogsim->openday) ?> </font>)</td>
						<td align="center">วันขาย</br>(<?=commonfn::todate($catalogsim->soldday) ?>)</td>
						<td align="center">
						<select class="form-control" style="width: 100px">
						<?php 
						
						$cat=$catalogsim->catalogid;
						echo  $cat;
						$catlist=explode(",",$cat);
						$datas=ORM::factory("catalogsim")->find_all();
						$c=0;
									foreach ($catlist as $cats){
										foreach ($datas as $data){
											if($cats==$data->random){
										?>
								<option ><?=$data->name?></option>
									<?php }

										} }?>
								</select>
								
						</td>
					
						<td align="center" style="width: 15%">
<!-- 						id,cat,networkid,numbershow,priceinsim,baseprice,price,openday,closeday -->
						<a title="ขาย" href="javascript:doSold('<?=$catalogsim->id ?>')"><img src="<?=url::base()?>css/img/s.png" width="30px" height="30px"/></a>&nbsp;
						<a title="กลับมาขายใหม่" href="javascript:dore('<?=$catalogsim->id ?>')"><img src="<?=url::base()?>css/img/re.png" width="30px" height="30px"/></a>&nbsp;
						<a title="ลบ" href="javascript:dodelete('<?=$catalogsim->id ?>')"><img src="<?=url::base()?>css/img/d.png" width="30px" height="30px"/></a>
						
						
						
						</td>
						
					</tr>
		<?php }?>
					
				</table>
			</div>
		</div>
	</div>
</div>
