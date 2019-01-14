<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetController extends AbstractController
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $projetList = $em->getRepository(Projet::class)->findAll();
        return $this->render('projet/index.html.twig', [
            'projetList' => $projetList
        ]);
    }

    public function update(Projet $projet)
    {
        return $this->render('projet/details.html.twig', [
                'item' => $projet
            ]);
    }

    //More like "set inactive" i think, cause it will make a huge problem to manage work hours
    public function delete(Projet $projet)
    {
        return $this->render('projet/details.html.twig', [
            'item' => $projet
        ]);
    }

    public function create()
    {
        return $this->render('projet/details.html.twig', [
        ]);
    }
}
