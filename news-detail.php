<div class="news-detail">
<?php
	
	$db->UpdData("tbl_news","view=view+1","title_link='".$newid."'");

$post_data=$db->selectCurrentData("*","tbl_news","title_link='".$newid."'");
?>

	<h1 style=" margin-top: 20px;">
		<?php
			echo $post_data[3];
		?>
	<br>
	<br>
	<i class="far fa-clock" style="font-size: 14px;">	
		<?php 
			$db->get_post_date($post_data[2],$post_data[1]);
		?>		
		
		</i>
		<div class="fb-share-button" data-href="<?php echo $f_url;?>" data-layout="button_count" data-size="small" style="float: right;"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2F%25E1%259E%2580%25E1%259F%2586%25E1%259E%259F%25E1%259E%25B6%25E1%259E%2593%25E1%259F%2592%25E1%259E%258F-1748719225370040%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">ចែករំលែក</a></div>
	<hr>
</h1>
<p>
<?php
 echo $post_data[4];
?>
</p>
	<div class="fb-comments" data-href="<?php echo $f_url;?>" data-width="" data-numposts="5"></div>
</div>
<style>

	body{
		padding: 0;
		margin: 0;
	}
	p{
		font-size: 16px;
		color: #000;
		font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", "serif";
	}
	h1{
		font-family: 'Hanuman', serif;
		font-size: 20px;
		color: #000;
	}
</style>








