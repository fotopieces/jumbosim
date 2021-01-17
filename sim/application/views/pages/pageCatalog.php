<script>

function doSaveCatalog(){
	if(document.getElementById("name").value==""){
		alert("กรุณากรอกชื่อ");
	}else if(document.getElementById("status").value=="0"){
		alert("กรุณาเลือกสถานะ");
	}else{
		if(confirm("ต้องการบันทึกข้อมูลหรือไม่")){
				document.getElementById("saveCatalog").submit();
		}
	}
	
}
function doEditCatalog(id,name,status){
	//alert(1);
	document.getElementById("btname").innerHTML = "แก้ไข";
	document.getElementById("name").value = name;
	document.getElementById("id").value = id;
	document.getElementById("status").value = status;
	
	//document.getElementById("saveCatalog").reset();
}
function doResetCatalog(){
	document.getElementById("btname").innerHTML = "บันทึก";
	document.getElementById("saveCatalog").reset();
}


</script>

<div class="row">
	<div class="col-lg-12">
		<h1>
<!-- 			ค้นหา<small> เบอร์สวย เบอร์มงคล</small> -->
		</h1>
		<div class="alert alert-dismissable ">
			<!--                         <button data-dismiss="alert" class="close" type="button">×</button> -->
			<h4><font color="#FFFFFF">ชื่อหมวดเบอร์!</font> </h4>
			<p>
			   <form id="saveCatalog" enctype="multipart/form-data" method="post" action="<?=url::base()?>adminCtrl/saveCatalog" >
				<input  type="hidden" name="id" id="id" />
				<input  type="text" id="name" name="name" class="form-control"   /><br>
				<br>
				<br>
				<select name="status" id="status" class="form-control" style="width: 100px">
					<option value="0">เลือก</option>
					<option value="Y">ใช้งาน</option>
					<option value="N">ไม่ใช้งาน</option>
				</select><br>
				<br>
				<button  class="btn btn-success" type="button" onclick="doSaveCatalog()"><div id="btname">บันทึก</div>  </button>
				<button class="btn btn-default" type="button" onclick="doResetCatalog()" >ยกเลิก</button>
				</form>
			</p>
		</div>
	</div>
</div>
<div class="row"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tasks"></i> หมวดเบอร์โทร
				</h3>
			</div>
			<div class="panel-body">
				<table style="width: 100%" border="1">
<?php 	$listCatalogsim=ORM::factory("catalogsim")->find_all();
$i=1;
			foreach ($listCatalogsim as $catalogsim){?>
				<tr height="40px">
						<td style="width: 5%" align="center"><?=$i++?>.</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<?=$catalogsim->name?></td>
						<td align="center" style="width: 10%" >
						<?php if($catalogsim->status=="Y"){
							echo "ใช้งาน";
						}else{
							echo "ไม่ใช้งาน";
						}?>
						 
						 
						   </td>
						<td align="center" style="width: 10%"><a href="javascript:doEditCatalog('<?=$catalogsim->id?>','<?=$catalogsim->name?>','<?=$catalogsim->status?>')"><img src="<?=url::base()?>css/img/edit-icon.png" width="30px" height="30px"/></a></td>
					</tr>
		<?php }?>
					
				</table>
			</div>
		</div>
	</div>
</div>
