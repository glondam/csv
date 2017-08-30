<?php


namespace CsvBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PDO;
use CsvBundle\Entity\csv;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class GraphController extends Controller
{

    /**
     * @Route("/graph")
     */
    public function indexAction()
    {


        $qb = $this->getDoctrine()
            ->getRepository('CsvBundle:csv');

        $debit = $qb->findAll();
        $credit = $qb->findAll();
       



        return $this->render('CsvBundle:Graphique:test.html.twig',array('debit' => $debit, 'credit' => $credit));
    }

}

?>