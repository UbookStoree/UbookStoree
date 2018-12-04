<?php

namespace AchatBundle\Controller;

use AchatBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminCmommandeController extends Controller
{
    public function getAllCmdAction()
    {$cmds=$this->getDoctrine()->getRepository(Commande::class)->myfindByValide();


            return $this->render('@Achat/AdminCmommande/get_all_cmd.html.twig', array( 'cmds' => $cmds
        ));
    }

    public function SearchCmdAction()
    {
        return $this->render('@Achat/AdminCmommande/search_cmd.html.twig', array(
            // ...
        ));
    }

    public function ValiderLivraisonAction($id,Request $request)

    {  $em = $this->getDoctrine()->getManager();
//$d=new \DateTime();
        $commande=$this->getDoctrine()->getRepository(Commande::class)->find($id);
    //controle si l'admin a déja vaidé cette cmd cad etatLivraison=1 déja ,un message sera aperçu: vous avez validez cette cmde déja!
      $commande->setEtatLivraison(1);
        $date = $commande->getDateCommande();
        date_add($date, date_interval_create_from_date_string('15 days'));
    $commande->setDateLivraison($date);
        $em->persist($commande);
        $em->flush();


        $cmds=$this->getDoctrine()->getRepository(Commande::class)->myfindByValide();
       return $this->render('@Achat/AdminCmommande/get_all_cmd.html.twig', array( 'cmds' => $cmds
        ));
       //return $this->redirectToRoute('get_all_cmd');
    }

    public function SearchCmdAdminAction()
    {
        return $this->render('@Achat/AdminCmommande/search_cmd_admin.html.twig', array(
            // ...
        ));
    }

}
