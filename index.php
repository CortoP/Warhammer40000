<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" href="styles/table.css" type="text/css">
<link rel="stylesheet" href="styles/index.css" type="text/css">
</head>
<body>
	 <?php
	 require_once('class/board.class.php');
$board = new Board();
?>
<div id="header">
	 <h1>WARHAMMER<h1>
<>
<div id="board">
	$board->printBoard();
<div id="select">
</div>
</body>
</html>