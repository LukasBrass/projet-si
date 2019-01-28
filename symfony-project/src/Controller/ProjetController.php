<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;

class ProjetController extends AbstractController
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $projetList = $em->getRepository(Projet::class)->findAll();
        if( isset($_SESSION['role'])) {
            return $this->render('projet/index.html.twig', [
                'projetList' => $projetList,
                'role' => $_SESSION['role']
            ]);
        }
        return $this->redirectToRoute('index');
    }

    public function update(Projet $projet)
    {
        if( isset($_SESSION['role'])) {
            return $this->render('projet/details.html.twig', [
                'item' => $projet,
                'role' => $_SESSION['role']
            ]);
        }
    }

    //More like "set inactive" i think, cause it will make a huge problem to manage work hours
    public function delete(Projet $projet)
    {
        if( isset($_SESSION['role'])) {
            return $this->render('projet/details.html.twig', [
                'item' => $projet,
                'role' => $_SESSION['role']
            ]);
        }
    }

    public function create()
    {
        if (isset($_SESSION['role'])) {
            return $this->render('projet/details.html.twig', [
                'role' => $_SESSION['role']
            ]);
        }
    }
}
