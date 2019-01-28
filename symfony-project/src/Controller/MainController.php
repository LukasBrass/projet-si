<?php
/**
 * Created by PhpStorm.
 * User: lbrasseleur
 * Date: 2019-01-14
 * Time: 14:45
 */

namespace App\Controller;


use App\Entity\Consultant;
use App\Entity\Manager;
use App\Entity\User;
use App\Form\LoginType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()) {
            $badResponse = 'Wrong name/password';
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $role = null;
            /** @var Consultant $consultant */
            $user = $em->getRepository(User::class)->findOneBy(
                [
                    'login' => $data['login'],
                    'password' => $data['password']
                ]);
            if($user) {
                $consultant = $em->getRepository(Consultant::class)->find($user->getId());
                if ($consultant) {
                    if ($consultant->getTypeMetier() === 'I')
                        $role = 'ingenieur';
                    if ($consultant->getTypeMetier() === 'P')
                        $role = 'chief';
                } else {
                    $manager = $em->getRepository(Manager::class)->find($user->getId());
                    if ($manager)
                        $role = 'manager';
                }
                if ($role) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['role'] = $role;
                    return $this->redirectToRoute('list_projet');
                }
            } else {
                $this->addFlash('error', 'Compte introuvable');
            }
        }
        return $this->render('default\index.html.twig',
            ['form' => $form->createView(),
             'badResponse' => isset($badResponse) ? $badResponse : null]);
    }

}