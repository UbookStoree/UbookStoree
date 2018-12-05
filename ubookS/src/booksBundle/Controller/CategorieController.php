<?php

namespace booksBundle\Controller;

use booksBundle\Entity\Categorie;
use booksBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    public function createcAction(Request $request)
    {   //1-prepartion form
        //1.a:objet vide
        $categorie = new Categorie();
        //1.b:create form
        $form = $this->createForm(CategorieType::class, $categorie);
        //2-les données
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            //3-cnx avec BD
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);//ov va suvegarder dans ORM
            $em->flush();// on va suvegarder dans BD
            return $this->redirectToRoute('read_categorie');
        }
        return $this->render('@books/Categorie/create.html.twig', array(
            'f' => $form->createView()
        ));

    }
    public function readAction()
    {
        $categories = $this->getDoctrine()->getRepository(Categorie::class)->findAll();

        return $this->render('@books/Categorie/read.html.twig', array(
            'categories' => $categories
        ));
    }
    public function updateAction($idCategorie, Request $request)
    {
        // 1-preparation from
        //1.a-on va recuperer les donnees de ORM
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Categorie::class)->find($idCategorie);
        //1.b:create form
        $form = $this->createForm(CategorieType::class, $categorie);
        //2
        $form = $form->handleRequest($request);
        //3
        if ($form->isValid()) {

            // $em->persist($modele);//ov va suvegarder dans ORM : non car on a deja l'objet
            $em->flush();//
            return $this->redirectToRoute('read_categorie');
        }
        //1.c:on va envoyer notre from au view
        return $this->render('@books/Categorie/update.html.twig', array(
            'form' => $form->createView()
        ));
        return $this->render('@books/Categorie/read.html.twig');
    }

    public function deleteAction($idCategorie)//on va supprimer l'objet de ORM apres de BD
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Categorie::class)->find($idCategorie);
        $em->remove($categorie);
        $em->flush();
        return $this->redirectToRoute('read_categorie');//redirecttoRoute:y3waed l'execution mil louwel RMV

    }

}
