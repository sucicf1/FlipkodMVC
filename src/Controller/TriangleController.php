<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Triangle;

class TriangleController extends AbstractController
{
    /**
     * @Route("/triangle/{a}/{b}/{c}", methods={"GET"})
     */
    public function triangle(float $a, float$b, float $c)
    {
        $triangle = new Triangle($a, $b, $c);
        return $this->json(['type' => 'triangle', 
                            'a' => $a,
                            'b' => $b,
                            'c' => $c,
                            'surface' => $triangle->getSurface(),
                            'circumference' => $triangle->getCircumference()]);
    }
}