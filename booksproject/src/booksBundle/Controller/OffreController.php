<?php

namespace booksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreController extends Controller
{
    public function createAction()
    {
        return $this->render('booksBundle:Offre:create.html.twig', array(
            // ...
        ));
    }

    public function validateAction()
    {
        return $this->render('booksBundle:Offre:validate.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('booksBundle:Offre:delete.html.twig', array(
            // ...
        ));
    }

    public function editAction()
    {
        return $this->render('booksBundle:Offre:edit.html.twig', array(
            // ...
        ));
    }

    public function displayAction()
    {
        return $this->render('booksBundle:Offre:display.html.twig', array(
            // ...
        ));
    }

}
