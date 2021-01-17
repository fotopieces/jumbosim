<script>
function dodel(id){
	if(confirm("ต้องการลบข้อมูลหรือไม่")){
		window.location="<?=url::base()?>cartCtrl/deldetailcart/"+id;
	}
}
function detailOrder(id){
	
		window.location="<?=url::base()?>cartCtrl/detailOrder/"+id;
	
}
</script>

<div class="row">
	<div class="col-lg-12">
		<h1>
<!-- 			ค้นหา<small> เบอร์สวย เบอร์มงคล</small> -->
		</h1>
	
	</div>
</div>

   <?php
               
                $datas=ORM::factory("detaitbuysim")
                ->where("status","new")
                ->find_all();
            
   ?>
<div class="row"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tasks"></i> รายชื่อลูกค้าที่สั่งซื้อ
				</h3>
			</div>
			<div class="panel-body">
				<table style="width: 100%" border="1">
<?php 	 $i=1;
foreach ($datas as $data){ ?>
				<tr height="40px">
						<td style="width: 5%" align="center"><?=$i++?>.</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<?=$data->name?></td>
						<td style="width: 65%" > &nbsp; &nbsp;ที่อยู่  : <?=$data->address ?> 
						
						 
						 
						   </td>
						<td align="center" style="width: 10%">
						<a title="รายละเอียด" href="javascript:detailOrder('<?=$data->id?>')"><img src="<?=url::base()?>css/img/detail.png" width="30px" height="30px"/></a>
						<a title="ลบ" href="javascript:dodel('<?=$data->id?>')"><img src="<?=url::base()?>css/img/d.png" width="30px" height="30px"/></a>
						</td>
					</tr>
		<?php }?>
				
					
				</table>
				<br>
			
				
				
			</div>
		</div>
	</div>
</div>
