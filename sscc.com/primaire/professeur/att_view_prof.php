<?php
session_start();
	require "../php/config.php";
	require_once "../php/functions.php";
	$user = new login_registration_class();
	$fid = $_SESSION['f_id'];
	$funame = $_SESSION['f_uname'];
	$fname = $_SESSION['f_name'];
	if(!$user->get_faculty_session()){
		header('Location: prof_login.php');
		exit();
	}
?>	
<?php 
$pageTitle = "Afficher les participations";
include "../php/top_prof.php";
?>
<div class="all_student fix">
	<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Afficher la présence</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="float:right;"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;"><a style="color:#fff;" href="att_take_prof.php">Prendre les présences</a></button></span>
		</div>

		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Date de Présence</th>
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
				<td><a href="att_view_prof_single.php?dt=<?php echo $rows['at_date']; ?>">Afficher la présence</a></td>
				
			</tr>
			<?php } ?>
			
		</table>
</div>	
		<a href="prof_profile.php">
			<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="button" name="Submit" value="Annuler" /></span>
		</a>
