<?php
	include_once('package.php');

	class DrF
	{
		private static $_coreClass = array (
			"Test" => "./test.php",
			"Test2" => "./test2.php"
		);

		public static function autoload ($className)
		{
			echo "$className<br />";
			
			$realClassName = explode('\\', $className);
			
			if (array_key_exists(end($realClassName), self::$_coreClass))
			{
		 		include_once(self::$_coreClass[end($realClassName)]);
				
			}
		}
	}
	
	define("KIKOU", "rominouninou");
	spl_autoload_register(array('DrF', 'autoload'));
	
	$test = new Test\Test();
	$package = Package\Package::getInstance();

	$package->action($test, "connect");
	echo "<br /><br />";
	$package->action($test, "connect2");
	echo "<br /><br />";
	
	$package->action($test, "connect3");

?>