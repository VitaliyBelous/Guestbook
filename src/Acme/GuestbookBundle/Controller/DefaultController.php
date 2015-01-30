<?php

namespace Acme\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\GuestbookBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Acme\GuestbookBundle\Form\Type\TaskType;

class DefaultController extends Controller
{
    public function newAction(Request $request)
    {
        $result = $this->getDoctrine()
            ->getRepository ('AcmeGuestbookBundle:Task')
            ->findAll();
        if (!$result) {
            throw $this->createNotFoundException('Comment not found');
        }

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

                return $this->redirect($this->generateUrl('task_success'));
            }
        }

        return $this->render('AcmeGuestbookBundle:Default:index.html.twig', array(
            'form' => $form->createView(), 'task' => $result
        ));



    }
}