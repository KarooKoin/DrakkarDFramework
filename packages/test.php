<?php

	namespace Test;

	class Test extends Test2
	{
		private $nom = "grelet";
		public $prenom = "romain";
		public $ville = "Bondy";
		protected $age = "16";
		public static $_coco = "Babaorum";

		protected static $package = array (
			"connect" => array ("test1", "test2", "test1(%lol)"),
			"connect2" => array ("test1(%test.prenom)", "connect", "test1(%test.age)"),
			"connect3" => array ("test1(%Test\Test::%_coco)", "test1(cocorico)", "test1(!KIKOU)")
			);
		//doit se trouver dans la classe mère (base)
		public function getPackage ()
		{
			//trouver comment s'assurer que c'est la bonne classe qui l'appelle
			return self::$package;
		}

		public function test1 ($optionel = null)
		{
			if ($optionel != null)
				$this->nom = $optionel;

			echo $this->nom;
		}

		public function test2 ()
		{
			echo " ".$this->prenom;
		}

		public function test3 ()
		{
			echo "<br />".$this->ville;
		}

		public function test4 ()
		{
			echo "<br />".$this->age;
		}

		public function connect ()
		{
			echo " c'est l'age trop ";
		}

		public function lolilol ()
		{
			echo "trop lolilol";
		}

		public function getAge ()
		{
			return $this->age;
		}
	}

	/*$test = "test(cocololilkc, eotjefo)";
	$change;
	$change = substr($test, strpos($test, "(") + 1);
	echo $change."<br />";
	$change = substr($change, 0, strrpos($change, ")"));
	echo $change;
	$change = explode(",", $change);
	
	foreach ($change as &$value)
	{
		if(strpos($value, " ") === 0)
			$value = substr($value, 1);
		if (strrpos($value, " ") === 0)
			$value = substr($value, 0, strlen($value) - 2);
	}

	var_dump($change);*/
	
	
?>