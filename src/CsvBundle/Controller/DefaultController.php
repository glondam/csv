<?php

namespace CsvBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PDO;
use CsvBundle\Entity\csv;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/apply-csv")
     */
    public function indexAction()
    {
        return $this->render('CsvBundle:Default:index.html.twig');
    }

    /**
     * @Route("/csv")
     */
    public function uploadAction()
    {
        $dossier = 'a/';
        $fichier = basename($_FILES['userfile']['name']);
        $taille_maxi = 100000;
        $taille = filesize($_FILES['userfile']['tmp_name']);
        $extensions = array( '.csv');
        $extension = strrchr($_FILES['userfile']['name'], '.');
//Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
            $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['userfile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                echo 'Upload effectué avec succès !';

            }
            else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';

            }
        }
        else
        {
            return $erreur;
        }

        $csv = array(); // Tableau qui va contenir les éléments extraits du fichier CSV
        $row = 100; // Représente la ligne

        // Import du fichier CSV
        if (($handle = fopen("a/$fichier", "r")) !== FALSE) { // Lecture du fichier, à adapter
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) { // Eléments séparés par un point-virgule, à modifier si necessaire
                $num = count($data); // Nombre d'éléments sur la ligne traitée
                $row++;
                for ($c = 0; $c < $num; $c++)

                {
                    $csv[$row] = array(
                        "date01" => $data[0],
                        "date02" => $data[1],
                        "intitule" => $data[2],
                        "debit" => $data[3],
                        "credit" => $data[4],

                    );

                }
            }
            fclose($handle);

        }

        $em = $this->getDoctrine()->getManager(); // EntityManager pour la base de données

        // Lecture du tableau contenant les utilisateurs et ajout dans la base de données
        foreach ($csv as $csv) {

            // On crée un objet utilisateur
            $csva = new csv();



            // Hydrate l'objet avec les informations provenants du fichier CSV
            $csva->setdate01($csv["date01"]);
            $csva->setdate02($csv["date02"]);
            $csva->setintitule($csv["intitule"]);
            $csva->setdebit($csv["debit"]);
            $csva->setcredit($csv["credit"]);
            $csva->setindex01($fichier);
            $csva->setUser($this->getUser());


            // Enregistrement de l'objet en vu de son écriture dans la base de données
            $em->persist($csva);

        }


        // Ecriture dans la base de données
        $em->flush();



//Suppression de la 1ière ligne d'intitulé

        $entity_name = "Debit";
        $ema = $this->getDoctrine()->getEntityManager();
        $entity_product=$ema->getRepository('CsvBundle:csv')->findBy(array('debit'=>$entity_name));
        foreach ($entity_product as $product) {
            $ema->remove($product);
        }
        $ema->flush();



        // Renvoi la réponse (ici affiche un simple OK pour l'exemple)
        return new Response('OK');
    }

    /**
     * @Route("/ok")
     */
    public function okAction()
    {
        return $this->render('CsvBundle:Default:ok.html.twig');
    }


    /**
     * @Route("/sql")
     */



function test_mysql_conn() {



    $VALEUR_hote='localhost';
    $VALEUR_port='';
    $VALEUR_nom_bd='bull';
    $VALEUR_user='root';
    $VALEUR_mot_de_passe='';
    $connexion = new PDO('mysql:host='.$VALEUR_hote.';port='.$VALEUR_port.';dbname='.$VALEUR_nom_bd, $VALEUR_user, $VALEUR_mot_de_passe);

    $connexion->exec("INSERT INTO a (a, b, c)
VALUES ('10', '20','30')");




    return $this->render('CsvBundle:Default:ok.html.twig');





}




}
