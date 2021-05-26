<?php

namespace App\Controller;

use App\Repository\TripRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * @IsGranted("ROLE_USER")
     */
    public function list(TripRepository $tripRepository)
    {
        return $this->render('main/index.html.twig', [
            'trips' => $tripRepository->findAll()
        ]);
    }
}
