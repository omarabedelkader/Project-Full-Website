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
<h3 style="color:red ">N.B: L'OUBLIAGE DE VOTRE MOT DE PASSE, VOTRE COMPTE SERA DESACTIVEE, POUR QUE L'ADIMINTRATEUR DU SITE, FAIRE UNE REINSTALISATION DE VOTRE MOT DE PASSE, VEUILLEZ DE COMPLETEZ LE FORMULAIRE SUIVANT. <br/>
Des privilèges de sécurité  seront appliqués, UNE FAUTE PEUT EXCULSE DU SITE </h3>
<h2 style="margin-left: 670px;">Collège des Soeurs des Saints-Coeurs Andket: Département Préscolaire</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="../img/1.JPG" alt="Avatar" class="avatar" style="width: 500px;">
  </div>

  <div class="container">
    <label for="uname"><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur " name="st_id" required>

    <label for="psw"><b>Ancien Mot de Passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" name="st_pass" required>
    
    <label for="psw"><b>Commentaire</b></label>
    <input type="text" placeholder="Entrer votre Commentaire" placeholder="" name="st_pass" required>
    <button type="submit">Soumettre</button>
  </div>
<h3 style="color:red ">N.B: APRES APPUIEZ SUR LE BUTTON SOUMETTRE VORE COMPTRE DESACTIVEE, C.A.D VOUS NE POUVEZ PAS UN ACCES SURE VOTRE COMPTE. <br/></h3>
  <div class="container" style="background-color:#f1f1f1">
    <span class="cancelbtn"> <a href="st_login.php">Annuler</a></span>
  </div>
</form>
</body>
</html>
