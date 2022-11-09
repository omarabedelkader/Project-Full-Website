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
$pageTitle = "Prendre la présence";
include "../php/top_heads.php";
?>
<div class="all_student fix">
		<h3 style="text-align:center;color:#fff;margin:0;padding:5px;background:#1abc9c"> Prendre les présences</h3>
		<div  class="fix" style="background:#ddd;padding:20px;">
			<span style="text-align:center;"><a style="color:#fff;" href="heads_att_view.php"> <button style="background:#58A85D;border:none;color:#fff;padding:10px;">Afficher la participation</button></a></span>
		</div>
		<?php
			if(isset($_REQUEST['res'])){
				echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Données supprimées avec succès !</h3>";
			}
		?>
		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$cur_date = $_POST['attndate'];
				$atten = $_POST['attn'];
				$res = $user->insertattn($cur_date,$atten);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Données de présence insérées avec succès !</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Échec de l'insertion des données</p>";
				}
			}
		
		?>
		
	<form action="" method="post">
		<p style="text-align:center;color:#34495e;">
			<mark>Sélectionner une date: <input type="date" name="attndate" required/></mark><br/>
			<mark>Des remarques ? :<input type="text" name=""></mark>
		</p>
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Nom</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Présence</th>
	
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->attn_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td>
					<label style="color:red;font-size:20px"><input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="absent" checked/>Absent(e)</label>
					
					<label style="color:green;font-size:20px"> <input type="radio" name="attn[<?php echo $rows['st_id'];?>]" value="present" />Present(e)</label>
				</td>
			</tr>
			<?php } ?>
	
		</table>
		<p style="color:red ">C'est nécessaire de présenter la feuille des présence chez le chef du départment.<br/>
		N.B : Tu faire un capture d'écran.<br/>
		-</p>
		<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="submit" name="Submit" value="Soumettre" /></span>
		<a href="heads_prof.php">
			<span style="margin-left:360px;"><input style="<text-align:right></text-align:right>;background:#58A85D;border:none;color:#fff;padding:8px 100px;" type="button" name="Submit" value="Annuler" /></span>
		</a>
	</form>
		

		
</div>