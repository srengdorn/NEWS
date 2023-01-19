<?php
//Initial Timezoone

include('_config_inc.php');
$BASE_URL=BASE_URL;
$BASE_PATH=BASE_PATH;
include('admin/action/action.php');
$db=new Action;
$f_url=$BASE_URL;
$f_title="todaynews";
$f_des="Testing facebook plugin";
$f_img=$BASE_URL."admin/1579605415.jpg";

$con="status=1 && location=1";
$home_bg="#320245";
if(isset($_GET['menuid'])){
	$con="status=1 && location=1 && menu_id=".$_GET['menuid']."";
	$home_bg="royalblue";
}

if(isset($_GET['news'])){
	$newid=$_GET['news'];
	$post_data= $db->selectCurrentData("*","tbl_news","title_link='".$newid."'");
	$f_url=$BASE_URL.'?menuid'.$post_data[10].'&news='.$newid;
	$f_title=$post_data[3];
	$f_des=mb_substr($post_data[4],0,100,'utf8');
	$f_img=$BASE_URL.'admin'.$post_data[5];
}
$item_num = $db->countData("tbl_news",$con);

?>	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Today news</title>
  <meta property="og:url"           content="<?php echo $f_url; ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="<?php echo $f_title;?>" />
  <meta property="og:description"   content="<?php echo $f_des;?>" />
  <meta property="og:image"         content="<?php echo $f_img;?>" />
	
	
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Battambang:wght@300;900&family=Moul&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $BASE_URL;?>home/style/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $BASE_URL;?>home/style/fontawesome-free-5.3.1-web/css/all.min.css">
	<link rel="stylesheet" href="<?php echo $BASE_URL;?>home/style/style.css">
	<script src="<?php echo $BASE_URL;?>home/js/jquery-3.2.1.min.js"></script>
	
</head>

<body>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>
	
	
	<div class="container-fluid">
		<div class="container">
			<div class="row">			
				<div class="col-xl-3 col-lg-3 logo">
					<img src="<?php echo $BASE_URL;?>home/img/develop-logo.jpg">
				</div>
				<div class="col-xl-9 col-lg-9 ads1">
					<?php 
						$post_data=$db->selectCurrentData("id,url,img","tbl_ads","location=1 AND status=1");
						
					?>
					<a href="<?php echo $post_data[1];?>" target="_blank">
                         <img src="<?php echo $BASE_URL;?>admin/<?php echo $post_data[2];?>">
