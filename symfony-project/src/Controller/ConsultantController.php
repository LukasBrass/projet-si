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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConsultantController extends AbstractController
{

    /**
     * @Route("/equipe/{id_equipe}/consultant/{id_consultant}", name="team_details")
     */
    public function listAbsence(int $id_consultant)
    {
        $em = $this->getDoctrine()->getManager();
        $absenceList = $em->getRepository(Absence::class)->findBy(['code' => $id_consultant]);
        $consultant = $em->getRepository(Consultant::class)->find($id_consultant);

        return $this->render('default\absence_details.html.twig',
            [
                'absenceList' => $absenceList,
                'consultant' => $consultant
            ]);
    }
}