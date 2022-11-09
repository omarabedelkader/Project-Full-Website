a<?php
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
	if(isset($_REQUEST['vr'])){
		$stid = $_REQUEST['vr'];
		$name = $_REQUEST['vn'];
	}
?>	
<?php 
$pageTitle = "Voir Les Résultat De L'étudiant";
include "../php/top_heads.php";
?>
<div class="all_student fix">

		<?php
		
		//custom function check credit hour and grade point
		function credit_hour($x){
			if($x=="DBMS") return 3;
			elseif($x == "DBMS Lab") return 1;
			elseif($x == "Mathematics") return 4;
			elseif($x == "Programming") return 3;
			elseif($x == "Programming Lab") return 1;
			elseif($x == "English") return 4;
			elseif($x == "Physics") return 3;
			elseif($x == "Chemistry") return 3;
			elseif($x == "Psychology") return 3;
		}
		function grade_point($gd){
			if($gd<60) return 0;
			elseif($gd>=60 && $gd<70) return 1;
			elseif($gd>=70 && $gd<80) return 2;
			elseif($gd>=80 && $gd<90) return 3;
			elseif($gd>=90 && $gd<=100) return 4;
		}
		?>
		<div>
	<p style="text-align:center;color:#fff;background:purple;margin:0;padding:8px;"><?php echo "Nom: ".$name."<br>Élève ID: " . $stid; ?></p>
	</div>	
	<div>
	<p style="float:left;margin:0 0 5px 0;width:100%;text-align:center;"><a href="heads_st_result_view_cgpa.php?vr=<?php echo $stid; ?>&vn=<?php echo $name; ?>"><button class="editbtn">Voir CGPA et Cours terminé</button></a></p>
	</div>
	
	<form action="" method="post" style="width:23%;margin:0 auto;padding-bottom:5px;">
		<select name="seme" id="">
			<option value="1st">1er trimestre</option>
			<option value="2nd">2ème trimestre</option>
			<option value="3rd">3ème trimestre</option>
		</select>
		<input type="submit" value="Voir résultat" />

	</form>
	<?php
	//select semester
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$semester = $_POST['seme'];
			
			$i=0;
			$ch = 0;
			$gp = 0;
				
			
				//$get_result = $user->show_marks();
				
				$get_result = $user->show_marks($stid,$semester);
				if($get_result){
			?>
				<p><?php echo "<p style='text-align:center;background:#ddd;color:#01C3AA;padding:5px;width:84%;margin:0 auto'>".$semester." Trimestre Résultat"?></p>
				<table class="tab_two" style="text-align:center;width:85%;margin:0 auto">
					<th>Matière</th>
					<th>Marque</th>
					<th>Note</th>
					<th>Credit hr.</th>
					<th>Statut</th>
		<?php		
				while($rows = $get_result->fetch_assoc()){
				$i++;
				//count total credit hour;	
				$ch = $ch + credit_hour($rows['sub']);

		?>
			<tr>
				<td><?php echo $rows['sub'];?></td>
				<td><?php echo $rows['marks'];?></td>
				<td>
				<?php 
				//set grade for individual subject
					$mark = $rows['marks'];
					if($mark<60){echo "F";}
					elseif($mark>=60 && $mark<70){echo "D";}
					elseif($mark>=70 && $mark<80){echo "C";}
					elseif($mark>=80 && $mark<90){echo "B";}
					elseif($mark>=90 && $mark<=100){echo "A";}
					
					//total grade point
					$gp = $gp + (credit_hour($rows['sub']) * grade_point($rows['marks']));
					
				?>
				</td>
				<td><?php echo credit_hour($rows['sub']); ?></td>
				<td>
				<?php
					$stat = $rows['marks'];
					if($stat<60){
						echo "<span style='background:red;padding:3px 11px;color:#fff;'>Échouer</span>";
					}elseif($stat>=60 && $stat<70){
						echo "<span style='background:yellow'>Reprendre</span>";
					}else{
						echo "<span style='background:green;padding:3px 6px;color:#fff;'>Succès</span>";
					}
				?>
				</td>
				
				
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2">SGPA : </td>
				<td colspan="2">
				<?php
				$sg = $gp/$ch;
				echo "<span style='color:green;padding:3px 6px;font-size:20px'>" . round($sg,2) . "</span>"; ?>
				</td>
				<td>
					<?php
						if($sg>=3.5){
							echo "<span style='background:purple;padding:3px 6px;color:#fff;'>Excellent";
						}elseif($sg>=3.0 && $sg<3.5){
							echo "<span style='background:green;padding:3px 6px;color:#fff;'>Bon";
						}elseif($sg>=2.5 && $sg<3.0){
							echo "<span style='background:gray;padding:3px 6px;color:#fff;'>Moyenne";
						}else{
							echo "<span style='background:red;padding:3px 6px;color:#fff;'>Probation";
						}
					?>
				</td>
			</tr>
		</table>
		
		<?php 
			}
			else{
				echo  "<p style='color:red;text-align:center'>Rien n'a été trouvé</p>";
				}
		?>
			<p style="float:left; text-align:right;margin:20px 0;width:49%"><a href="heads_st_result_update.php?ar=<?php echo $stid?>&seme=<?php echo $semester?>&vn=<?php echo $name?>"><button class="editbtn">Modifier le résultat</button></a></p>
		<?php 
				}
		?>
		
			<p style="float:right;text-align:left;margin:20px 0;width:49%"><a href="heads_st_result.php"><button class="editbtn">Retour à la liste</button></a></p>

</div>