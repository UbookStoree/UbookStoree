<?php

namespace AchatBundle\Controller;

use AchatBundle\Entity\Commande;
use AchatBundle\Entity\LivreOccasion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CommandeController extends Controller
{
    public function validerCmdAction($id,Request $request)
    {   $em = $this->getDoctrine()->getManager();
        $commande = $this->getDoctrine()->getRepository(Commande::class)->find($id);
        $commande->setValid(1);
        $em->persist($commande);
        $em->flush();
        return new JsonResponse();

        //return $this->render('@Achat/Commande/valider_cmd.html.twig', array());
    }
    public function creerCmdAction(Request $request)
    {   $em = $this->getDoctrine()->getManager();
        $commande =new Commande();
        $commande->setIdUtilisateurfk($this->getUser());
        $commande->setDateCommande(new \DateTime());
        //cette date à modifier plustard 7 jrs apres la date de commande par exp
        $commande->setDateLivraison(new \DateTime());
        $commande->setDateCommande(new \DateTime());
        $commande->setPrixtotal(0);
        $commande->setEtatLivraison(0);
        $commande->setQuantite(0);
        $commande->setValid(0);

        $em->persist($commande);
        $em->flush();

        return $this->render('@Achat/Commande/creer_cmd.html.twig', array(
            // ...
        ));
        //return new JsonResponse(array('commande_Id' => $commande->getIdcommande()));
       // return new JsonResponse();
    }
    public function updateCmdAction()
    {
        return $this->render('@Achat/Commande/update_cmd.html.twig', array(
            // ...
        ));
    }

    public function annulerCmdAction()
    {
        return $this->render('@Achat/Commande/annuler_cmd.html.twig', array(
            // ...
        ));
    }

    public function getCmdAction()
    {
        return $this->render('@Achat/Commande/get_cmd.html.twig', array(
            // ...
        ));
    }

    public function searchCmdAction()
    {

        return $this->render('@Achat/Commande/search_cmd.html.twig', array(

        ));
    }

}
