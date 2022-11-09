<?php
session_start();
	require "../php/config.php";
	require_once "../php/functions.php";
	$user = new login_registration_class();
	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];
	if(!$user->getsession()){
		header('Location: st_login.php');
		exit();
	}
?>	
<?php 
$pageTitle = "Profile d'élève";
include "../php/top_general.php";
?>
<div class="profile">
		<p style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Bienvenue: <?php $user->getusername($sid); ?> <i class="fa fa-check-circle" aria-hidden="true"></i></p>
		<table class="tab_one">
			<?php
				$getuser = $user->getuserbyid($sid);
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
			<tr >
				<td><b>Elève ID:</b> </td>
				<td><?php echo $row['st_id']; ?></td>
			</tr>
			<tr>
				<td><b>Nom:</b> </td>
				<td><?php echo $row['name']; ?></td>
			</tr>
			<tr>
				<td><b>Courirer</b> </td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td><b>Date de Naissance</b> </td>
				<td><?php echo $row['bday']; ?></td>
			</tr>
			<tr>
				<td><b>Classe:</b> </td>
				<td><?php echo $row['program']; ?></td>
			</tr>
			<tr>
				<td><b>Contact:</b> </td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<tr>
				<td><b>Genre:</b> </td>
				<td><?php echo $row['gender']; ?></td>
			</tr>
			<tr>
				<td><b>Adresse:</b> </td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<?php if($row['st_id'] == $sid){ ?>
			<?php } } ?>
		</table>

</div>