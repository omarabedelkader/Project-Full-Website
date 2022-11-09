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
$pageTitle = "Mise à jour de profile de l'étudiant";
include "../php/top_general.php";
?>


<div class="profile">
			<h3 style="font-size:18px;text-align:center;background:#1abc9c;color:#fff;padding:10px;margin:0">Mettre à jour le profil</h3>							
				<?php
						
					if($_SERVER['REQUEST_METHOD'] == "POST"){												
					
						$st_name = $_POST['st_name'];
						$st_email = $_POST['st_email'];
						$st_dept = $_POST['st_dept'];
						$st_contact  = $_POST['st_contact'];
						$st_gender  = $_POST['st_gender'];
						$st_add  = $_POST['st_add'];
						if(empty($st_name) or empty($st_email) or empty($st_contact) or empty($st_dept) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>Field must not be empty.</p>";
						}else{
							$update = $user->updateprofile($st_id,$st_name,$st_email,$st_dept,$st_gender,$st_contact,$st_add,$fileName);
							if($update){
								echo "<h4 style='color:green;text-align:center'>Informations mises à jour avec succès</h4>";
							}else{
								echo "<h4 style='color:red;text-align:center;text-align:center'>Échec de mise à jour</h4>";
							}
						}
					}
				?>
			
			<div class="st_update fix">
				<form action="" method="post" enctype="multipart/form-data">
						<?php
						$result = $user->getuserbyid($st_id);
						while($row = $result->fetch_assoc()){
						?>
					<table class="tab_one" >
						<tr>
							<td style="width:250px;"></td>
							<td>Photo</td>
							<td>
							<img id="logo_preview" src="img/student/<?php echo $row['img']?>" style="height:150px; width:150px; border:1px green solid;"><br><br> 
							<input type="file" name="personal_image" id="spic" onchange="PreviewImage('personal_image', 'logo_preview')" />
							</td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Nom:</td>
							<td><input type="text" name="st_name" value="<?php echo $row['name'];?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Courier:</td>
							<td><input type="email" name="st_email" value="<?php echo $row['email']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Class:</td>
							<td><input type="text" name="st_dept" value="<?php echo $row['program']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Contact:</td>
							<td><input type="text" name="st_contact" value="<?php echo $row['contact']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Genre:</td>
							<td><input type="text" name="st_gender" value="<?php echo $row['gender']; ?>"></td>
						</tr>
						<tr>
							<td style="width:125px;"></td>
							<td>Adresse:</td>
							<td><input type="text" name="st_add" value="<?php echo $row['address']; ?>"></td>
						</tr>
						<tr>
						<td style="width:125px;"></td>
						<td></td>
						<td colspan="2">
							<input style="background:#3498db;color:#fff;width:168px;border-radius:5px;" type="submit" name="Update" value="Mise à jpur">
							</td>						
						</tr>
					</table>
						<?php } ?>
				</form>
			</div>
			<div class="back fix">
				<p style="text-align:center"><a href="heads_all_student.php"><button class="editbtn">Retour au profil des étudiants</button></a></p>
			</div>
</div>