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
$pageTitle = "Profile D'administrateur";
include "../php/top_heads.php";
?>
<div class="admin_profile">
	
	<div class="section">
			<h3>Etudiant</h3>
			<ul>
				<li><a href="heads_st_reg.php">Créer un nouvel étudiant(e) </a></li>
				<li><a href="heads_all_student.php">Voir tous les étudiants</a></li>
				<li><a href="heads_st_result.php">Résultat étudiant</a></li>
				<li><a href="heads_att_take.php">Présence</a></li>
			</ul>
	</div>
	<div class="section">
			<h3>Professeur8</h3>
			<ul>
				<li><a href="heads_prof_reg.php">Créer un nouveau professeur</a></li>
				<li><a href="heads_all_prof.php">Professeur détails</a></li>
			</ul>
	</div>
</div>