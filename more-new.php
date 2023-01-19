<?php 
	include('_config_inc.php');
	$BASE_URL=BASE_URL;
	$BASE_PATH=BASE_PATH;
	include('admin/action/action.php');
	$db=new Action;
	$e=$_POST['e'];
	$s=$_POST['s'];
	$con=$_POST['con'];
	$post_data=$db->SelectData("*","tbl_news",$con,"id DESC","".$e.",".$s."");
		if($post_data !='0'){
		foreach($post_data as $val){
		?>
			<div class="col-xl-12 box-news">				
			<div class="col-xl-4 img" style="background-image: url(admin/<?php echo $val[5];?>)"></div>
			<div class="col-xl-8 text">
			<a href="<?php echo $BASE_URL;?>?menuid=<?php echo $val[10];?>&news=<?php echo $val[11];?>"><?php echo $val[3] .' - '.$val[0];?></a>
			<i class="far fa-clock"> </i>
				<span>
					<?php 
						$db->get_post_date($val[2],$val[1]);
					?>
				</span>
					<i class="fas fa-eye"></i>
				<span><?php echo $val[9]; ?></span>
				<?php echo mb_substr($val[4],0,50,"utf8"); ?>....
			</div>
		</div>				
	<?php
 	}
	}
?>