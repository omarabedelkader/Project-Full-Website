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
$pageTitle = "Résultat De L'étudiant";
include "../php/top_heads.php";
?>
<div class="all_student fix">
		
		<table class="tab_one" style="text-align:center;">
			<tr>
				<th style="text-align:center;">SL</th>
				<th style="text-align:center;">Nom</th>
				<th style="text-align:center;">ID</th>
				<th style="text-align:center;">Ajouter un résultat</th>
				<th style="text-align:center;">Voir résultat</th>
				
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
		?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td><a href="heads_st_result_add.php?ar=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name'];?>">Add Result</a></td>
				<td><a href="heads_st_result_view.php?vr=<?php echo $rows['st_id']; ?>&vn=<?php echo $rows['name'];?>">View Result</a></td>
			</tr>
			<?php } ?>
	
		</table>

		
</div>