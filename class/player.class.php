<?php
class Player
{
	private $name;
	private $army;

	function __construct($kwarg)
	{
		$name = $kwarg['name'];
		$army = array (
			"toaster" => "ToasterShip"
			);
	}
	function getPlayerName()
	{
		return ($army);
	}
	function getArmy()
	{
		return ($army);
	}
	function selectShip()
	{
		
	}
	function order()
	{

	}
	function move()
	{

	}
	function shoot()
	{
		
	}
}
?>