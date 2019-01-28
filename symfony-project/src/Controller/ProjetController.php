<?php

namespace App\Controller;

use App\Entity\Consultant;
use App\Entity\EquipeProjet;
use App\Entity\Manager;
use App\Entity\Projet;
use App\Form\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ProjetController extends AbstractController
{
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'manager') {
                $consultantList = $em->getRepository(Consultant::class)->findAll();
                $projetList = $em->getRepository(Projet::class)->findBy(['idManager' => $_SESSION['id']]);
                

                return $this->render('projet/index.html.twig', [
                    'projetList' => $projetList,
                    'role' => $_SESSION['role'],
                    'consultantList' => $consultantList
                ]);

            } elseif ($_SESSION['role'] == 'ingenieur') {
                $projetList = [];
                $equipeProjetList = $em->getRepository(EquipeProjet::class)->findBy(['idConsultant' => $_SESSION['id']]);
                foreach($equipeProjetList as $equipeProjet) {
                    $projetList[$equipeProjet->getWorkedDays()] = $em->getRepository(Projet::class)->find($equipeProjet->getIdProjet());
                }

                return $this->render('projet/index.html.twig', [
                    'projetList' => $projetList,
                    'role' => $_SESSION['role']
                ]);

            }
        }
        return $this->redirectToRoute('index');
    }

    public function update(Request $request, Projet $projet)
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'manager') {
            $form = $this->createForm(ProjectType::class, $projet);
            $form->handleRequest($request);
            if ($form->isSubmitted() and $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $data = $form->getData();
                $em->persist($data);
                $em->flush();
                return $this->redirectToRoute( 'list_projet');
            }
            return $this->render('projet/create.html.twig', [
                'form' => $form->createView(),
                'role' => $_SESSION['role']
            ]);
        }
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
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'manager') {
            $form = $this->createForm(ProjectType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted() and $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $manager = $em->getRepository(Manager::class)->find($_SESSION['id']);
                $project = new Projet();
                $project->setIdManager($manager);
                $data = $form->getData();
                $project->setStartDate($data['startDate']);
                $project->setEndDate($data['endDate']);
                $em->persist($project);
                $em->flush();
                return $this->redirectToRoute( 'list_projet');
            }
            return $this->render('projet/create.html.twig', [
                'form' => $form->createView(),
                'role' => $_SESSION['role']
            ]);
        }
        return $this->redirectToRoute('list_projet');
    }

    public function affect(Request $request, Projet $projet)
    {
        if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['manager', 'chief'])) {
            $em = $this->getDoctrine()->getManager();
            $equipeProjetList = $em->getRepository(EquipeProjet::class)->findBy(['idProjet' => $projet->getId()]);
            $consultantList = $em->getRepository(Consultant::class)->findAll();
            $consultantAdded = [];
            foreach($consultantList as $consultant) {
                $consultantId = $consultant->getId();
                foreach($equipeProjetList as $equipeProjet ) {
                    if( !in_array($consultantId, $consultantAdded) && $equipeProjet->getIdConsultant() == $consultantId)
                        $consultantAdded[$consultantId] = $consultantId;
                }
            }
            return $this->render('projet/affect.html.twig', [
                'projetId' => $projet->getid(),
                'consultantList' => $consultantList,
                'consultantAddedList' => $consultantAdded,
                'role' => $_SESSION['role']
            ]);
        }
        return $this->redirectToRoute('list_projet');
    }

    public function addToProject( int $id_projet, int $id_consultant)
    {

        if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['manager', 'chief'])) {
            $em = $this->getDoctrine()->getManager();
            $projet = $em->getRepository(Projet::class)->find($id_projet);
            $consultant = $em->getRepository(Consultant::class)->find($id_consultant);
            $equipeProjet = new EquipeProjet();
            $equipeProjet->setIdConsultant($consultant->getId());
            $equipeProjet->setIdProjet($projet->getId());
            $em->persist($equipeProjet);
            $em->flush();
        }
        return $this->redirectToRoute('affect_projet',['id' => $id_projet]);
    }

    public function DeleteFromProject( int $id_projet, int $id_consultant)
    {
        if (isset($_SESSION['role']) && in_array($_SESSION['role'], ['manager', 'chief'])) {
            $em = $this->getDoctrine()->getManager();
            $projet = $em->getRepository(Projet::class)->find($id_projet);
            $consultant = $em->getRepository(Consultant::class)->find($id_consultant);
            $equipeProjet = $em->getRepository(EquipeProjet::class)->findOneBy(['idProjet' => $projet->getId(), 'idConsultant' => $consultant->getId()]);
            $em->remove($equipeProjet);
            $em->flush();
        }
        return $this->redirectToRoute('affect_projet',['id' => $id_projet]);
    }
}
