?php
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
	if(isset($_REQUEST['dt'])){
		$date = $_REQUEST['dt'];
	}
?>	
<?php 
$pageTitle = "Mise à jour la présence";
include "../php/top_prof.php";
?>
<div class="all_student fix">
		<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c">Afficher les détails de la participation</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="float:left;"><a style="color:#fff;" href="att_take_prof.php"><button style="background:#58A85D;border:none;color:#fff;padding:10px;">Prendre les présences</button></a></span>
			<span style="float:right;"><a style="color:#fff;" href="att_view_prof.php"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;">Afficher la participation</button></a></span>
		</div>
		<p style="text-align:center;color:#34495e;margin:0;padding-top:8px;color:red;font-size:22px;">
			<?php echo "Présence de: ".$date;?>
		</p>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$atten = $_POST['attn'];
				$res = $user->update_attn($date,$atten);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Participation mise à jour avec succès !</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Échec de la mise à jour des données</p>";
				}
			}
		
		?>
		
	<form action="" method="post">
	
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Name</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Présence</th>
				
			</tr>
			<?php 
			$i=0;
				$std = $user->attn_all_student($date);
				if($std){
					
				
				while($rows = $std->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="absent" <?php if($rows['atten'] == "absent") echo "checked";?>/>Absent(e)</label>
					
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="present" <?php if($rows['atten'] == "present") echo "checked";?>/>Present(e)</label>
				</td>
			</tr>
			<?php 
			
			} }else echo "manqué(e)";
				?>
	
		</table>
		<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="submit" value="Mettre à jour" /></span>
		<a href="prof_profile.php">
			<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="button" name="Submit" value="Annuler" /></span>
		</a>
	</form>
		

		
</div>
