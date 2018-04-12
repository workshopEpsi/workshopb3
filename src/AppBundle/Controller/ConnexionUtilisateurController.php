<?php

namespace AppBundle\Controller;

use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class ConnexionUtilisateurController extends Controller
{

    public function connexionEleveAction(Request $request)
    {
        $login = $request->request->get('_email');
        $mdp = $request->request->get('_password');

        $eleve = $this->getDoctrine()->getRepository('AppBundle:Etudiants')->findBy(['email' => $login]);

        $reponse;

        if(!$eleve) {
            $reponse = $this->render('connexion.html.twig', array('erreur' => true));
        }


        if($eleve->getMdp() == $mdp) {
            $reponse = $this->render('Etudiant/EspaceEtudiant.html.twig', array('login' => $login) );
        } else {
            $reponse = $this->render('connexion.html.twig', array('erreur' => true) );
        }

        return $reponse;
    }




    public function connexionInterPedaAction(Request $request)
    {
        $login = $request->request->get('_email');
        $mdp = $request->request->get('_password');

        $intervenant = $this->getDoctrine()->getRepository('AppBundle:Intervenants')->findBy(['email' => $login]);

        $reponse;

        if(!$intervenant) {
            $reponse = $this->render('connexion.html.twig', array('erreur' => true));
        }


        if($eleve->getMdp() == $mdp) {
            $reponse = $this->render('Intervenant/EspaceIntervenant.html.twig', array('login' => $login) );
        } else {
            $reponse = $this->render('connexion.html.twig', array('erreur' => true) );
        }

        return $reponse;

    }
}
