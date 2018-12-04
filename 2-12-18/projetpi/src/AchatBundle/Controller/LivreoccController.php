<?php

namespace AchatBundle\Controller;

use AchatBundle\Entity\LivreOccasion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LivreoccController extends Controller
{
    public function readalloccAction()
    { $livres=$this->getDoctrine()->getRepository(LivreOccasion::class)->findAll();
        return $this->render('@Achat/Livreocc/readallocc.html.twig', array('livres' =>$livres

        ));
    }

}
