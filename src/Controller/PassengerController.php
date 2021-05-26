<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PassengerController extends AbstractController
{
    /**
     * @Route("/passenger", name="app_passenger")
     */
    public function index(): Response
    {
        return $this->render('passenger/index.html.twig');
    }

    /**
     * @Route("/booking/{id}", name="app_booking")
     */
    public function booking(): Response
    {
        return $this->render('passenger/booking.html.twig');
    }
}
