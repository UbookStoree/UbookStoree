<?php

namespace EbookBundle\Controller;

use EbookBundle\Entity\Ebook;
use EbookBundle\Form\EbookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EbookController extends Controller
{
    public function readbookAction(Request $request)
    {

        $ebook=$this->getDoctrine()->getRepository(Ebook::class)->findAll();
       
        return $this->render('@Ebook\Ebook\readbook.html.twig', array(
            // ...
            "Ebooks"=>$ebook
        ));
    }
    public function showAction()
    {

        $ebook=$this->getDoctrine()->getRepository(Ebook::class)->findAll();
        return $this->render('@Ebook\Ebook\mesLivres.html.twig', array(
            // ...
            "Ebooks"=>$ebook
        ));
    }

    public function creatbookAction(Request $request)
    {
        //1-form
        //1-a:objet vide
        $ebook=new Ebook();
        //1-b creat form
        $form=$this->createForm(EbookType::class,$ebook);
        //2-les donnee
        $form=$form->handleRequest($request);
        if($form->isValid()){
            //3-conx avec BD

            $em=$this->getDoctrine()->getManager();
            $ebook->UploadProfilePicture();
            $em->persist($ebook);
            $em->flush();

            echo "<script> alert(\" votre ajout est effectue avec succes !  \")</script>";

            return $this->redirectToRoute('readbook');



        }
        //1-c:envoi du form
        return $this->render('@Ebook\Ebook\creatbook.html.twig', array(
            // ...
            'form'=>$form->createView()
        ));
    }

    public function updatebookAction($id,Request $request)
    {
        //1-form
        //1.a creation d'objet
        $em = $this->getDoctrine()->getManager();
        $ebook=$em->getRepository(Ebook::class)->find($id);
        //1-b creat form
        $form=$this->createForm(EbookType::class,$ebook);
        //2-les donnee
        $form=$form->handleRequest($request);
        if($form->isValid()) {
            //3-conx avec BD
            $em->flush();
            echo "<script> alert(\" votre modification est effectue avec succes !  \")</script>";
        }

        //1-c:envoi du form

        return $this->render('@Ebook\Ebook\updatebook.html.twig', array(
            // ...
            'form'=>$form->createView()
        ));
    }

    public function deletebookAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $ebook=$em->getRepository(Ebook::class)->find($id);
        $em->remove($ebook);
        $em->flush();
        echo "<script> alert(\" votre suppression est effectue avec succes !  \")</script>";

        return $this->redirectToRoute('readbook');

    }


}
