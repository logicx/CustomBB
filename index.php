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
						
					$get_forums = mysql_query("SELECT * FROM forums") or die(mysql_error());
						
					if(mysql_num_rows($get_forums) == 0) {
					?>
					No forum data to display.
					<?php
					} else {
					?>
					<table cellspacing="0px" cellpadding="10px">
						<tr class="top_head">
							<td class="border-bottom bold">Forum name</td>
							<td class="border-bottom bold">Threads</td>
							<td class="border-bottom bold">Replies</td>
							<td class="border-bottom bold">Last post</td>
						</tr>
						
						<?php
						
						while($row = mysql_fetch_array($get_forums)) {
							$fid = $row['fid'];
							$name = $row['title'];
							$threads = $row['threads'];
							$replies = $row['replies'];
							
							print("<tr>
										<td class='border-bottom'><a href='viewforum.php?fid=$fid'>$name</a></td>
										<td class='border-bottom'>$threads</td>
										<td class='border-bottom'>$replies</td>
										<td class='border-bottom'>No one</td>
									</tr>");
						}
						?>
						
					</table>
					<?php
					}
					?>
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