<?php

namespace Acme\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\GuestbookBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Acme\GuestbookBundle\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function newAction(Request $request)
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
                $user = $this->getDoctrine()->getEntityManager();
                        $user->persist($task);
                        $user->flush();

                $request->getSession()->getFlashBag()->add(
                    'notice',
                    'Thank You for review, You can add another one!'
                );

                return $this->redirect($this->generateUrl('task_new'));
            }
        }
        return $this->render('AcmeGuestbookBundle:Default:index.html.twig', array( 'form' => $form->createView(),'pagination' => $pagination ));
    }


}



