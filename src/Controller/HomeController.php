<?php

namespace App\Controller;

use App\Repository\BottleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{


	/**
	 * @Route("/", name="home")
	 * @param BottleRepository $repository
	 * @return Response
	 */
	public function index(BottleRepository $repository) // : Response
	{
		$bouteilles  = $repository->findLatest();
		return $this->render('pages/home.html.twig', [
			'bottles' => $bouteilles
		]);

	}



}
