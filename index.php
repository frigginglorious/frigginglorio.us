<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge; chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="HandheldFriendly" content="True" />
	<link rel="shortcut icon" href="favicon.ico" />
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="css/fa/css/font-awesome.min.css">


	<script type="text/javascript" src="jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>

	<?php include "analytics.php" ?>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>

	<div id="wrapper">
	<?php include 'topNav.php'; ?>

		<div class="row" style="margin:0px;">
			<div id="outBar" class="col-sm-3 blog-sidebar hidden-xs" style="padding:0px;">
				<div id="sideBar">
					<table class="table-striped">
						<tr>
							<th>
								Recent Content
							</th>
						</tr>
						<?php
							ini_set('display_startup_errors',1);
							ini_set('display_errors',1);
							error_reporting(-1);

							include 'sideNav.php';


						?>

					</table>
				</div>
			</div>

			<div class="col-sm-9 blog-main">
				<?php include 'pullContent.php'; ?>
			</div>
		</div>

		<footer>
			&nbsp;
		</footer>
		</div>


</body>
</html>
