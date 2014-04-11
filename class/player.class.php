<?php
class Player
{
	private $_name;
	private $_army;
	private $_currentShip = 0;
	private $boardToken;

	function __construct(array $kwarg)
	{
		$this->_name = $kwarg['name'];
		$this->_army['ship1'] = new DeathToaster('Picsou');
		$this->_army['ship2'] = new DeathToaster('Riri');
		$this->_army['ship3'] = new DeathToaster('Fifi');
		$this->_army['ship4'] = new DeathToaster('Loulou');
	}
	function getPlayerName()
	{
		return ($this->_name);
	}
	function getArmy()
	{
		return ($this->_army);
	}
	function selectShip($x, $y)
	{
		foreach($this->_army as $ship)
		{
			$position = $ship->getPosition();
			if ($position['x'] == $x && $position['y'] == $y)
				return ($ship);
		}
		return (NULL);
	}
	function setBoardToken($token)
	{
		$this->boardToken = $token;
	}
	function getBoardToken()
	{
		return $this->boardToken;
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