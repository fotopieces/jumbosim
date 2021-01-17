<script>

function doLogin(){
	if(document.getElementById("username").value==""){
		alert("กรุณากรอก Username");
	}else if(document.getElementById("password").value=="0"){
		alert("กรุณากรอก Password");
	}else{
		
				document.getElementById("saveCatalog").submit();
		
	}
	
}

function doReset(){
	
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
		
			<p>
			   <form id="saveCatalog" enctype="multipart/form-data" method="post" action="<?=url::base()?>adminCtrl/login" >
					<h4><font color="#ffffff">Username</font></h4>
				<input  type="text" id="username" name="username" class="form-control"   /><br>
					<h4><font color="#ffffff">Password</font></h4>
				<input  type="password" id="password" name="password" class="form-control"   /><br>
				
				<br>
				<br>
				<button  class="btn btn-success" type="button" onclick="doLogin()"><div id="btname">เข้าระบบ</div>  </button>
				<button class="btn btn-default" type="button" onclick="doReset()" >ยกเลิก</button>
				</form>
			</p>
		</div>
	</div>
</div>
<div class="row"></div>

