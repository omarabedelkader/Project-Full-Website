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
$pageTitle = "All student details";
include "../php/top_heads.php";
?>
<div class="all_student">
	<div class="search_st">
		<div class="hdinfo"><h3>Liste de tous les étudiants inscrits</h3></div>
		
		<div class="search">
		<form action="admin_search_student.php" method="GET">
			<input type="text" name="src_student" placeholder="Recherche étudiant" />
			<input type="submit" value="Recherche" />
		</form>
		</div>
	</div>
		<?php
			if(isset($_REQUEST['res'])){
				if($_REQUEST['res']==1){
					echo "<h3 style='color:green;text-align:center;margin:0;padding:10px;'>Données supprimées avec succès</h3>";
				}
			}
			
		?>
		<table class="tab_one">
			<tr>
				<th>SL</th>
				<th>Nom</th>
				<th>ID</th>
				<th>Montre le profile</th>
				<th>Éditer</th>
				<th>Supprimer</th>
				<th>Photo</th>
			</tr>
			<?php 
			$i=0;
				$alluser = $user->get_all_student();
				
				while($rows = $alluser->fetch_assoc()){
				$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $rows['name'];?></td>
				<td><?php echo $rows['st_id'];?></td>
				<td><a href="heads_st_prof_view.php?id=<?php echo $rows['st_id'];?>">Voir les détails</a></td>
				<td><a href="heads_st_prof_update.php?id=<?php echo $rows['st_id'];?>">Éditer</a></td>
				<td><a href="heads_st_prof_delete.php?id=<?php echo $rows['st_id'];?>">Supprimer</a></td>
				<td><img src="img/student/<?php echo $rows['img'];?>" width="50px" height="50px" title="<?php echo $rows['name'];?>" /></td>
			</tr>
			<?php } ?>
		</table>
</div>