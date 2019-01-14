<?php
/**
 * Created by PhpStorm.
 * User: lbrasseleur
 * Date: 2019-01-14
 * Time: 14:45
 */

namespace App\Controller;


use App\Entity\Consultant;
use App\Form\LoginType;
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
            /** @var Consultant $consultant */
            $consultant = $em->getRepository(Consultant::class)->findOneBy(
                [
                    'nameC' => $request->request->get('login'),
                    'password' => $request->request->get('password')
                ]);
            if($consultant) {
                if($consultant->getTypeMetier() === 'I')
                    $role = 'ingenieur';
                if($consultant->getTypeMetier() === 'P')
                    $role = 'chief';
                $session = $this->get('session');
                $session->set('role', $role);
            }
            return $this->redirectToRoute('list_projet');
        }
        return $this->render('default\index.html.twig',
            ['form' => $form->createView(),
             'badResponse' => isset($badResponse) ? $badResponse : null]);
    }

}