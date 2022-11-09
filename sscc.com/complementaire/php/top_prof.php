<?php
	require_once "../php/functions.php";
	$user = new login_registration_class();
?>
<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <header class="container header_area" >
			<div id="sticker">
				<div class="head">
					<a href="../home.php">	
					<div class="uniname fix">
					<h2>SSCC Andket: Département Complémentaire</h2>
					</div>
					</div></a>
				</div>
				<div class="menu ">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
					<ul>
						<?php if($user->get_faculty_session()){ ?>
						<li><a href="prof_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></li>
						<li><a href="att_take_prof.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Présence</a></li>
						<li><a href="prof_st_result.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Résultat</a></li>
						<li><a href="prof_profile.php"><i class="fa fa-user" aria-hidden="true"></i>
						<?php echo $fname; ?>
						</a></li>
						
						<?php } ?>
					</ul>

				</div>
			</div>
		</header>
