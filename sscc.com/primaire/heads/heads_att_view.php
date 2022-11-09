<?php
session_start();
	require "../php/config.php";
	require_once "../php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(!$user->get_admin_session()){
		header('Location: heads_prof.php');
		exit();
	}
?>	
<?php 
$pageTitle = "Afficher les participations";
include "../php/top_heads.php";
?>
<div class="all_student fix">
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Afficher la participation </h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="float:right;"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;"><a style="color:#fff;" href="heads_att_take.php">Prendre les présences</a></button></span>
		</div>

		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;"> Date de présence</th>
				<th style="text-align:center;">Action</th>
				
				
			</tr>
			<?php 
			$i=0;
				$get_date = $user->get_attn_date();
				
				while($rows = $get_date->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['at_date'];?></td>
				<td><a href="heads_att_view_single.php?dt=<?php echo $rows['at_date']; ?>">Afficher la participation</a></td>
				
			</tr>
			<?php } ?>
			
		</table>
				<a href="heads_prof.php">
			<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="button" name="Submit" value="Annuler" /></span>
		</a>
</div>