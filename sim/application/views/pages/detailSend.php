
<div class="row">
 <form id="saveCatalog" enctype="multipart/form-data" method="post" action="<?=url::base()?>cartCtrl/saveSend" >
	
	<div class="col-lg-6">
		<h1>
<!-- 			ค้นหา<small> เบอร์สวย เบอร์มงคล</small> -->
		</h1>
		<div class="alert alert-dismissable ">
			<!--                         <button data-dismiss="alert" class="close" type="button">×</button> -->
		
			

			<h4><font color="#FFFFFF">หมายเหตุ</font> </h4>
			<input type="hidden" id="id" name="id" value="<?=$id?>"/>
			<textarea id="remark" name="remark" class="form-control" rows="3"></textarea><br>
				
				<button  class="btn btn-success" type="button" onclick="doSave()"><div id="btname">บันทึก</div>  </button>
				<button class="btn btn-default" type="button" onclick="doReset()" >ยกเลิก</button>
				<script>
function doSave(){
	
	if(document.getElementById("remark").value==""){
		alert("กรุณากรอกหมายเหตุ");
	}else{
		if(confirm("ต้องการบันทึกข้อมูลหรือไม่")){
			document.getElementById("saveCatalog").submit();
		}
	}
	
}
function doReset(){
	history.back();
}
				</script>
			
		</div>
	</div>
		</form>
</div>
<div class="row"></div>

