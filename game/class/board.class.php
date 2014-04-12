<?php
require_once(__DIR__.'/Ship.class.php');

class Board
{
	private $_board;
	public static $verbose = False;
	const PLACE = '1';
	const CHOSE = '2';
	const PLAYER1 = 'W';
	const PLAYER2 = 'X';
	const PLAYER3 = 'Y';
	const PLAYER4 = 'Z';

	function __construct(array $kwarg)
	{
		$this->_board = array_pad(array(), 100, array_pad (array(), 150, ''));
		$this->setPlayer($kwarg['player1'], self::PLAYER1);
		if (isset($kwarg['player2']))
			$this->setPlayer($kwarg['player2'], self::PLAYER2);
		if (isset($kwarg['player2']))
			$this->setPlayer($kwarg['player2'], self::PLAYER2);
		if (isset($kwarg['player3']))
			$this->setPlayer($kwarg['player3'], self::PLAYER3);
		if (isset($kwarg['player4']))
			$this->setPlayer($kwarg['player4'], self::PLAYER4);
	}

	function setPlayer($player, $token)
	{
		$player->setBoardToken($token);
		$army = $player->getArmy();
		$p = 0;
		$turn = 0;
		foreach($army as $ship)
		{
			switch (true)
			{
			case ($ship instanceof DeathToaster) :
				if ($turn % 2 != 0)
				{
				$this->placeShip($ship->get_shape(), 5 + $p, 10 + $p, 5, 5);
				$ship->setPosition(array('x' => 5 + $p, 'y' => 10 + $p));
				}
				else
				{
				$this->placeShip($ship->get_shape(), 10 + $p, 5 + $p, 5, 5);
				$ship->setPosition(array('x' => 10 + $p, 'y' => 5 + $p));
				}
				break;
			}
			if ($turn % 2 != 0)
				$p += 7;
			$turn++;
		}
	}

	function moveShip($ship, $destX, $destY)
	{
		if ($ship instanceof Ship)
		{
			$shape = $ship->get_shape();
			$position = $ship->getPosition();
			$this->removeShip($shape, $position['x'], $position['y'], 5, 5);
			$this->placeShip($shape, $destX, $destY, 5, 5);
			$ship->setPosition(array('x' => $destX, 'y' => $destY));
		}
	}

	function removeShip(array $shape, $boardX, $boardY, $shapeX, $shapeY)
	{

		if($this->_board[$boardY][$boardX] == 'X')
			$this->_board[$boardY][$boardX] = '';
		if ($shapeX > 0 && $shape[$shapeY][$shapeX - 1] == 'X' && $this->_board[$boardY][$boardX - 1] == 'X')
		{
			$this->removeShip($shape, $boardX - 1, $boardY, $shapeX - 1, $shapeY);
		}
		if ($shapeY > 0 && $shape[$shapeY - 1][$shapeX] == 'X' && $this->_board[$boardY - 1][$boardX] == 'X')
			$this->removeShip($shape, $boardX, $boardY - 1, $shapeX, $shapeY - 1);

		if ($shapeX < 10 && $shape[$shapeY + 1][$shapeX] == 'X' && $this->_board[$boardY + 1][$boardX] == 'X')
			$this->removeShip($shape, $boardX, $boardY + 1, $shapeX, $shapeY + 1);

		if ($shapeY < 10 && $shape[$shapeY][$shapeX + 1] == 'X' && $this->_board[$boardY][$boardX + 1] == 'X')
			$this->removeShip($shape, $boardX + 1, $boardY, $shapeX + 1, $shapeY);

	}

	function placeShip(array $shape, $boardX, $boardY, $shipX, $shipY)
	{
		$this->_board[$boardY][$boardX] = $shape[$shipY][$shipX];
		if ($shipX > 0 && $shape[$shipY][$shipX - 1] == 'X' && $this->_board[$boardY][$boardX - 1] != 'X')
			$this->placeShip($shape, $boardX - 1, $boardY, $shipX - 1, $shipY);

		if ($shipY > 0 && $shape[$shipY - 1][$shipX] == 'X' && $this->_board[$boardY - 1][$boardX] != 'X')
			$this->placeShip($shape, $boardX, $boardY - 1, $shipX, $shipY - 1);

		if ($shipX < 10 && $shape[$shipY + 1][$shipX] == 'X' && $this->_board[$boardY + 1][$boardX] != 'X')
			$this->placeShip($shape, $boardX, $boardY + 1, $shipX, $shipY + 1);

		if ($shipY < 10 && $shape[$shipY][$shipX + 1] == 'X' && $this->_board[$boardY][$boardX + 1] != 'X')
			$this->placeShip($shape, $boardX + 1, $boardY, $shipX + 1, $shipY);
	}

	function printBoard($phase, array $token)
	{
		echo "<table id=\"board\">";
		for ($i = 0 ; $i < 100 ; $i++)
		{
			echo "<tr>";
			for ($j = 0 ; $j < 150 ; $j++)
			{

				if ($phase == self::PLACE)
					echo "<td>" . "<a href=\"index.php?order=place&phase=chose&height=" . $i . "&width=" . $j . "\">" . $this->_board[$i][$j] . "</a></td>";


				if ($phase == self::CHOSE)
				{
					echo "<td>";
					if	($this->_board[$i][$j] == 'X')
					{
						echo "<a href=\"index.php?order=chose&phase=place&height=" . $i . "&width=" . $j . "\">" . $this->_board[$i][$j] . "</a>";
					}
					else
					{
						echo "<a href=\"\">" .  $this->_board[$i][$j] . "</a>";
					}
				echo "</td>";
				}


			}


			echo "</tr>";
		}
	}
}
?>