<?php
class Board
{
	private $_board;
	public static $toaster = array (
		array('_','_','_','_','_','_','_','_','_','_','_'),
		array('_','_','_','_','_','_','_','_','_','_','_'),
		array('_','_','_','_','_','_','_','_','_','_','_'),
		array('_','_','_','_','_','_','_','_','_','_','_'),
		array('_','_','_','_','_','X','_','_','_','_','_'),
		array('_','_','_','_','X','X','X','_','_','_','_'),
		array('_','_','_','_','_','X','_','_','_','_','_'),
		array('_','_','_','_','_','_','_','_','_','_','_'),
		array('_','_','_','_','_','_','_','_','_','_','_'),
		array('_','_','_','_','_','_','_','_','_','_','_'),
		array('_','_','_','_','_','_','_','_','_','_','_'),
		);
	public static $verbose = False;
	const PLACE=1;
	const CHOSE=1;

	function __construct()
	{
		$a = array();
		$this->_board = array();
		$a = array_pad ($a, 150, '@');
		$this->_board = array_pad($this->_board, 100, $a);
		$this->_board['0']['149'] = ' ';
	}
	function moveShip($origX, $origY, $destX, $destY)
	{
		$this->removeShip();
		$this->placeShip($x, $y, 5, 5);
	}
	function placeShip($boardX, $boardY, $shipX, $shipY)
	{
		echo $boardX . " " .$boardY . " " . $shipX . " " .$shipY . "<br />";
		$this->_board[$boardY][$boardX] = self::$toaster[$shipY][$shipX];
		if ($shipX > 0 && self::$toaster[$shipY][$shipX - 1] == 'X' && $this->_board[$boardY][$boardX - 1] != 'X')
			$this->placeShip($boardX - 1, $boardY, $shipX - 1, $shipY);

		if ($shipY > 0 && self::$toaster[$shipY - 1][$shipX] == 'X' && $this->_board[$boardY - 1][$boardX] != 'X')
			$this->placeShip($boardX, $boardY - 1, $shipX, $shipY - 1);

		if ($shipX < 10 && self::$toaster[$shipY + 1][$shipX] == 'X' && $this->_board[$boardY + 1][$boardX] != 'X')
			$this->placeShip($boardX, $boardY + 1, $shipX, $shipY + 1);

		if ($shipY < 10 && self::$toaster[$shipY][$shipX + 1] == 'X' && $this->_board[$boardY][$boardX + 1] != 'X')
			$this->placeShip($boardX + 1, $boardY, $shipX + 1, $shipY);
	}













	function printBoard($order)
	{
		echo "<table id=\"board\">";
		for ($i=0;$i<100;$i++)
		{
			echo "<tr>";
			for ($j=0;$j<150;$j++)
			{
				if ($order == PLACE)
					echo "<td>" . "<a href=\"index.php?height=" . $i . "&width=" . $j . "\">" . $this->_board[$i][$j] . "</a></td>";
				if ($order == CHOSE)
					echo "<td>" . $this->_board[$i][$j] "</td>";
			}
			echo "</tr>";
		}
	}
}
?>