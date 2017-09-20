<?php

namespace CsvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PDO;
use CsvBundle\Entity\csv;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;
use CsvBundle\Repository\csvRepository;

class DashController extends Controller
{
    /**
     * @Route("/dashboard")
     */
    public function indexAction()
    {
        $qb = $this->getDoctrine()
            ->getRepository('CsvBundle:csv');

        $products = $qb->findAll();


        return $this->render('CsvBundle:Dashboard:index.html.twig',array('debit' => $products));
    }



    /**
     * @Route("/dashboard01")
     */
    public function indexuAction()
    {


        return $this->render('CsvBundle:fos-user:index.html.twig');
    }


}
