<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\Entity\Circle;
use App\Entity\Triangle;

class SumController extends AbstractController
{
    private function parseData($data)
    {
        if ($data['shapes'][0]['type'] == 'circle') {
            $shapes[0] = new Circle($data['shapes'][0]['radius']);
        }
        if ($data['shapes'][0]['type'] == 'triangle') {
            $shapes[0] = new Triangle($data['shapes'][0]['a'], $data['shapes'][0]['b'], $data['shapes'][0]['c']);
        }

        if ($data['shapes'][1]['type'] == 'circle') {
            $shapes[1] = new Circle($data['shapes'][1]['radius']);
        }
        if ($data['shapes'][1]['type'] == 'triangle') {
            $shapes[1] = new Triangle($data['shapes'][1]['a'], $data['shapes'][1]['b'], $data['shapes'][1]['c']);
        }

        return $shapes;
    }

    /**
     * @Route("/sumCircumference", methods={"POST"})
     */
    public function sumCircumference(Request $request)
    {
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) 
        {
            $data = json_decode($request->getContent(), true);
            $shapes = $this->parseData($data);
            $data["sumCircumference"] = $shapes[0]->getCircumference() + $shapes[1]->getCircumference();
            return $this->json($data);
        }
        else
        {
            return $this->json(['description' => 'Invalid request'], 400); 
        }
    }

    /**
     * @Route("/sumSurface", methods={"POST"})
     */
    public function sumSurface(Request $request)
    {
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) 
        {
            $data = json_decode($request->getContent(), true);
            $shapes = $this->parseData($data);
            $data["sumSurface"] = $shapes[0]->getSurface() + $shapes[1]->getSurface();
            return $this->json($data);
        }
        else
        {
            return $this->json(['description' => 'Invalid request'], 400); 
        }
    }
}