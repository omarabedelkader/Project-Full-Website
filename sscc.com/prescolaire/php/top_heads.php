<?php
	require_once "../php/functions.php";
	$user = new login_registration_class();
?>
<!Doctype html>
<html class="no-js" lang="">
    <head>
    	<meta http-equiv="x-ua-compatible" content="ie=edge">
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
					<h2>SSCC Andket: Département Préscolaire</h2>
					</div>
					</div></a>
				</div>
				<div class="menu ">
					<div class="dateshow fix"><p><?php echo "Date : ".date("d M Y"); ?></p></div>
					<ul>
						<?php if($user->get_admin_session()){ ?>
						<li><a href="heads_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Se déconnecter</a></li>
						<li><a href="heads_prof.php"><i class="fa fa-user" aria-hidden="true"></i>
						<?php echo $admin_name; ?>
						</a></li>
						
						<?php } ?>
					</ul>

				</div>
			</div>
		</header>
