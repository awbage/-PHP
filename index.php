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
        $this->nameProduct;
    }
}
    
class Cow extends Animal {

    function __construct() {
        parent::__construct($nameProduct='Milk', $name='Cow');
        $this->name = $name;
        $this->nameProduct = $nameProduct;
        
    }

    function Produce() {
        return rand(8, 12);
    }
}
class Chicken extends Animal {

    function __construct() {
        parent::__construct($nameProduct='Eggs', $name='Chicken');
        $this->name = $name;
        $this->nameProduct = $nameProduct;
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
        $animals_id[$animal->name] = $this->registrationNumber; 
        $Production[$animal->nameProduct] =  $animal->Produce(); 
        $this->prod[$animal->nameProduct]=$this->prod[$animal->nameProduct] + $Production[$animal->nameProduct];
        $this->registrationNumber += 1;
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
foreach ($farm->prod as $k=>$v){
    echo '<br>Total '.$k.': '.$v;
}

?>
