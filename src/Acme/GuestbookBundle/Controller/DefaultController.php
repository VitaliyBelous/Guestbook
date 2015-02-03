<?php

namespace Acme\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\GuestbookBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Acme\GuestbookBundle\Form\Type\TaskType;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {

        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AcmeGuestbookBundle:Task a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        $task = new Task();
        $task->setAuthor('');
        $task->setDueDate(new \DateTime());
        $task->setSite('');
        $task->setComment('');
        $task->setPoint('');

        $form = $this->createForm(new TaskType(), $task);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($task);
                $em->flush();

                return $this->redirect($this->generateUrl('acme_guestbook_homepage'));
            }
        }
        return $this->render('AcmeGuestbookBundle:Default:index.html.twig', array( 'form' => $form->createView(),'pagination' => $pagination ));
    }


}