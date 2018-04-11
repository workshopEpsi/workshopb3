<?php

namespace WB3\PlatformBundle\Controller;

use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class ConnexionUtilisateurController extends Controller
{
    public function connexionEleveAction(Request $request)
    {

        $login = $request->request->get('_email');
        $mdp = $request->request->get('_password');


        return $this->render('test.html.twig', array('login' => $login) );
    }

    public function connexionInterPedaAction(Request $request)
    {
        $login = $request->request->get('_email');
        $mdp = $request->request->get('_password');


        return $this->render('test2.html.twig', array('login' => $login) );
    }

}
