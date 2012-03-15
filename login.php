<?php
session_start();
include("config/init.php");
?>
<html>
	<head>
		<title>CustomBB</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	
	
	<body>
		
		<div id="wrapper">
			<div id="header">
					<?php
						
					if(!isset($_SESSION['username']) or !isset($_SESSION['id']) 
						or !realLogin($_SESSION['username'], $_SESSION['id'])) {
						?>
						<div id="header-right-unlogged">
							<a href="register.php"><div id="button">Register</div></a>
							<a href="login.php"><div id="button">Login</div></a>
						</div>
						<?php
						} else {
						?>
						<div id="header-right-logged">
							<div id="user_box">
								<div id="user_box_nav">
									<b>Welcome back, <?php print(ucfirst($_SESSION['username']));?>.</br></b>
										
										<div id="user_box_padding">
											<div class="left">
												<div id="button">User panel</div>
											</div>
											
											<div class="right">
												<a href="scripts/logout.php"><div id="button">logout</div></a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php
						}
						?>
					
					<div id="logo"><img src="images/logo.png"/></div>
					
			</div>
			
			<div id="navigation">
				<div id="padding_nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="members.php">Memberlist</a></li>
					<li>Newest posts</li>
				</div>
			</div>
			
			<div id="body">
				<div id="padding">
					<?php
					if(isset($_SESSION['msg'])) {
					print($_SESSION['msg']);
					unset($_SESSION['msg']);
					}
					?>
					<form method="post" action="scripts/login.php">
						Username: </br><input type="text" name="username"/></br>
						Password: </br><input type="text" name="password"/></br>
	
						<input type="submit" name="submit" value="Login"/>
					</form>
				</div>
			</div>
			
			<div id="footer">
				<div id="padding">
					Created by Logicx.
					<div class="right">Copyright © 2012, CustomBB. All rights reserved.</div>
				</div>
			</div>
		</div>
		

		
	</body>
</html>