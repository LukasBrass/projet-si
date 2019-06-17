<?php
/**
 * Created by PhpStorm.
 * User: lbrasseleur
 * Date: 2019-01-14
 * Time: 14:45
 */

namespace App\Controller;

use App\Entity\Chefprojet;
use App\Entity\Consultant;
use App\Entity\Equipe;
use App\Entity\Ingenieur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{

    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $equipeList = $em->getRepository(Equipe::class)->findAll();

        return $this->render('default\equipe.html.twig',
            ['equipeList' => $equipeList]);
    }

    /**
     * @Route("/equipe/{id_equipe}", name="team_details")
     */
    public function equipeDetails(int $id_equipe)
    {
        $metierList = [];
        $em = $this->getDoctrine()->getManager();
        $consultantList = $em->getRepository(Consultant::class)->findBy(['equipe' => $id_equipe]);

        foreach ($consultantList as $consultant) {
            $metier = $em->getRepository(Chefprojet::class)->find($consultant->getCode());
            if ($metier) {
                $metier = "Chef de Projet";
            } else {
                $metier = "Ingénieur";
                //$metier = $em->getRepository(Ingenieur::class)->find($consultant->getId());
            }
            $metierList[$consultant->getCode()] = $metier;
        }
        return $this->render('default\equipe_details.html.twig',
            [
                'consultantList' => $consultantList,
                'metierList' => $metierList
            ]);
    }
}