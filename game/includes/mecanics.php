<?php
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
?>