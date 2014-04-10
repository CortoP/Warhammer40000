<?PHP
abstract class Ship
{
	protected $_name;
	protected $_PV;
	protected $_span;
	protected $_PP;
	protected $_speed;
	protected $_shield;
	protected $_weapons;
	protected $_position;
}

	function am_i_alive()
	{
		if ($this->_PV > 0)
			return True;
		else
			return False;
	}

	function sub_PV($damage)
	{
		$this->_PV -= $damage;
		return ($this->am_i_alive());
	}

	function getName()
	{
		return $this->_name;
	}

	function getPosition()
	{
		return $this->position;
	}

	function setPosition(array $coord)
	{
		$this->_position = array($coord['x'], $coord['y']);
	}
?>
