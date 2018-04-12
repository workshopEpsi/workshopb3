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
        $eleve = $session->get('eleve');
        $peda = $session->get('peda');

        if (isset($eleve))
               return $this->render('Etudiant/EspaceEtudiant.html.twig');
        elseif (isset($peda))
               return $this->render('Intervenant/EspaceIntervenant.html.twig');
        else
            return $this->render('index.html.twig');
    }




}
