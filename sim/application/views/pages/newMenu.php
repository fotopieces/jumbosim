<script>

function saveMenu(){
	
	
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
<script type="text/javascript" src="<?=url::base()?>myEditer/Editer.js"></script>
          <script type="text/javascript">
				bkLib.onDomLoaded(function() {
					 var myNicEditor = new nicEditor();
					 myNicEditor.setPanel('myNicPanel');
					 myNicEditor.addInstance('myInstance1');
					 
					//nicEditors.allTextAreas()

					});
					function savePage(){
						document.getElementById("detail").value=document.getElementById("myInstance1").innerHTML;
						document.getElementById("formPage").submit();
						
					}
		 </script>

<div class="row">
	<div class="col-lg-12">
		<h1>
<!-- 			ค้นหา<small> เบอร์สวย เบอร์มงคล</small> -->
		</h1>
		<div class="alert alert-dismissable ">
			<!--                         <button data-dismiss="alert" class="close" type="button">×</button> -->
			
			<form id="formPage" action="<?=url::base()?>adminCtrl/saveMenu" method="post">
			<h4><font color="#ffffff">ชื่อเมนู</font></h4>
			<input type="hidden" name="id" id="id" value="<?=$id?>">
			<input type="text" name="name" id="name" value="<?=$name?>"  class="form-control" ><br><br>
			<input id="detail" name="detail" type="hidden">
			 <div id="myNicPanel" style="width: 98%;"></div>
		<div id="myInstance1" style="border:1px solid gray;min-height: 300px;width: 98%">
		<?=$detail?>
		</div>
		<p>
		<p>
		<p>
			<button  class="btn btn-success" type="button" onclick="savePage()"><div id="btname">บันทึก</div>  </button>
			<button  class="btn btn-default" type="button" onclick="history.back()"><div id="btname">ยกเลิก</div>  </button>
			</form>
			
		</div>
	</div>
</div>
<div class="row"></div>