<!--						<img src="home/img/develop-logo.jpg">-->
					</a>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid bar2">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 menu">
					<ul>
						<li><a href="<?php echo $BASE_URL;?>" style="background-color: <?php echo $home_bg;?>"><i class="fas fa-home"></i></a></li>
						<?php 
							$post_data=$db->SelectData("id,name,name_link","tbl_menu","status=1","od DESC","0,20");
								if($post_data !='0'){
								foreach($post_data as $val){
									$bg1="royalblue";
									if(isset($_GET['menuid']) && $_GET['menuid']==$val[0]){
										$bg1="#320245";
									}
									?>
									<li>
										<a href="<?php echo $BASE_URL;?><?php echo $val[0];?>" style=" background-color: <?php echo $bg1;?>">
										<?php echo $val[1]; ?></a>
									</li>
						
									<?php
								}
							}
						?>						
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container content">
		<div class="row">
			<div class="col-xl-8 ">
				<div class="col-xl-12 box-cnt">
				<?php
					if(isset($_GET['news']))
					{
						$newid=$_GET['news'];
						include('news-detail.php');				
					}else{
						include('news-box.php');
					}					
				?>
			</div>
		</div>
			<div class="col-xl-4">
				<?php 
					$post_data= $db->SelectData("url,img,type","tbl_ads","status=1 AND location=2","od DESC","0,20");
				if($post_data !='0'){
					foreach($post_data as $val){
						?>
						<div class="ads2">
						<?php
							if($val[2]==1){
							?>
								<a href="<?php echo $val[0]; ?>" target="_blank"><img src="<?php echo $BASE_URL;?>admin/<?php echo $val[1];?> "</a>
							<?php
						}else{
							echo $val[0];
						}
					?>							
							
						</div>
					<?php
					}
				}
				
				?>
						
						
					<?php 
					$post_data = $db->SelectData("*","tbl_news","status=1 AND location=2","id DESC","0,3");
						if($post_data !='0'){
							foreach($post_data as $val){
								?>
									<div class="col-xl-12 hot-new">
											<div class="col-xl-5 img">
												<img src="<?php echo $BASE_URL;?>admin/<?php echo $val[5];?>">
											</div>
											<div class="col-xl-7 text">
												<a href="#"><?php echo $val[3];?>
												</a>
											</div>						
										</div>
								<?php
							}
						}
						?>
						
						
				<div class="fb-page" data-href="https://www.facebook.com/&#x1780;&#x17c6;&#x179f;&#x17b6;&#x1793;&#x17d2;&#x178f;-1748719225370040/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/&#x1780;&#x17c6;&#x179f;&#x17b6;&#x1793;&#x17d2;&#x178f;-1748719225370040/" class="fb-xfbml-parse-ignore" style="margin-top: 10px;"><a href="https://www.facebook.com/&#x1780;&#x17c6;&#x179f;&#x17b6;&#x1793;&#x17d2;&#x178f;-1748719225370040/">កំសាន្�?</a></blockquote></div>
				<!-- BEGIN: Powered by Supercounters.com -->
					<center><script type="text/javascript" src="//widget.supercounters.com/ssl/online_i.js"></script><script type="text/javascript">sc_online_i(1568174,"ffffff","e61c1c");</script><br><noscript><a href="https://www.supercounters.com/" >free online counter</a></noscript>
					</center>
				<!-- END: Powered by Supercounters.com -->

			</div>
		</div>
	</div>
	
<!--	footer-->
	<div class="container-fluid footer">
		<div class="container">
			<div class="row">
			<div class="col-xl-4">
				<div class="text">
				<h5>អំពីយើង</h5>
				<p>
					គោលបំណងរបស់យើងគីផ្សព្វផ្សាយព័ត៌មានដល់បងប្អូន					
				</p>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="text">
				<h5>ទំនាក់ទំនង</h5>
					<p>
					
					#16, Str A6, Sangkat Chrouychangvar,
					Khan Chrouychangvar, Phnom Penh, Cambodia
					Phone: (+855) 88 4045493 
					</p>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="text">
				
					<h5>ជួបគ្នានៅបណ្តាញសង្គម</h5>
					<p>
						ទំនាក់ទំនង<br>
						info@sabay.com</br>
						023 228 000
					</p>
				</div>
				</div>
			</div>
		</div>
	</div>
<!--	footer-->
	
	<input type="hidden" id="txt-con" value="<?php echo $con;?>">
	<input type="hidden" id="txt-num-item" value="<?php echo $item_num-5;?>">
</body>
	<script>
		$(document).ready(function(){
			var e=5;
			var s=5;
			var con=$('#txt-con').val();
			var num_item=$('#txt-num-item');
			//var con='<?php echo $con;?>';
			$('.btn-more').click(function(){
				var eThis=$(this);
				$.ajax({
					url:'more-new.php',
					type:'POST',
					cache:false,
					data:{e:e,s:s,con:con},
					beforeSend:function(){
						eThis.css({'pointer-events':'none','opacity':'0.5'});
						eThis.html('<i class="fas fa-spinner fa-spin"></i>  Wait...');
					},
					success:function(data){
						//$('.box-cnt').append(data);
						eThis.before(data);
						e=parseInt(e)+parseInt(s);
						num_item.val(num_item.val()-5);
						if(num_item.val()<= 0){
							eThis.hide();
						}else{							
							eThis.css({'pointer-events':'auto','opacity':'1'});
							eThis.html('more...');	
						}						
										
					},					
				});
			});
		});
	
	</script>


</html>