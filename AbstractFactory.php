<?php

abstract class Engine {
    public $type;
    public $horsePower;
    
    public function setType($type){
        $this->type = $type;
    }
    
    public function setHoursePower($horsePower){
        $this->horsePower = $horsePower;
    }
    
    abstract function create();
    abstract function getType();
    abstract function getHorsePower();
}
abstract class Wheels {
    public $size;
    public $material;
    
    public function setSize($size){
        $this->size = $size;
    }
    
    public function setMaterial($material){
        $this->material = $material;
    }
    
    abstract function create();
    abstract function getSize();
    abstract function getMaterial();
}
abstract class Roof {
    public $type;
    public $material;
    
    public function setType($type){
        $this->type = $type;
    }
    
    public function setMaterial($material){
        $this->material = $material;
    }
    
    abstract function create();
    abstract function getType();
    abstract function getMaterial();
}

class TeslaEngine extends Engine {
    public function create(){
        $this->setType('electric');
        $this->setHorsePower(250);
        return 'Created Tesla engine. Type: '.$this->getType().', Horse power: '.$this->getHorsePower();
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getHorsePower(){
        return $this->horsePower;
    }
}

class TeslaWheels extends Wheels {
    public function create(){
        $this->setSize(19);
        $this->setMaterial('Steel');
        return 'Created Tesla wheels. Size: '.$this->getSize().', Material: '.$this->getMaterial();
    }
    
    public function getSize(){
        return $this->size;
    }
    
    public function getMaterial(){
        return $this->material;
    }
}

class TeslaRoof extends Roof {
    public function create(){
        $this->setType('panoramic');
        $this->setMaterial('glass');
        return 'Created Tesla roof. Type: '.$this->getType().', Material: '.$this->getMaterial();
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getMaterial(){
        return $this->material;
    }
}

class MercedesEngine extends Engine {
    public function create(){
        $this->setType('disel');
        $this->setHorsePower(195);
        return 'Created Mercedes engine. Type: '.$this->getType().', Horse power: '.$this->getHorsePower();
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getHorsePower(){
        return $this->horsePower;
    }
}
class MercedesWheels extends Wheels {
    public function create(){
        $this->setSize(17);
        $this->setMaterial('Iron');
        return 'Created Mercedes wheels. Size: '.$this->getSize().', Material: '.$this->getMaterial();
    }
    
    public function getSize(){
        return $this->size;
    }
    
    public function getMaterial(){
        return $this->material;
    }
}
class MercedesRoof extends Roof {
    public function create(){
        $this->setType('cabriolet');
        $this->setMaterial('aluminum');
        return 'Created Mercedes roof. Type: '.$this->getType().', Material: '.$this->getMaterial();
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getMaterial(){
        return $this->material;
    }
}

abstract class CarFactory {
    abstract function getCar();
    abstract function createWheels();
    abstract function createWheels();
}

class TeslaFactory extends CarFactory {
    const CAR = 'Tesla';
    
    public function getCar() {
        return self::CAR;
    }
    
    public function createEngine() {
        return new TeslaEngine();
    }

    public function createWheels() {
        return new TeslaWheels();
    }
    
    public function createRoof() {
        return new TeslaRoof();
    }
}

class MercedesFactory extends CarFactory {
    const CAR = 'Mercedes';
    
    public function getCar() {
        return self::CAR;
    }
    
    public function createEngine() {
        return new MercedesEngine();
    }

    public function createWheels() {
        return new MercedesWheels();
    }
    
    public function createRoof() {
        return new MercedesRoof();
    }
}


function func(CarFactory $cf) {
    $engine = $cf->createEngine()->create();
    $wheels = $cf->createWheels()->create();
    $roof = $cf->createRoof()->create();
    
    return 'Car created. Car: '.$cf->getCar().', Wheels: Size is '.$wheels->getSize().' and Material is '.$wheels->getMaterial().
        ', Engine: Type is '.$engine->getType().' and Horse power is '.$engine->getHorsePower().
        ', Roof: Type is '.$roof->getType().' and Material is '.$roof->getMaterial();
}
