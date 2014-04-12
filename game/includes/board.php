<div id="board">

	<?php
	if (isset($_GET['phase']) && $_GET['phase'] == 'chose')
	{
		echo	'<h2>SELECT A SHIP</h2>';
		$board->printBoard(Board::CHOSE, array('token'=> $player1->getBoardToken()));
	}
	else if (isset($_GET['phase']) && $_GET['phase']  == 'place')
	{
		echo	'<h2>MOVE YOUR SHIP</h2>';
		$board->printBoard(Board::PLACE, array());
	}
	?>
</div>
