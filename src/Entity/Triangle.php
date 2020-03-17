<?php

namespace App\Entity;

class Triangle
{
    private $a;
    private $b;
    private $c;

    function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getCircumference()
    {
        return $this->a + $this->b + $this->c;
    }

    public function getSurface()
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }
}