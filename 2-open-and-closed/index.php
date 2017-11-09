<?
// entities should be open for extension, but closed for modification.
// change behavior without modifying source code...
// avoid code rot.
class Square {
    public $width;
    public $height;

    public function __construct($height, $width)
    {
        $this->width = $width;
        $this->height = $height;
    }
}


class AreaCalculator {

    // v1
    public function calculate($square)
    {
        $area = 0;
        $area += $square->height * $square->width;
        return $area;
    }

    // fix v2
    public function calculate2($shape)
    {
        $area = 0;
        if (is_a($shape) == 'square') {
            $area += $shape->height * $shape->width;
        }
        elseif (is_a($shape) == 'circle') {
            $area += $shape->radios * $shape->radios * pi();
        }

        return $area;
    }
}
