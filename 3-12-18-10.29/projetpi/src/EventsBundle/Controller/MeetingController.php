<?php

namespace EventsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MeetingController extends Controller
{
    public function createAction()
    {
        return $this->render('EventsBundle:Meeting:create.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('EventsBundle:Meeting:delete.html.twig', array(
            // ...
        ));
    }

    public function editAction()
    {
        return $this->render('EventsBundle:Meeting:edit.html.twig', array(
            // ...
        ));
    }

    public function displayAction()
    {
        return $this->render('EventsBundle:Meeting:display.html.twig', array(
            // ...
        ));
    }

}
