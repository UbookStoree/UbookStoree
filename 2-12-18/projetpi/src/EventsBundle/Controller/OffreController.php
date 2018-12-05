<?php

namespace EventsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreController extends Controller
{
    public function createAction()
    {
        return $this->render('EventsBundle:Offre:create.html.twig', array(
            // ...
        ));
    }

    public function validateAction()
    {
        return $this->render('EventsBundle:Offre:validate.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('EventsBundle:Offre:delete.html.twig', array(
            // ...
        ));
    }

    public function editAction()
    {
        return $this->render('EventsBundle:Offre:edit.html.twig', array(
            // ...
        ));
    }

    public function displayAction()
    {
        return $this->render('EventsBundle:Offre:display.html.twig', array(
            // ...
        ));
    }

}
