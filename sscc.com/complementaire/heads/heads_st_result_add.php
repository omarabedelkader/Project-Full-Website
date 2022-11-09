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
	}
?>	
<?php 
$pageTitle = "Ajouter Résultat De L'étudiant";
include "../php/top_heads.php";
?>
<div class="all_student fix">

		<?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$subject = $_POST['subject'];
				$semester = $_POST['semester'];
				$marks = $_POST['marks'];
				$res = $user->add_marks($stid,$subject,$semester,$marks);
				if($res){
					echo "<h3 style='color:green;margin:0;padding:0;text-align:center'>Marques insérées avec succès!</h3>";
				}else{
					echo  "<p style='color:red;text-align:center'>Échec de l'insertion des données</p>";
				}
			}
		
		?>
	<div>
	<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nom: ".$name."<br>Élève ID: " . $stid; ?></p>
	</div>	
	<div style="width:40%;margin:50px auto">
		
		<table class="tab_one" style="text-align:center;">
			<form action="" method="post">
				<table>
					<tr>
						<td>Sélectionner la matière </td>
						<td>
						<select name="subject" id="">
							<option value="DBMS">Database management</option>
							<option value="DBMS Lab">DBMS Lab</option>
							<option value="Mathematics">Mathematics</option>
							<option value="Programming">Programming</option>
							<option value="Programming Lab">Programming Lab</option>
							<option value="English">English</option>
							<option value="Physics">Physics</option>
							<option value="Chemistry">Chemistry</option>
							<option value="Psychology">Psychology</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>Sélectionner le trimestre: </td>
						<td>
						<select name="semester" id="">
							<option value="1st">1er trimestre</option>
							<option value="2nd">2ème trimestre</option>
							<option value="3rd">3ème trimestre</option>
						</select>
						</td>
					</tr>
					<tr>
						<td>Entrer la note: </td>
						<td><input type="text" name="marks" placeholder="Entrer la note" required /></td>
					</tr>
					<tr>
						<td><input type="submit" name="sub" value="Ajouter" /></td>
						<td><input type="reset" value="Réinitialiser" /></td>
					</tr>
				</table>
				
			</form>
		</table>
		
	</div>
		<div class="back fix">
				<p style="text-align:center"><a href="heads_st_result.php"><button class="editbtn">Retour à la liste</button></a></p>
			</div>
</div>
