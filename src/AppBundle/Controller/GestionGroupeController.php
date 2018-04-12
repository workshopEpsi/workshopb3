<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Groupes;
use AppBundle\Entity\Portefeuille;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class GestionGroupeController extends Controller
{
    public function creerGroupeAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $portefeuille = new Portefeuille();

        $portefeuille->setCreditjetons(0);

        $em->persist($portefeuille);

        $em->flush();

        $nomGroupe = $request->request->get('nameGroup');

        $groupe = new Groupes();

        $groupe->setNom($nomGroupe);

        $groupe->setDatecreation(date('Y-m-d' ));

        $em->persist($groupe);

        $em->flush();

        return $this->render('Etudiant/EspaceEtudiant.html.twig');

    }
    public function suppGroupeAction($id)
    {

    }
    public function modifGroupeAction($id, $donnee)
    {

    }
}
