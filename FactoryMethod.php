<?php

abstract class Furniture {
    public $type;
    public $height;
    public $material;
    
    public function setType($type){
        $this->type = $type;
    }
    
    public function setHeight($height){
        $this->height = $height;
    }
    
    public function setMaterial($material){
        $this->material = $material;
    }
    
    abstract function create();
    abstract function getClass();
    abstract function getType();
    abstract function getHeight();
    abstract function getMaterial();
}

class Table extends Furniture {
    public function create(){
        $this->setType('round');
        $this->setHeight(10);
        $this->setMaterial('Wood');
        return 'Created table. Height: '.$this->getHeight().', Material: '.$this->getMaterial().', Type: '.$this->getType();
    }
    
    public function getClass(){
        return 'table';
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getHeight(){
        return $this->height;
    }
    
    public function getMaterial(){
        return $this->material;
    }
}

class Chair extends Furniture {
    public function create(){
        $this->setType('square');
        $this->setHeight(15);
        $this->setMaterial('Metal');
        return 'Created chair. Height: '.$this->getHeight().', Material: '.$this->getMaterial().', Type: '.$this->getType();
    }
    
    public function getClass(){
        return 'chair';
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function getHeight(){
        return $this->height;
    }
    
    public function getMaterial(){
        return $this->material;
    }
}

abstract class FurnitureFactory {
    abstract function createFurniture();
}

class TableFactory extends FurnitureFactory {
    public function createFurniture() { //FactoryMethod
        return new Table();
    }
}

class ChairFactory extends FurnitureFactory {
    public function createFurniture() { //FactoryMethod
        return new Chair();
    }
}


function func(FurnitureFactory $ff) {
    $furniture = $ff->createFurniture()->create();
    return 'Furniture created. Class: '.$furniture->getClass().', Height: '.$furniture->getHeight().', Material: '.$furniture->getMaterial().', Type: '.$furniture->getType();
}
