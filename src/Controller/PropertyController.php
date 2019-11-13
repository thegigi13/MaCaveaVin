<?php

namespace App\Controller;

use App\Entity\Bottle;
use App\Repository\BottleRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Cocur\Slugify\Slugify;



class PropertyController extends AbstractController
{
    /**
     * @var BottleRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;


    /**
     * PropertyController constructor.
     * @param BottleRepository $repository
     * @param ObjectManager $em
     */
    public  function __construct(BottleRepository $repository, ObjectManager $em )

    {
        $this->repository = $repository;
        $this->em = $em;
    }



    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */
    public function index()
    {
       //  $bouteille = $this->repository->findAllVisible(); // lire la base de donne bottle par fonction findAllVisible()

       /*     // ajouter les paramatres d'une bouteille dans sa base de donnée
        $property = new Bottle();
        $property->setName('Chateau lafite')
            ->setPrice(25,30)
            ->setVintage(2018)
            ->setQuantity(5)
            ->setDescription('Bon vin qui semarie bien avec de la viande pas trop forte')
            ->setDegree(15)
            ->setDesignation('Origine controlée')
            ->setType('Rouge')
            ->setPicture('image a ajouter')
            ->setConsumptionDate(new\dateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();

        */

        return $this->render('property/index.html.twig', [
        'current_menu' => 'properties'
    ]);
    }

    /**
     * @Route("/biens/{slug}-{id}" , name="property.show", requirements={"slug" : "[a-z0-9\-]*"})
     * @return Response
     */
    public function show($slug, $id) // : response
    {
        $bottle = $this->repository->find($id);
        return $this->render('property/show.html.twig',[
            'bottle' =>$bottle,
            'current_menu'=>'properties'
    ]);
    }



}