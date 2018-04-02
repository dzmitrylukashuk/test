<?php

abstract class Furniture {
    abstract function printClass();
}

class Table extends Furniture {
    public function printClass(){
        return get_class($this);
    }
}

class Chair extends Furniture {
    public function printClass(){
        return get_class($this);
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
    $furniture = $ff->createFurniture();
    $furniture->printClass();
}
