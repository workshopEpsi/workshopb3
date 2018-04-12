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


        if (!$eleve) {
            $this->addFlash('erreur',"Mot de passe/Login incorrect");

            $reponse = $this->redirectToRoute("homepage");
            return $reponse;
        }

        if ($eleve[0]->getMdp() == $mdp) {

            $groupes = $this->getDoctrine()->getRepository('AppBundle:Groupes')->findAll();



            $reponse = $this->render('Etudiant/EspaceEtudiant.html.twig', array("nom" => $eleve[0]->getNom(), "prenom" => $eleve[0]->getPrenom(), "groupes" => $groupes ));
            $session->set('eleve', $eleve[0]);
            return $reponse;
        } else {
            $this->addFlash('erreur',"Mot de passe/Login incorrect");
            $reponse = $this->redirectToRoute("homepage");
            return $reponse;
        }

    }




    public function connexionInterPedaAction(Request $request, SessionInterface $session)
    {
        $login = $request->request->get('emailPeda');
        $mdp = $request->request->get('passwordPeda');

        $intervenant = $this->getDoctrine()->getRepository('AppBundle:Intervenants')->findBy(['email' => $login]);


        if(!$intervenant) {
            $this->addFlash('erreur',"Mot de passe/Login incorrect");
            return $this->redirectToRoute("homepage");

        }

        if($intervenant[0]->getMdp() == $mdp) {

            $session->set('intervenant', $intervenant[0]);
            return $this->render('Intervenant/EspaceIntervenant.html.twig', array('intervenant' => $intervenant[0]->getNom()));
        } else {
            $this->addFlash('erreur',"Mot de passe/Login incorrect");
            return $this->redirectToRoute("homepage");

        }



    }
}
