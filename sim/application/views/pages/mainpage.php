<table style="width: 100%">
  
  <tr>
    <td>


<div align="center">

	<?php 	
	//$count=ORM::factory("numbersim")->like('catalogid',$catid)->count_all();
	//echo  $row;
	$perpage = 60;
	$page = $row/$perpage;

	$i=0;
	$start = ($perpage * $counts);
	$end = $perpage * ($counts+1);


	if($counts==0){
	$end++;
}

//$listCatalogsim=ORM::factory("numbersim")->like('catalogid',$catid)->find_all();
?></p></p></p></p>
<table border="0"  style="width: 100%">
<?php
$counttable=0;
			foreach ($listCatalogsim as $catalogsim){?>
			
	<?php 
	$i++;

	if($start<=$i&&$i<$end){

if(($counttable%5==0)){
?><tr><?php
}
$counttable++;
?>
				

	            
	            	<td align="center">
	<div class="col-lg-10">
		<?php if($catalogsim->networkid=="AIS"){ ?>
		<div class="panel panel-success">
			<?php }else if($catalogsim->networkid=="Dtac"){ ?>
			<div class="panel panel-danger">
				<?php }else if($catalogsim->networkid=="True"){ ?>
				<div class="panel panel-warning">
					<?php }else{?>
					<div class="panel panel-info">
						<?php }?>

						<?php $len = strlen($catalogsim->number);
						// echo  $len."|".$catalogsim->number."|";
						$count = 0;
						$sum=0;
						while ($count<$len){
					$sum=$sum+$catalogsim->number[$count];
					$count++;
	            }
	            //echo  $sum;
	            ?>
	            
	            
						<div class="panel-heading">
							<h5>
								<strong>
								&nbsp;
								
								</strong>
							</h5>
						</div>
						<div class="panel-body" style="background-color: #FFFFE8;">
						<br>
						
							<?php if($catalogsim->networkid=="AIS"){ ?>
							<img src="<?=url::base()?>css/img/a.png" width="60px" />
							<?php }else if($catalogsim->networkid=="Dtac"){ ?>
							<img src="<?=url::base()?>css/img/dt.png" width="60px" />
							<?php }else if($catalogsim->networkid=="True"){ ?>
							<img src="<?=url::base()?>css/img/t.png" width="60px" />
							<?php }else{?>
							<div style="height: 28px"></div>
							<?php }?>

<h2>
								<strong> <font color="black">
								
								<?=commonfn::colornumber($catalogsim->numbershow)  ?>
								</font>
								</strong>
							</h2>
							
							<h4>
								<strong> <font color="black">
								<a href="<?=url::base()?>page/sum/<?=$sum ?>">ราคา<font color="#0000BB"> <?=$catalogsim->price ?></font>   ผลรวม <font color="red"><?=$sum ?></font></a>
							
								</font>
								</strong>
							</h4>

									<a href="javascript:addtocart('<?=$catalogsim->id?>')"><img src="<?=url::base()?>css/img/cart.png" width="60px" title="Add To Cart"/></a>
								<br>
								<br>
						</div>
					
						
					</div>

				</div>

					</td>
	            

				<?php }?>
				
				
<? }?>
</table>
				<div class="col-lg-12">
					<h4><font color="#FFFFFF">
						หน้า >>>
						<?php
						$a=0;
						while($a<$page){
	if($a!=0){?>
						| <a href="<?=url::base()?>page/cat/<?=$catid ?>/<?=$a?>/<?=$detail?>"><font color="#FFFFFF"><?=$a+1?></font>
						</a>
						<?php }else{ ?>
						<a href="<?=url::base()?>page/cat/<?=$catid ?>/<?=$a?>/<?=$detail?>"><font color="#FFFFFF"><?=$a+1?></font>
						</a>
						<?php } $a++;
}?>
					</font></h4>
				</div>

			</div>
			
			  
    </td>
  </tr>
</table>
			<script>
function addtocart(id){

alert("หากสนใจกรุณาติดต่อ \nID ไลน์ : jangprogram2554 \n เบอร์ติดต่อ : \n061-659-5454  แจง \n094-795-5651  เนส")	

}           
</script>