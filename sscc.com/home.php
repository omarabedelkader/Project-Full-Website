<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
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

<h2 style="margin-left: 670px;">Collège des Soeurs des Saints-Coeurs Andket</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="prescolaire/img/1.JPG" alt="Avatar" class="avatar" style="width: 500px;">
  </div>

  <div class="container">
  	<br/> 
    <label for="uname"><b>Nom d'utilisateur</b></label>
    <br/> 
	<br/>
    <input type="text" placeholder="Entrer Votre Nom " name="uname" required>
    <br/> 
	<br/>
	<label for="psw"><b>Département</b></label>
	<br/> 
	<br/>
          <a href="prescolaire/identification_prescolaire.php">Préscolaire</a><br/><br/>
          <a href="primaire/identification_primaire.php">Primaire</a><br/><br/>
          <a href="complementaire/identification_complementaire.php">Complémentaire</a><br/><br/>
          <a href="secondaire/identification_secondaire.php">Secondaire</a><br/><br/>
  
    <p style="color:red ">L'ouvrage d'une autre page sera automatiquement</p>
  </div>
</form>
<a href="index.php"><button>Mode Invité</button></a>
</body>
</html>