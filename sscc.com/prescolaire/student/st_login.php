<title>Connexion Etudiant</title>
<?php
session_start();
require "../php/config.php";
require_once "../php/functions.php";
$user = new login_registration_class();
if($user->getsession()){
	header('Location: st_profile.php');
	exit();
}
?>
<?php
		if($_SERVER['REQUEST_METHOD'] == "POST"){
						$st_id	  = $_POST['st_id'];
						$st_pass = $_POST['st_pass'];

						if(empty($st_id) or empty($st_pass)){
							echo "<p style='color:red;text-align:center;'>Le champ ne doit pas être vide.</p>";
						}else{
							$st_pass = md5($st_pass);
							$login = $user->st_userlogin($st_id, $st_pass);
							if($login){
								header('Location: st_profile.php');
							}else{
								echo "<p style='color:red;text-align:center'>identifiant ou mot de passe incorrect</p>";
							}
						}
					}
				?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #0C084F;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<a href="../identification_prescolaire.php"><h2 style="margin-left: 670px;">Collège des Soeurs des Saints-Coeurs Andket : Département Préscolaire : Connexion Etudiant</h2></a>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="../img/1.JPG" alt="Avatar" class="avatar" style="width: 500px;">
  </div>

  <div class="container">
    <label for="uname"><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur " name="st_id" required>

    <label for="psw"><b>Mot de Passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="st_pass" required>
    <button type="submit">S'identifier</button>
    <button type="submit">Mode Invité</button>
    <label>
      <input type="checkbox" checked="checked" name="remember">souviens-toi de moi
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">

    <span class="cancelbtn"> <a href="../identification_prescolaire.php">Annuler</a></span>
    <span class="psw"> <a href="st_oublier_mot_de_passe.php">Oublié le mot de passe</a></span>
  </div>
</form>
</body>
</html>
