<?php

require_once(__DIR__.'/Ship.class.php');
require_once(__DIR__.'/ToastLauncher.class.php');

class DeathToaster extends Ship
{
	static private $_initPP = 10;
	static private $_initShield = 0;
	static $shape = array (
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

	function __construct($name)
	{
		$this->_name = $name;
		$this->_PV = 4;
		$this->_PP = 10;
		$this->_speed = 19;
		$this->_shield = 0;
		$this->_weapons = array(new ToastLauncher());
		$this->setPosition(array('x' => 5, 'y' => 5));
	}

	function active()
	{
		foreach ($this->_weapons as $key => $elem)
		{
			$this->_weapons[$key]->activeWeapon();
		}
		$this->_PP = self::$_initPP;
		$this->_shield = self::$_initShield;
	}
	function get_shape()
	{
		return self::$shape;
	}
}
?>