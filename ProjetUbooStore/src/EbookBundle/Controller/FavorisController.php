<?php

namespace EbookBundle\Controller;

use EbookBundle\EbookBundle;
use EbookBundle\Entity\Ebook;
use EbookBundle\Entity\Favoris;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FavorisController extends Controller
{
    public function affichedAction(Request $request,$id)
    {

        return $this->render('@Ebook\Favoris\read_fav.html.twig', array(
            // ...

        ));
    }

    public function creatFavAction($id_Ebook, $id_user)
    {
        //1-récupération id userks
        $id_user = $this->getUser()->getId();
        $em1 = $this->getDoctrine()->getManager();
        $user = $em1->getRepository('AppBundle:User')->findOneBy(array("id" => $id_user));

        //2-récupération id book
        $em = $this->getDoctrine()->getManager();
        $ebook = $em->getRepository(Ebook::class)->find($id_Ebook);
        $titre=$ebook->getTitre();
        $auteur=$ebook->getAuteur();
        $resum=$ebook->getResumer();
        $nb = $ebook->getType();
        $prix=$ebook->getPrix();
        $imag=$ebook->getNomImage();
        $new =$em->getRepository('EbookBundle:Favoris')->findbyEbook($id_Ebook,$id_user);
        if($new==0) {
            //3-Favoris
            $em = $this->getDoctrine()->getManager();
            $F = new Favoris();
            $F->setIdUser($user);
            $F->setIdEbook($ebook);
            $F->setTitre($titre);
            $F->setAuteur($auteur);
            $F->setResumer($resum);
            $F->setTypeEbook($nb);
            $F->setPrix($prix);
            $F->setNomImage($imag);


            $em->persist($F);
            $em->flush();
            return $this->redirectToRoute('showbook');
        }
        else
        {
            echo "<script> alert(\" livre déja existe dans ta liste!  \")</script>";


        }
        return $this->redirectToRoute('showbook');

    }




    public function deleteFavAction($id_user,$id)
    {
        $id_user = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $favoris =$em->getRepository(Favoris::class)->findOneBy(array('id_user' => $id_user, "id" => $id));

        $em->remove($favoris);
        $em->flush();
        return $this->redirectToRoute('read_fav');


    }
    public function mesFavorisInactiveAction()
    {
        $em = $this->getDoctrine()->getManager();

        $iduser = $this->getUser();

        $favoris = $em->getRepository("EbookBundle:Favoris")->mesFavorisInactiveUser($iduser);

        return $this->render('@Ebook/Favoris/read_fav.html.twig', array(
            'favoris' => $favoris,
        ));
    }

}
