<script>

function newMenu(){
	
	window.location="<?=url::base()?>adminCtrl/newGif/0";
	
}
function doEditMenu(id){
	//alert(1);
	window.location="<?=url::base()?>adminCtrl/newGif/"+id;
	
	//document.getElementById("saveCatalog").reset();
}
function doResetCatalog(){
	document.getElementById("btname").innerHTML = "บันทึก";
	document.getElementById("saveCatalog").reset();
}
function dodelete(id){
	if(confirm("ต้องการลบข้อมูลหรือไม่")){
		window.location="<?=url::base()?>adminCtrl/delGif/"+id;
	}
}

</script>

<div class="row">
	<div class="col-lg-12">
		<h1>
<!-- 			ค้นหา<small> เบอร์สวย เบอร์มงคล</small> -->
		</h1>
		<div class="alert alert-dismissable ">
			<!--                         <button data-dismiss="alert" class="close" type="button">×</button> -->
<!-- 			<h4>ผลรวม!</h4> 
			<button  class="btn btn-success" type="button" onclick="newMenu()"><div id="btname">เพิ่มเมนู</div>  </button>-->
		</div>
	</div>
</div>
<div class="row"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tasks"></i> รายชื่อ
				</h3>
			</div>
			<div class="panel-body">
				<table style="width: 100%" border="1">
<?php 	$listCatalogsim=ORM::factory("pagesim")->where("status","G")->find_all();
$i=1;
			foreach ($listCatalogsim as $catalogsim){?>
				<tr height="40px">
						<td style="width: 5%" align="center"><?=$i++?>.</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<?=$catalogsim->name?></td>
						
						<td align="center" style="width: 10%">
						<a href="javascript:doEditMenu('<?=$catalogsim->id?>')"><img src="<?=url::base()?>css/img/edit-icon.png" width="30px" height="30px"/></a>
						<a title="ลบ" href="javascript:dodelete('<?=$catalogsim->id ?>')"><img src="<?=url::base()?>css/img/d.png" width="30px" height="30px"/></a>
						
						</td>
					</tr>
		<?php }?>
					
				</table>
			</div>
		</div>
	</div>
</div>
