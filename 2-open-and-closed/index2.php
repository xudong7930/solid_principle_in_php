<?
// seperate extensible behavior behind an interface, and flip the dependencies
// 
interface Shape {
    public function area();
}

class Square implements Shape {
    public $width;
    
    public function __construct($width)
    {
        $this->width = $width;
    }

    public function area()
    {
        return $this->width * $this->width;
    }
}

class Circle implements Square {
    public $radios;
    public function __construct($radios)
    {
        $this->radios = $radios;
    }

    public function area()
    {
        return $this->radios * $this->radios * pi();
    }
}

class AreaCalculator {
    public function calc($shapes)
    {
        $areas = 0;
        $areas = array_map(function($shape){
            return $shape->area();
        }, $shapes);
        return array_sum($areas);
    }
}
