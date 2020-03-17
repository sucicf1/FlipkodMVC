<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Circle;

class CircleController extends AbstractController
{
    /**
     * @Route("/circle/{r}", methods={"GET"})
     */
    public function Circle(float $r)
    {
        $circle = new Circle($r);
        return $this->json(['type' => 'circle', 
                            'radius' => $r,
                            'surface' => $circle->getSurface(),
                            'circumference' => $circle->getCircumference()]);
    }
}