<?php

class Car {
	private $manufactor = 'unknown';
	public $model = '100'; // not good, cause values are inherited in every instance
	public $price = 1000;
	public $currency = 'EUR';
	public $carAge;
	public $pagaminodata = 2019;

	// functions in classes are called METHODS.
	public function setManufactorName($manufactorName)
	{
		$this->manufactor = $manufactorName;
	}

	public function getManufactorName()
	{
		return $this->manufactor;
	}

	public function valueAfterSomeYears()
	{
		for ($i = 1; $i <= $this->carAge; $i++ ) {
			$this->price = $this->price * 0.95;
		}
		$this->price = round($this->price);
		return $this;
	}

	public function carAge($manufactorYear)
	{
		$this->carAge = date('Y') - $manufactorYear;
		return $this;
	}
}

$car1 = new Car(); // object
$car2 = new Car(); // object

echo "\n";
//print_r($fiat->manufactor);
$car2->setManufactorName('NISSAN');
//echo $car2->manufactor; // cannot see cause it's private property
echo $car2->getManufactorName() . "\n\n\n";

echo $car2->carAge(1986)->valueAfterSomeYears()->price;

?>
