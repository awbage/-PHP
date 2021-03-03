<?php


abstract class Animal {

    private $registrationNumber;
    public $nameProduct;
    public $name;
    
    function __construct($name, $nameProduct) {
        
        $this->nameProduct = $nameProduct;
        $this->name = $name;
    }

    abstract function Produce();

    public function setRegistrationNumber(int $registrationNumber){
        $this->registrationNumber = $registrationNumber;
    }

    public function getRegistrationNumber(){
        return $this->registrationNumber;
    }

    public function getNameProduct(){
        return $this->nameProduct;
    }
    public function getName(){
        return $this->name;
    }
}
    
class Cow extends Animal {

    function __construct() {
        parent::__construct($name='Cow', $nameProduct='Milk');
    }

    function Produce() {
        return rand(8, 12);
    }
}
class Chicken extends Animal {

    function __construct() {
        parent::__construct($name='Chicken', $nameProduct='Eggs');
    }

    function Produce() {
        return rand(0, 1);
    }
}

class Farm {

    private $registrationNumber = 1;
    
    private $animals = array();
    
    private $Production = array();

    private $prod = [];

    public function addAnimal(Animal $animal){

        $animal->setRegistrationNumber($this->registrationNumber); 

        $this->animals[] = $animal;

        $this->registrationNumber += 1;   
    }

    public function makeProduction(){

        foreach ($this->animals as $a){
            $this->Production[$a->getNameProduct()] += $a->Produce();
        }
    }

    public function countProd(){

        foreach ($this->Production as $k=>$v){
            echo '<br>Total '.$k.': '.$v;
        }
    }
}

$farm = new Farm();


for ($i=1; $i<=10; $i++) {
    $newanimal = new Cow();
    $farm->addAnimal($newanimal);
}
for ($i=1; $i<=20; $i++) {
    $newanimal = new Chicken();
    $farm->addAnimal($newanimal);
}

$farm->makeProduction();

$farm->countProd();
?>

