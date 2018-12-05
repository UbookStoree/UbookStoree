<?php

namespace booksBundle\Controller;

use booksBundle\booksBundle;
use booksBundle\Entity\LivreOccasion;
use booksBundle\Form\LivreOccasionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LivreOccasionController extends Controller
{
    public function createlAction($id, Request $request)
    {
        //1-prepartion form
        //1.a:objet vide
        $livreOccasion = new LivreOccasion();
        //1.b:create form
        $form = $this->createForm(LivreOccasionType::class, $livreOccasion);
        //2-Recuperation des données
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            $file = $livreOccasion->getImage();
            //var_dump(generateUniqueFileName());
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );


            // updates the 'brochure' property to store the PDF file name
            // instead of its contents
            $livreOccasion->setImage($fileName);
            //3-cnx avec BD:l'insertion dans la BD
            $livre = $this->getDoctrine()->getManager();
            $id = $this->getUser()->getId();
            $User = $livre->getRepository("booksBundle:User")->find($id);
            $livreOccasion->setUser($User);
            $livre->persist($livreOccasion);//ov va suvegarder dans ORM
            $livre->flush();// on va suvegarder dans BD
        }
        return $this->render('@books/LivreOccasion/create.html.twig', array(
            'f' => $form->createView()
        ));
    }
    private function generateUniqueFileName()
    {
    }
    public function readlAction()
    {
        $livres = $this->getDoctrine()->getRepository(LivreOccasion::class)->findAll();

        return $this->render('@books/LivreOccasion/read.html.twig', array(
            'livres' => $livres
        ));
    }

}
