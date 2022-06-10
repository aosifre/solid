<?php

class Vehicle
{
}

class Car extends Vehicle
{
}

class Boat extends Vehicle {

}

abstract class VehicleManager
{
    abstract function sell(Vehicle $vehicle): void;
}

class CarManager extends VehicleManager
{
    function sell(Car $car): void // ❌ Declaration of CarManager::sell(Car $car): void must be compatible with VehicleManager::sell(Vehicle $vehicle):
    {
        /**
         * This is a limitation of PHP language, technically speaking, this is NOT an error.
         *
         * If you wish to do so, use interfaces!
         */
    }
}

$carManager = new CarManager();
$carManager->sell(new Car());

class VehicleOrder
{
    /**
     * Children can be substitute with there parent.
     */
    function order(Vehicule $vehicle)
    {
    }
}

$vehicleOrder = new VehicleOrder();
$vehicleOrder->order(new Car()); // substitution works, it is all ok 👌
$vehicleOrder->order(new Boat()); // substitution works, it is all ok 👌