<?php

namespace App\Controller;

use App\Entity\Trip;
use App\Form\CreateTripFormType;
use App\Repository\TripRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DriverController extends AbstractController
{
    /**
     * @Route("/driver", name="app_driver")
     */
    public function index(): Response
    {
        return $this->render('driver/index.html.twig');
    }

    /**
     * @Route("/createTrip", name="app_create_trip")
     */
    public function createTrip(Request $request): Response
    {
        $trip = new Trip();
        $form = $this->createForm(CreateTripFormType::class, $trip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($trip);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('driver/create.html.twig', [
            'createTrip' => $form->createView()
        ]);
    }
}
