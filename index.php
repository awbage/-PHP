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
    
    private $animals_id = array();
    
    public $Production = array();

    public $prod = [];

    public function addAnimal(Animal $animal) {

        $animal->setRegistrationNumber($this->registrationNumber); 

        $animals_id[$animal->getName()] = $animal->getRegistrationNumber(); 

        $Production[$animal->getNameProduct()] =  $animal->Produce(); 

        $this->prod[$animal->getNameProduct()]=$this->prod[$animal->getNameProduct()] + $Production[$animal->getNameProduct()];

        $this->registrationNumber += 1;
    }
    function countProd(){
        foreach ($this->prod as $k=>$v){
            echo '<br>Total '.$k.': '.$v;
    }
    }
}

$farm = new Farm;


for ($i=1; $i<=10; $i++) {
    $newanimal = new Cow;
    $farm->addAnimal($newanimal);
}
for ($i=1; $i<=20; $i++) {
    $newanimal = new Chicken;
    $farm->addAnimal($newanimal);
}
$farm->countProd();

?>
