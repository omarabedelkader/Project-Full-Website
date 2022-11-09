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
$pageTitle = " Inscription des professeurs";
include "../php/top_heads.php";
?>
	<div class="st_reg fix">
		<h2 style="color:#ddd;background:#3498db">Inscription des Professeures</h2>
		<p class="msg">
				<?php
					if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_name = $_POST['st_name'];
						$uname = $_POST['uname'];
						$st_pass = $_POST['st_pass'];
						$st_email = $_POST['st_email'];
						
						$BirthMonth = $_POST['BirthMonth'];
						$BirthDay	 = $_POST['BirthDay'];
						$BirthYear	 = $_POST['BirthYear'];
						$bday = "{$BirthYear}-{$BirthMonth}-{$BirthDay}";
						$st_gender  = $_POST['gender'];
						
						$degree = $_POST['degree'];
						$subject = $_POST['subject'];
						$inst = $_POST['inst'];
						$edu = "{$degree} in {$subject} from {$inst}";
						$st_contact  = $_POST['st_contact'];
						$st_add  = $_POST['st_add'];
						
						if(empty($st_name) or empty($uname) or empty($st_pass ) or empty($st_email) or empty($BirthMonth) or empty($BirthDay) or empty($BirthYear)or empty($degree) or empty($subject) or empty($inst) or empty($st_contact) or empty($st_gender) or empty($st_add)){
							echo "<p style='color:red;text-align:center'>**Le champ ne doit pas être vide**</p>";
						}else{
							$st_pass = md5($st_pass);
							$fct_register = $user->fct_registration($st_name,$uname,$st_pass,$st_email,$bday,$st_gender,$edu,$st_contact,$st_add);
							if($fct_register){
								echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Inscription complète !!";
							}else{
								echo "<p style='color:red;text-align:center'>Erreur..le nom d'utilisateur existe déjà</p>";
							}
						}
					}
				?>
			
			</p>
		<form action="" method="post" id="st_form">
			<table>
				<tr>
					<th>Nom: </th>
					<td><input type="text" name="st_name" placeholder="Nom" required /></td>
				</tr>
				<tr>
				<tr>
					<th>Nom d'utilisateur: </th>
					<td><input type="text" name="uname" placeholder="Nom d'utilisateur" required /></td>
				</tr>
				<tr>
					<th>Mot De Passe: </th>
					<td><input type="password" name="st_pass" placeholder="Mot De Passe" required /></td>
				</tr>
				<tr>
					<th>Courier: </th>
					<td><input type="email" name="st_email" placeholder="example@email.com" required /></td>
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

						  <option value="07">Jul</option>

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
					<th>Genre:</th>
					<td><label><input type="radio" name="gender" value="Male" checked/> Mal</label>
					<label><input type="radio" name="gender" value="Female"/> Femelle</label>
					</td>
				</tr>
				<tr>
				<th>Education: </th>
					<td>
						<fieldset>
						  <select class="select-style" name="degree">
							<option value="BSc">BSc</option>
							 <option value="MSc">MSc</option>
							  <option value="Phd" >Phd</option>
						  </select>   
							<label><input class="birthyear" name="subject" placeholder="Sujet" required=""></label>
							<label><input class="birthyear" name="inst" placeholder="Université" required=""></label>

						</fieldset>
					</td>
				</tr>
				<tr>
					<th>Contact:</th>
					<td><input type="text" name="st_contact" placeholder="Phone" required /></td>
				</tr>
				<tr>
					<th>Adresse:</th>
					<td><input type="text" name="st_add" placeholder="Addresse" required /></td>
				</tr>
				<tr>
					<td colspan="2"><input style="color:#ddd;background:#3498db" type="submit" name="sub" value="Inscription" /></td>
				</tr>
			</table>
		</form>

	</div>


