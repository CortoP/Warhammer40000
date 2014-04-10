<?php
include('class/board.class.php');
session_start();
?>
<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="styles/table.css" type="text/css">
<link rel="stylesheet" href="styles/index.css" type="text/css">
</head>
<body>


	 <?php
	if (isset($_POST['destroy']))
	{
		session_destroy();
		header('Location: index.php');
	}
if (!isset($_SESSION['board']))
{
	$board = new Board();
	$_SESSION['board'] = $board;
}
else
{
	$board = $_SESSION['board'];
	 if (isset($_GET['width']) && isset($_GET['height']))
	 	 $board->moveShip($_GET['width'], $_GET['height']);
	$_SESSION['board'] = $board;
}
	 ?>



<div id="header">
	 <h1>WARHAMMER<h1>
</div>
<form action="index.php" method="POST">
<input type="hidden" name="destroy" value="1">
<input type="submit" value="Restart">
</form>
<div id="board">
	<?php
	$board->printBoard();
?>
</div>
</body>
</html>