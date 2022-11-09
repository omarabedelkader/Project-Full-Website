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
$pageTitle = "Inscription des étudiants";
include "../php/top_heads.php";
?>
	<div class="st_reg fix">
		<h2>Formulaire d'inscription des étudiants</h2>
		<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id   = $_POST['st_id'];
						$st_name = $_POST['st_name'];
						$st_pass = $_POST['st_pass'];
						$st_email = $_POST['st_email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						
						$st_dept  = $_POST['st_dept'];
						$st_contact  = $_POST['st_contact'];
						$st_gender  = $_POST['gender'];
						$st_add  = $_POST['st_add'];
						
						if(empty($st_id) or empty($st_name) or empty($st_pass ) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear) or empty($st_dept) or empty($st_contact) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Field must not be empty**</p>";
						}else{
							$st_pass = md5($st_pass);
							$st_register = $user->st_registration($st_id,$st_name,$st_pass,$st_email,$bday,$st_dept,$st_contact,$st_gender,$st_add);
							if($st_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Inscription complète !!";
							}else{
								echo "<p style='color:red;text-align:center'>Error.. Élève ID ou courier existe déjà</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Nom: </th>
					<td><input type="text" name="st_name" placeholder="Nom complet" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Élève ID: </th>
					<td><input type="text" name="st_id" placeholder="Élève ID" required /></td>
				</tr>
				<tr>
					<th>Mot De Passe: </th>
					<td><input type="password" name="st_pass" placeholder="Mot de passe" required /></td>
				</tr>
				<tr>
					<th>Courier: </th>
					<td><input type="email" name="st_email" placeholder="exemple@email.com" required /></td>
				</tr>
				<tr>
					<th>Date de Naissance: </th>
					<td>
						<fieldset>

						  <select class="select-style" name="BirthMonth">
						  <option  value="01">Jan</option>

						<option value="02">Fev</option>

						 <option value="03" >Mars</option>

						  <option value="04">Avril</option>

						  <option value="05">Mai</option>

						  <option value="06">Juin</option>

						  <option value="07">Julliet</option>

						 <option value="08">Aout</option>

						  <option value="09">Sep</option>

							<option value="10">Oct</option>

						 <option value="11">Nov</option>
						  <option value="12" >Dec</option>
						  </label>

						</select>   

						<label><input class="birthday" maxlength="2" name="BirthDay"  placeholder="Jour" required=""></label>

						<label><input class="birthyear" maxlength="4" name="BirthYear" placeholder="Année" required=""></label>

					  </fieldset>
					</td>
				</tr>
				<tr>
					<th>Programme:</th>
					<td><input type="text" name="st_dept" placeholder="Classe ex:EB3.." required /></td>
				</tr>
				<tr>
					<th>Contact:</th>
					<td><input type="text" name="st_contact" placeholder="00916000000" required /></td>
				</tr>
				<tr>
					<th>Genre:</th>
					<td><label><input type="radio" name="gender" value="Male" checked/> Male</label>
					<label><input type="radio" name="gender" value="Female"/> Femelle</label>
					<label><input type="radio" name="gender" value="Other"/> Autre</label>
						
					</td>
				</tr>
				<tr>
					<th>Adresse:</th>
					<td><input type="text" name="st_add" placeholder="Address" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="sub" value="S'inscrire" /></td>
				</tr>
			</table>
		</form>

	</div>


