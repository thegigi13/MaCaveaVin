<?php
namespace App\Controller\Admin;




use App\Entity\Bottle;
use App\Form\BottleType;
use App\Repository\BottleRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


Class AdminPropertyController extends AbstractController
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
     * AdminPropertyController constructor.
     * @param BottleRepository $repository
     * @param ObjectManager $em
     */
    public function __construct(BottleRepository $repository , ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
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
     * @route("/admin/property/create", name="admin.property.new")
     */
    public function new(Request $request)
    {
        $bottle = new Bottle();
        $form = $this->createForm(BottleType::class, $bottle);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($bottle);
            $this->em->flush();
            $this->addFlash('success', 'Creation avec succés');
            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/new.html.twig', [
            'bottle' => $bottle,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.edit", methods="GET|POST")
     * @param Bottle $bottle
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Bottle $bottle, Request $request)  // :Bottle
    {
        $form = $this->createForm(BottleType::class, $bottle);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success', 'Modifié avec succés');
            return $this->redirectToRoute('admin.property.index');
        }


        return $this->render('admin/property/edit.html.twig', [
            'bottle' => $bottle,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.delete", methods="DELETE")
     * @param Bottle $bottle
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete(Bottle $bottle, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $bottle->getId(), $request->get('_token')))
        {
            $this->em->remove($bottle);
            $this->em->flush();
            $this->addFlash('success', 'Supprimée avec succés');
        }

        return $this->redirectToRoute('admin.property.index');
    }
}