<?php

abstract class Engine {
    abstract function printClass();
}
abstract class Wheels {
    abstract function printClass();
}

class TeslaEngine extends Engine {
    public function printClass(){
        return get_class($this);
    }
}
class TeslaWheels extends Wheels {
    public function printClass(){
        return get_class($this);
    }
}

class MercedesEngine extends Engine {
    public function printClass(){
        return get_class($this);
    }
}
class MercedesWheels extends Wheels {
    public function printClass(){
        return get_class($this);
    }
}

abstract class CarFactory {
    abstract function createEngine();
    abstract function createWheels();
}

class TeslaFactory extends CarFactory {
    public function createEngine() {
        return new TeslaEngine();
    }

    public function createWheels() {
        return new TeslaWheels();
    }
}

class MercedesFactory extends CarFactory {
    public function createEngine() {
        return new MercedesEngine();
    }

    public function createWheels() {
        return new MercedesWheels();
    }
}


function func(CarFactory $cf) {
    $engine = $cf->createEngine();
    $wheels = $cf->createWheels();
    $engine->printClass();
    $wheels->printClass();
}
