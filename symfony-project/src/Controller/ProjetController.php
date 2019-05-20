<?php

namespace App\Controller;


use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProjetController extends AbstractController
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();

        return $this->redirectToRoute('index');
    }

    public function update(Request $request, Projet $projet)
    {

        return $this->redirectToRoute('list_projet');
    }

    //More like "set inactive" i think, cause it will make a huge problem to manage work hours
    public function delete(Projet $projet)
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'manager') {
            $this->getDoctrine()->getManager()->remove($projet);
            $this->getDoctrine()->getManager()->flush();
        }
        return $this->redirectToRoute('list_projet');
    }

    public function create(Request $request)
    {

        return $this->redirectToRoute('list_projet');
    }
}
