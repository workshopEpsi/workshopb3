<?php

namespace AppBundle\Controller;

use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ConnexionUtilisateurController extends Controller
{

    public function connexionEleveAction(Request $request, SessionInterface $session)
    {
        $login = $request->request->get('_email');
        $mdp = $request->request->get('_password');

        $eleve = $this->getDoctrine()->getRepository('AppBundle:Etudiants')->findBy(['email' => $login]);

        $reponse = null;

        if (!$eleve) {
            $reponse = $this->render('index.html.twig', array('erreur' => "Mot de passe/Login incorrect"));
            return $reponse;
        }

        if ($eleve[0]->getMdp() == $mdp) {
            $reponse = $this->render('Etudiant/EspaceEtudiant.html.twig', array('login' => $login));
            $session->set('eleve', $eleve[0]);
            return $reponse;
        } else {
            $reponse = $this->render('index.html.twig', array('erreur' => "Mot de passe/Login incorrect"));
            return $reponse;
        }


    }




    public function connexionInterPedaAction(Request $request)
    {
        $login = $request->request->get('_email');
        $mdp = $request->request->get('_password');

        $intervenant = $this->getDoctrine()->getRepository('AppBundle:Intervenants')->findBy(['email' => $login]);

        $reponse = null;

        if(!$intervenant) {
            $reponse = $this->render('index.html.twig', array('erreur' => "Mot de passe/Login incorrect"));
            return $reponse;
        }


        if($intervenant[0]->getMdp() == $mdp) {
            $reponse = $this->render('Intervenant/EspaceIntervenant.html.twig', array('login' => $login) );
            return $reponse;
        } else {
            $reponse = $this->render('index.html.twig', array('erreur' => "Mot de passe/Login incorrect"));
            return $reponse;
        }



    }
}
