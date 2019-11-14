<?php
namespace App\Controller\Admin;




use App\Entity\Bottle;
use App\Form\BottleType;
use App\Repository\BottleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


Class AdminPropertyController extends AbstractController
{
    /**
     * @var BottleRepository
     */
    private $repository;


    public function __construct(BottleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @route("/admin", name="admin.property.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $bottles = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig', compact('bottles'));
    }

    /**
     * @Route("/admin/{id}", name="admin.property.edit")
     * @param Bottle $bottle
     */
    public function edit(Bottle $bottle)  // :Bottle
    {
        $form = $this->createForm(BottleType::class, $bottle);
        return $this->render('admin/property/edit.html.twig', [
            'bottle' =>$bottle,
            'form' => $form->createView()
        ]);
    }
}