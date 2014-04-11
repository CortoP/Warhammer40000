<?PHP

require_once('Weapon.class.php');

class ToastLauncher extends Weapon
{
	static protected $_initLoads = 0;

	function __construct()
	{
		$this->setLoads(self::$_initLoads);
		$this->setSmallScope(1);
		$this->setMediumScope(11);
		$this->setLargeScope(21);
		$this->_actionField = 10;
	}

	function activeWeapon()
	{
		$this->setLoads(self::$_initLoads);
	}
}

?>