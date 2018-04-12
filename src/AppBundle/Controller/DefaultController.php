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

    public function indexAction(Request $request, SessionInterface $session)
    {
//        if connected
//            if etudiant
//               return $this->render('Etudiant/EspaceEtudiant.html.twig');
//            else
//                return $this->render('Intervenant/EspaceIntervenant.html.twig');
//          else
//            return $this->render('connexion.html.twig');
            return $this->render('index.html.twig');
    }




}
