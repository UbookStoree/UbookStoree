<?php

namespace AchatBundle\Controller;

use AchatBundle\AchatBundle;
use AchatBundle\Entity\Commande;
//use AchatBundle\Entity\User;
use EventsBundle\Entity\User;

use AchatBundle\Entity\LigneCommande;
use AchatBundle\Entity\LivreOccasion;
use AchatBundle\Repository\CommandeRepository;
use Proxies\__CG__\AchatBundle\Entity\FosUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;


class PanierController extends Controller
{
    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addoccAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $idUser = $this->getUser()->getId();
      // $commande =new Commande();
        $idcmd=$this->getDoctrine()->getRepository(Commande::class)->myfindByIdUser($idUser);
        $cm=0;
        foreach ($idcmd as $data)
         $cm=$data['idcmd'];
        //die("cm: ".$cm );
        $commande=$this->getDoctrine()->getRepository(Commande::class)->find($cm);
        $liv=$em->getRepository(LivreOccasion::class)->find($id);
        if(isset($commande)){
           $commande->setPrixtotal($commande->getPrixtotal()+$liv->getPrixOccasion());
           $commande->setQuantite($commande->getQuantite()+1);
            $commande->setDateLivraison(new \DateTime());
            $commande->setDateCommande(new \DateTime());
            $commande->setEtatLivraison(0);
            $commande->setValid(0);
            //instance de User

            $user = $this->getUser();

            $commande->setIdUtilisateurfk($user);
           $em->persist($commande);
           $em->flush();
            $ligneCommande =new LigneCommande();
            $ligneCommande->setIdlivrefk($liv);
            $ligneCommande->setDate(new \DateTime());
            $ligneCommande->setIdcommandefk($commande);
            $em->persist($ligneCommande);
            $em->flush();
        }
        else {
            $user = $this->getUser();
            $c = new CommandeController();
            //$c->creerCmdAction();
            $c =new Commande();
            $c->setPrixtotal($liv->getPrixOccasion());
            $c->setQuantite(1);
            $c->setDateLivraison(new \DateTime());
            $c->setDateCommande(new \DateTime());
            $c->setEtatLivraison(0);
            $c->setValid(0);
            $em->persist($c);
            $c->setIdUtilisateurfk($user);
            $em->flush();
            $ligneCommande =new LigneCommande();
            $ligneCommande->setIdlivrefk($liv);
            $ligneCommande->setDate(new \DateTime());
            $ligneCommande->setIdcommandefk($c);
            $em->persist($ligneCommande);
            $em->flush();
        }

        //return $this->render('@Achat/Panier/addocc.html.twig', array());
        $livres=$this->getDoctrine()->getRepository(LivreOccasion::class)->findAll();
        return $this->render('@Achat/Livreocc/readallocc.html.twig', array('livres' =>$livres

        ));

        //return new JsonResponse(array('idLigneCommande' => $ligneCommande->getIdlignecommande()));
    }



    public function deleteoccAction($id, Request $request)
    {    $em = $this->getDoctrine()->getManager();
        $idUser = $this->getUser()->getId();
        $idcmd=$this->getDoctrine()->getRepository(Commande::class)->myfindByIdUser($idUser);
        $cm=0;
        foreach ($idcmd as $data)
            $cm=$data['idcmd'];
        $commande=$this->getDoctrine()->getRepository(Commande::class)->find($cm);
        $idcmde=$commande->getIdcommande();
        $liv=$em->getRepository(LivreOccasion::class)->find($id);
        $lg=$this->getDoctrine()->getRepository(LigneCommande::class)->myfindByIdLivre($id);
        $commande->setPrixtotal($commande->getPrixtotal()-$liv->getPrixOccasion());
        $total=$commande->getPrixtotal();
      //  $lignecommandes=$em->getRepository(LigneCommande::class)->myfindByIdCmd($idcmde);
        $ligne=0;
        foreach ($lg as $data)
            $ligne=$data['lg'];
        $lignecmd=$this->getDoctrine()->getRepository(LigneCommande::class)->find($ligne);
        $em->remove($lignecmd);
        $em->flush();
        $lignecommandss=$em->getRepository(LigneCommande::class)->myfindByIdCmd($idcmde);

        return $this->render('@Achat/Panier/getpanier.html.twig', array(
            "lignecommandes" => $lignecommandss,
            "total" => $total,
             "idcmd" => $cm,
        ));
    }

    public function editoccAction()
    {
        return $this->render('@Achat/Panier/editocc.html.twig', array(
            // ...
        ));
    }

    public function getpanierAction()
    { $em = $this->getDoctrine()->getManager();
        $idUser = $this->getUser()->getId();
        $idcmd=$this->getDoctrine()->getRepository(Commande::class)->myfindByIdUser($idUser);
        $cm=0;
        foreach ($idcmd as $data)
         $cm=$data['idcmd'];
        $commande=$this->getDoctrine()->getRepository(Commande::class)->find($cm);
        $idcmde = $commande->getIdcommande();
        $total = $commande->getPrixtotal();
        $quantite=  $commande->getQuantite();
        $lignecommandes=$em->getRepository(LigneCommande::class)->myfindByIdCmd($idcmde);
        return $this->render('@Achat/Panier/getpanier.html.twig', array(
            "lignecommandes" => $lignecommandes,
            "total" => $total,
            "idcmd" => $cm,
            "quantite"=>$quantite,

        ));
    }




    public function pdfAction()
    {  $user_id = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $idcmd=$this->getDoctrine()->getRepository(Commande::class)->myfindByIdUserValide($user_id);
        $cm=0;
        foreach ($idcmd as $data) {
            $cm = $data['idcmd'];
        }

        $commande=$this->getDoctrine()->getRepository(Commande::class)->find($cm);
        $idcmde = $commande->getIdcommande();
        $total = $commande->getPrixtotal();
        $lignecommandes=$em->getRepository(LigneCommande::class)->myfindByIdCmd($idcmde);


        foreach ($lignecommandes as $lignecommande)
        {
            $idlc=$lignecommande->getIdlignecommande();
        }


        $html = $this->renderView('@Achat/Panier/pdf.html.twig', array(
           "lignecommandes" => $lignecommandes,
            "total"=> $total,
            "idlc"=>$idlc
            //..Send some data to your view if you need to //
        ));


        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'Facture-'.$idlc.'.pdf'
        );
    }


}
