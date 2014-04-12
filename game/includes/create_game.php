<?php
	$player1 = new Player(array('name'=>'Jon Doe'));
	$board = new Board(array('player1' => $player1));
	$toaster = new DeathToaster('killer');
	$_SESSION['board'] = $board;
	$_SESSION['toaster'] = $toaster;
	$_SESSION['player1'] = $player1;
?>