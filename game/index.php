<?php
include('class/board.class.php');
include('class/DeathToaster.class.php');
include('class/player.class.php');
session_start();
?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="styles/table.css" type="text/css">
<link rel="stylesheet" href="styles/index.css" type="text/css">
<link rel="stylesheet" href="styles/header.css" type="text/css">
</head>
<body>


<?php
	if (isset($_POST['destroy']))
	{
		session_destroy();
		header('Location: index.php');
	}
if (!isset($_SESSION['board']))
	include('includes/create_game.php');
else
	include('includes/mecanics.php');

include('includes/header.php');
include('includes/board.php');

?>




</body>
</html>