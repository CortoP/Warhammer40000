<?php
class Board
{
	private $_board;

	public static $verbose = False;
	function __construct()
	{
		$a = array();
		$this->_board = array();
		$a = array_pad ($a, 150, '@');
		$this->_board = array_pad($this->_board, 100, $a);
		$this->_board['0']['149'] = 'Y';
	}

	function place_ship($width, $height)
	{
	echo 'OUIIIIIIIIIIIIIIIIII';
		$this->_board[$height][$width] = 'V';
	}
	function printBoard()
	{
		echo "<table id=\"board\">";
		for ($i=0;$i<100;$i++)
		{
			echo "<tr>";
			for ($j=0;$j<150;$j++)
			{
				echo "<td>" . "<a href=\"index.php?height=" . $i . "&width=" . $j . ">" . $this->_board[$i][$j] . "</a></td>";
			}
			echo "</tr>";
		}
	}
}
?>