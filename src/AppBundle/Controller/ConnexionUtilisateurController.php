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
        $login = $request->request->get('emailEleve');
        $mdp = $request->request->get('passwordEleve');

        $eleve = $this->getDoctrine()->getRepository('AppBundle:Etudiants')->findBy(['email' => $login]);

        $reponse = null;

        if (!$eleve) {
            $this->addFlash('erreur',"Mot de passe/Login incorrect");

            $reponse = $this->redirectToRoute("homepage");
            return $reponse;
        }

        if ($eleve[0]->getMdp() == $mdp) {
            $reponse = $this->render('Etudiant/EspaceEtudiant.html.twig', array("nom" => $eleve[0]->getNom(), "prenom" => $eleve[0]->getPrenom()));
            $session->set('eleve', $eleve[0]);
            return $reponse;
        } else {
            $this->addFlash('erreur',"Mot de passe/Login incorrect");
            $reponse = $this->redirectToRoute("homepage");
            return $reponse;
        }

    }




    public function connexionInterPedaAction(Request $request)
    {
        $login = $request->request->get('emailPeda');
        $mdp = $request->request->get('passwordPeda');

        $intervenant = $this->getDoctrine()->getRepository('AppBundle:Intervenants')->findBy(['email' => $login]);

        $reponse = null;

        if(!$intervenant) {
            return $this->render('index.html.twig', array('erreur' => "Mot de passe/Login incorrect"));
        }

        if($intervenant[0]->getMdp() == $mdp) {
            return $this->render('Intervenant/EspaceIntervenant.html.twig', array('login' => $login) );
        } else {
            return $this->render('index.html.twig', array('erreur' => "Mot de passe/Login incorrect"));
        }



    }
}
