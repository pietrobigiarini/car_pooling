<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DriverController extends AbstractController
{
    /**
     * @Route("/driver", name="app_driver")
     */
    public function index(): Response
    {
        return $this->render('driver/index.html.twig', [
            'controller_name' => 'DriverController',
        ]);
    }

    /**
     * @Route("/createTrip", name="app_createTrip")
     */
    public function createTrip(): Response
    {
        return $this->render('driver/create.html.twig', [
            'controller_name' => 'DriverController',
        ]);
    }
}
