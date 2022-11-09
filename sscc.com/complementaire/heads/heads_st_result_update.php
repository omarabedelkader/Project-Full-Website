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
	if(isset($_REQUEST['ar'])){
		$stid = $_REQUEST['ar'];
		$name = $_REQUEST['vn'];
		$semester = $_REQUEST['seme'];
	}
?>	
<?php 
$pageTitle = "Voir Les Résultat De L'étudiant";
include "../php/top_heads.php";
?>
<div class="all_student fix">
		<div>
		<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nom: ".$name."<br>Élève ID: ".$stid."<br>Semester: " . $semester; ?></p>
		</div>
			<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$subject = $_POST['umark'];
				$res = $user->update_result($stid,$subject,$semester);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Marques mises à jour avec succès!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Échec de la mise à jour des données</p>";
				}
			}
		
	
		?>

		
		<form action="" method="post">
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">Matière</th>
				<th style="text-align:center;">Marque</th>
				
			</tr>
			<?php 
			$i=0;
			
				$get_result = $user->show_marks($stid,$semester);
				
				while($rows = $get_result->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $rows['sub'];?></td>
				<td><input type="text" name="umark[<?php echo $rows['sub'];?>]" value="<?php echo $rows['marks'];?>"/></td>
				
			</tr>
			<?php } ?>
			<tr><td colspan="2"><input type="submit" value="Mettre à jour le résultat" /></td></tr>
		</table>
	</form>
		<div class="back fix">
				<p style="text-align:center"><a href="heads_st_result_view.php?vr=<?php echo $stid?>&vn=<?php echo $name?>"><button class="editbtn">Retour à la liste</button></a></p>
			</div>
</div>