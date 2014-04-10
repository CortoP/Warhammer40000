<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="styles/table.css" type="text/css">
<link rel="stylesheet" href="styles/index.css" type="text/css">
</head>
<body>
	 <?php
	 session_start();
	 require_once('class/board.class.php');
	 $board = new Board();
	 if (isset($_GET['width']) && isset($_GET['height']))
	 	 $board->place_ship($_GET['width'], $_GET['height']);
	 ?>
<div id="header">
	 <h1>WARHAMMER<h1>
</div>
<div id="board">
<?php
	$board->printBoard();



?>
</div>
</body>
</html>