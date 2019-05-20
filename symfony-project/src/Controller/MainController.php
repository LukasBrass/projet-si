<?php
/**
 * Created by PhpStorm.
 * User: lbrasseleur
 * Date: 2019-01-14
 * Time: 14:45
 */

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $ongoingProjectList = $em->getRepository(Projet::class)->findOngoingProjects(new \DateTime());

        return $this->render('default\index.html.twig',
            ['ongoingProjectList' => $ongoingProjectList]);
    }

}