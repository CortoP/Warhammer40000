<?php
class Board
{
	public static $verbose = False;
	function __construct()
	{

	}

	function place_ship()
	{

	}
	function printBoard()
	{
		echo "<table id=\"board\">";
		for ($i=0;$i<150;$i++)
		{
			echo "<tr>";
			for ($j=0;$j<100;$j++)
			{
				echo "<td>" . "</td>";
			}
			echo "</tr>";
		}
	}
}
?>