<?php
	session_start();
	require "../php/config.php";
	require_once "../php/functions.php";
	$user = new login_registration_class();
	$admin_id = $_SESSION['admin_id'];
	$admin_name = $_SESSION['admin_name'];
	if(isset($_REQUEST['id'])){
		$st_id = $_REQUEST['id'];
	}else{
		header('Location: heads_prof.php');
		exit();
	}
	
	if(!$user->get_admin_session()){
		header('Location: heads_login.php');
		exit();
	}
?>
<?php 
$pageTitle = "Détails de l'étudiant ";
include "../php/top_heads.php";
?>
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0"><?php $user->getusername($st_id); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table class="tab_one">
			<?php
				$getuser = $user->getuserbyid($st_id);
				while($row = $getuser->fetch_assoc()){
			?>
			<tr>
				<td></td>
				<?php if(empty($row['img'])){?>
				<td><img src="img/default.png" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }else{ ?>
				<td><img src="img/student/<?php echo $row['img']; ?>" style="height:180px; width:180px; border:1px #1ABC9C solid;border-radius:90px" alt="" /></td>
				<?php }?>
			</tr>
			<tr>
				<td>Elève ID: </td>
				<td><?php echo $row['st_id']; ?></td>
			</tr>
			<tr>
				<td>Nom: </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td>Courier: </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Date de naissance: </td>
				<td><?php echo $row['bday']; ?></td>
			</tr>
			<tr>
				<td>Classe: </td>
				<td><?php echo $row['program']; ?></td>
			</tr>
			<tr>
				<td>Contact: </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<tr>
				<td>Genre: </td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<tr>
				<td>Adresse: </td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<tr>
				<td>Mettre à jour le profil: </td>
				<td><a href="heads_st_update.php?id=<?php echo $row['st_id'];?>"><button class="editbtn">Editer le profil</button></a></td>
			</tr>
			<?php  } ?>
		</table>
		<div class="back fix">
			<p style="text-align:center"><a href="heads_all_student.php"><button class="editbtn">Retour aux listes d'étudiants</button></a></p>
		</div>

</div>
