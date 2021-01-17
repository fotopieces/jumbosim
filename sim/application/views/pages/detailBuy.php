
<div class="row">
 <form id="saveCatalog" enctype="multipart/form-data" method="post" action="<?=url::base()?>cartCtrl/saveDetail" >
	
	<div class="col-lg-6">
		<h1>
<!-- 			ค้นหา<small> เบอร์สวย เบอร์มงคล</small> -->
		</h1>
		<div class="alert alert-dismissable " align="center">
			<!--                         <button data-dismiss="alert" class="close" type="button">×</button> -->
			<table style="width: 100%">
				<tr>
					<td width="40%" align="right">	<h4><font color="#FFFFFF">ชื่อ :</font> </h4></td>
					<td width="60%" align="left"><input  type="text" id="name" name="name"    /></td>
				</tr>
				<tr>
					<td width="40%" align="right">	<h4><font color="#FFFFFF">เบอร์โทรติดต่อ :</font></h4></td>
					<td width="60%" align="left"><input  type="text" id="tel" name="tel" class="form-control"   /></td>
				</tr>
				<tr>
					<td width="40%" align="right"><h4><font color="#FFFFFF">หมายเหตุ :</font></h4></td>
					<td width="60%" align="left"><textarea id="address" name="address" class="form-control" rows="3"></textarea></td>
				</tr>
			</table>
		
				<a href="javascript:doSave()"><img src="<?=url::base()?>css/img/buy_button.png" width="150px"/></a>
			
				
			
				
				
				<script>
function doSave(){
	
	if(document.getElementById("name").value==""){
		alert("กรุณากรอกชื่อ");
	}else if(document.getElementById("tel").value==""){
		alert("กรุณากรอกเบอร์โทร");
	}else if(document.getElementById("address").value==""){
		alert("กรุณากรอกที่อยู่");
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

