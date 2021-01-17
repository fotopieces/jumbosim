<script>
function dodel(id){
	if(confirm("ต้องการลบข้อมูลหรือไม่")){
		window.location="<?=url::base()?>cartCtrl/delcart/"+id;
	}
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
               
                $data=ORM::factory("detaitbuysim")->find($id);
   
   ?>
     <?php
                $idbuy=$data->idbuy;
                $listcart=ORM::factory("cartsim")
                ->where("idbuy",$idbuy)
                ->where("status","wait")
                ->find_all();
                $count = 0;
                $sumprice = 0;
                foreach ($listcart as $cart){
                	$count++;
                	$sumprice=$sumprice+$cart->price;
                }
   ?>
<div class="row"></div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-tasks"></i> ชื่อ    <?=$data->name ?>       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         เบอร์โทรติดต่อ  <?=$data->tel ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ที่อยู่ <?=$data->address ?> 
				</h3>
			</div>
			<div class="panel-body">
				<table style="width: 100%" border="1">
<?php 	 $i=1;
foreach ($listcart as $cart){ ?>
				<tr height="40px">
						<td style="width: 5%" align="center"><?=$i++?>.</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;<?=commonfn::colornumber($cart->number)?></td>
						<td align="center" style="width: 15%" >
						ราคา <?=$cart->price ?> บาท
						
						 
						 
						   </td>
						<td align="center" style="width: 10%"><a href="javascript:dodel('<?=$cart->id?>')"><img src="<?=url::base()?>css/img/d.png" width="30px" height="30px"/></a></td>
					</tr>
		<?php }?>
					<tr>
					<td colspan="4" align="center"><h4><font color="#FFFFFF"> รวม  <font color="red"><?=$sumprice?></font> บาท</font></h4></td>
					</tr>
					
				</table>
				<br>
			
				<div align="center"><button class="btn btn-success" type="button" onclick="javascript:window.location='<?=url::base()?>cartCtrl/send/<?=$id ?>'">ส่งให้ลูกค้า</button> 
				 </div>
				
			</div>
		</div>
	</div>
</div>

