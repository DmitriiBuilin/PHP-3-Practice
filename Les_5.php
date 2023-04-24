<?php

//1:25:00

/*Interfaces*/

interface ISquare
{
    function squareArea(int $sideSquare);
}
interface ICircle
{
    function circleArea(int $circumference);
}

/*Classes*/

class SquareAreaLib
{
    public function getSquareArea(float $diagonal)
    {
        $area = ($diagonal**2)/2;
        return $area;
    }
}
class CircleAreaLib
{
    public function getCircleArea(float $diagonal)
    {
        $area = (M_PI * $diagonal**2))/4;
        return $area;
    }
}


/*Adapters*/

class squareAdapter implements ISquare {
    protected $library;
    public function __construct()
    {
        $this->library = new SquareAreaLib();
    }

    public function squareArea(int $sideSquare)
    {
        $this->library->getSquareArea($sideSquare * sqrt(2));
    }
}

class circleAdapter implements ICircle {
    protected $library;
    public function __construct()
    {
        $this->library = new CircleAreaLib();
    }

    public function circleArea(int $circumference)
    {
        $this->library->getCircleArea($circumference / M_PI);
    }
}
