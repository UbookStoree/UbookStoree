<?php

namespace booksBundle\Controller;

use booksBundle\booksBundle;
use booksBundle\Entity\LivreOccasion;
use booksBundle\Form\LivreOccasionType;
use booksBundle\Form\SearchLivreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class LivreOccasionController extends Controller
{

    public function createlAction(Request $request)
    {
        $user = $this->getUser()->getId();
        if ($user != null) {
            //1-prepartion form
            //1.a:objet vide
            $livreOccasion = new LivreOccasion();
            //1.b:create form
            $form = $this->createForm(LivreOccasionType::class, $livreOccasion);
            //2-Recuperation des données
            $form = $form->handleRequest($request);
            if ($form->isValid()) {

                //3-cnx avec BD:l'insertion dans la BD
                $livre = $this->getDoctrine()->getManager();
                $livreOccasion->UploadProfilePicture();
                $User = $livre->getRepository("booksBundle:User")->find($user);
                $livreOccasion->setUser($User);
                $livre->persist($livreOccasion);//ov va suvegarder dans ORM
                $livre->flush();// on va suvegarder dans BD
            }
            return $this->render('@books/LivreOccasion/create.html.twig', array(
                'f' => $form->createView()
            ));
        }
        else{
            return $this->redirectToRoute('home_page');
        }
    }

    private function generateUniqueFileName()
    {
    }

    public function readlAction()
    {
        $livres = $this->getDoctrine()->getRepository(LivreOccasion::class)->myfindall();

        return $this->render('@books/LivreOccasion/read.html.twig', array(
            'livres' => $livres
        ));
    }

    public function accepterAction($idLivre)
    {
        // 1-preparation from
        //1.a-on va recuperer les donnees de ORM
        $em = $this->getDoctrine()->getManager();
        $livre = $em->getRepository(LivreOccasion::class)->find($idLivre);
        $livre->setTreated(1);
        $em->persist($livre);
        $em->flush();
        return $this->redirectToRoute('read_l');//redirecttoRoute:y3waed l'execution mil louwel RMV
    }

    public function refuserAction($idLivre)//on va supprimer l'objet de ORM apres de BD
    {
        $em = $this->getDoctrine()->getManager();
        $livre = $em->getRepository(LivreOccasion::class)->find($idLivre);
        $em->remove($livre);
        $em->flush();
        return $this->redirectToRoute('read_l');//redirecttoRoute:y3waed l'execution mil louwel RMV

    }

    public function readlaAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT l FROM booksBundle:LivreOccasion l WHERE l.treated=1";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );


        return $this->render('@books/LivreOccasion/readla.html.twig', array(
            'pagination' => $pagination

        ));
    }

    public function searchaAction(Request $request)
    {   //chercher etat acceptable et treated=0
        $etatLivre = $request->get('etat');
        if (isset($etatLivre)) {//isset l variable existe ou pas , empty :contient data ou pas
            $livre =$this->getDoctrine()->getRepository(LivreOccasion::class)->myfindetat($etatLivre);

            return $this->render('@books/LivreOccasion/read.html.twig', array('livres' => $livre));  //donne el vue
        }
        return $this->render('@books/LivreOccasion/searcht.html.twig');
        }
    public function showlAction(Request $request)
    {
        //$em=$this->getDoctrine()->getManager();
        $em    = $this->get('doctrine.orm.entity_manager');
        //$dql   = "SELECT l FROM booksBundle:LivreOccasion l WHERE l.treated=1";
        $queryBuilder=$em->getRepository('booksBundle:LivreOccasion')->createQueryBuilder('bp')
            ->where('bp.treated=1');
        if($request->query->getAlnum('filter')){
            $queryBuilder
                ->Where('bp.auteur LIKE :auteur')
                ->setParameter('auteur','%'.$request->query->getAlnum('filter').'%');
        }
        $query=$queryBuilder->getQuery();
        /**
         * @var $paginator \Knp\Component\Pager\Paginator
         */
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            3/*limit per page*/
        );

        // parameters to template
        return $this->render('@books/LivreOccasion/showl.html.twig', array('pagination' => $pagination));
    }
    public function SearchLivreAction(Request $request)
    {
        $livreoccasion = new LivreOccasion();
        $em = $this->getDoctrine()->getManager();
        $livres = $em->getRepository('booksBundle:LivreOccasion')->myfindt();
        $Form = $this->createForm(SearchLivreType::class, $livres);
        $Form->handleRequest($request);
        if ($request->isXmlHttpRequest()) {

            $livres = $em->getRepository('booksBundle:LivreOccasion')
                ->findByCategorieDql($request->get('categorie'));
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $data = $serializer->normalize($livres);
            return new JsonResponse($data);

        }
        return $this->render('@books/LivreOccasion/search_livre.html.twig', array(
            "livres" => $livres,
            "Form" => $Form->createView(),
        ))
            ;


    }
    public function pdfAction()
    {  $user_id = $this->getUser()->getId();
        $nom=$this->getUser()-> getNom();
        $prenom=$this->getUser()-> getPrenom();
        $em = $this->getDoctrine()->getManager();

        $livre=$em->getRepository(LivreOccasion::class)->myfindt();
        foreach ($livre as $li)
        {
            $idlc=$li->getIdLivre();
        }

        $html = $this->renderView('@books/LivreOccasion/pdf.html.twig', array(
            "livres" => $livre,

            //..Send some data to your view if you need to //
        ));


        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'Livres-'.$idlc.'.pdf'
        );
    }


    }

