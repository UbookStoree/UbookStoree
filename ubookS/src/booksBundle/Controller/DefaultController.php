<?php

namespace booksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $user=$this->getUser();
        if($user!=null)
        {
            if($user->getRoles()[0]="ROLE_ADMIN")
            {
                return $this->redirectToRoute('read_l');
            }
            return $this->render('@books/Default/index.html.twig');
        }
        return $this->render('@books/Default/index.html.twig');
    }
}
