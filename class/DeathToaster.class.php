<?

require_once('Ship.class.php');

class DeathToaster extends Ship
{
	function __construct($name)
	{
		$this->_name = $name;
		$this->_PV = 4;
		$this->_PP = 10;
		$this->speed = 19;
		$this->_shied = 0;
		$this->_weapons = array(ToastLauncher $SuperToaster);
	}
}
?>