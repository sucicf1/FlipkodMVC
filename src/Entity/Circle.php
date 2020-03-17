<?php

namespace App\Entity;

class Circle
{
    private $r;

    function __construct(float $r)
    {
        $this->r = $r;
    }

    public function getCircumference()
    {
        return 2 * $this->r * pi();
    }

    public function getSurface()
    {
        return $this->r * $this->r * pi();
    }
}