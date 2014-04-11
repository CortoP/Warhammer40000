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
	$player1 = new Player(array('name'=>'Jon Doe'));
	$board = new Board(array('player1' => $player1));
	$toaster = new DeathToaster('killer');
	$_SESSION['board'] = $board;
	$_SESSION['toaster'] = $toaster;
	$_SESSION['player1'] = $player1;
}
else
{

	$board = $_SESSION['board'];
	$toaster = $_SESSION['toaster'];
	$player1 = $_SESSION['player1'];
	if (isset($_GET['order']))
	{
		if ($_GET['order'] == 'chose')
		{
			if (isset($_GET['width']) && isset($_GET['height']))
			{
				$_SESSION['currentShip'] = $player1->selectShip($_GET['width'], $_GET['height']);
				if ($_SESSION['currentShip'] == NULL)
				{
					echo "AIM FOR THE CENTER OF YOUR SHIP SOLDIER !" . "<br />";
					$_GET['phase'] = 'chose';
				}
			}
		}
		if ($_GET['order'] == 'place')
		{
			if (isset($_GET['width']) && isset($_GET['height']))
			{
				$board->moveShip($_SESSION['currentShip'] ,$_GET['width'], $_GET['height']);
			}
		}
	}
	$_SESSION['board'] = $board;
	$_SESSION['player1'] = $player1;
}
	 ?>

<!--HEADER-->
<div id="header">
	 <h1>WARHAMMER<h1>
</div>

<!--RESTART-->
<form action="index.php" method="POST">
<input type="hidden" name="destroy" value="1">
<input type="submit" value="Restart">
</form>
<!--START-->
<a href="index.php?phase=chose">START THE GAME</a>
</form>

<!--PLAYER MENU-->

<!--BOARD-->
<div id="board">

	<?php
	if (isset($_GET['phase']) && $_GET['phase'] == 'chose')
	{
	?>

	<h2>SELECT A SHIP</h2>

<?php
		$board->printBoard(Board::CHOSE, array('token'=> $player1->getBoardToken()));
	}
	else if (isset($_GET['phase']) && $_GET['phase']  == 'place')
	{
?>

	<h2>MOVE YOUR SHIP</h2>

<?php
			$board->printBoard(Board::PLACE, array());
	}
?>

</div>
</body>
</html>