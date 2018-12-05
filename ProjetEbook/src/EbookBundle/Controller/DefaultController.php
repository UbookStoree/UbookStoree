<?php

namespace EbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Ebook/Default/index.html.twig');

    }
    public function admintemplAction()
    {
        return $this->render('@Ebook\Default\templateAdmin.html.twig');
    }
    public function clienttempAction()
    {
        return $this->render('@Ebook\Default\templetClient.html.twig');
    }
}
