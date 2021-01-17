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
                $idbuy=cookie::get("idbuy");
                $listcart=ORM::factory("cartsim")
                ->where("idbuy",$idbuy)
                ->where("status","new")
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
					<i class="fa fa-tasks"></i> ตะกร้าสินค้า
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
			
				<div align="center">
				<a href="javascript:window.location='<?=url::base()?>cartCtrl/detail'"><img src="<?=url::base()?>css/img/buy_button.png" width="150px"/></a>
				 </div>
				
			</div>
		</div>
	</div>
</div>
