<?php

namespace booksBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MeetingController extends Controller
{
    public function createAction()
    {
        return $this->render('booksBundle:Meeting:create.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('booksBundle:Meeting:delete.html.twig', array(
            // ...
        ));
    }

    public function editAction()
    {
        return $this->render('booksBundle:Meeting:edit.html.twig', array(
            // ...
        ));
    }

    public function displayAction()
    {
        return $this->render('booksBundle:Meeting:display.html.twig', array(
            // ...
        ));
    }

}
