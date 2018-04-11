<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etudiants;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, SessionInterface $session)
    {
//        if connected
//            if etudiant
//               return $this->render('Etudiant/EspaceEtudiant.html.twig');
//            else
//                return $this->render('Intervenant/EspaceIntervenant.html.twig');
//          else
//            return $this->render('connexion.html.twig');
            return $this->render('connexion.html.twig');
    }


    /**
     * @Route("/logineleve", name="homepage")
     */
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



    /**
     * @Route("/loginpeda", name="homepage")
     */
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
