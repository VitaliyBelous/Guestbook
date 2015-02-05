<?php

namespace Acme\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\GuestbookBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Acme\GuestbookBundle\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Response;

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
        $form = $this->createForm(new TaskType(), new Task());
        return $this->render('AcmeGuestbookBundle:Default:index.html.twig', array(
            'form' => $form->createView(), 'pagination' => $pagination
        ));
    }
    public function newAction(Request $request)
    {
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

                return $this->redirect($this->generateUrl('acme_guestbook_homepage'));
            }
        }
        return $this->render('AcmeGuestbookBundle:Default:index.html.twig', array( 'form' => $form->createView() ));
    }


}



//class DefaultController extends Controller
//{
//    public function indexAction(Request $request)
//    {
//        $em    = $this->get('doctrine.orm.entity_manager');
//        $dql   = "SELECT a FROM AcmeGuestbookBundle:Task a";
//        $query = $em->createQuery($dql);
//
//        $paginator  = $this->get('knp_paginator');
//        $pagination = $paginator->paginate(
//            $query,
//            $request->query->get('page', 1)/*page number*/,
//            10/*limit per page*/
//        );
//        $form = $this->createForm(new TaskType(), new Task());
//        return $this->render('AcmeGuestbookBundle:Default:index.html.twig', array(
//            'form' => $form->createView(), 'pagination' => $pagination
//        ));
//    }
//    public function newAction(Request $request)
//    {
//        if ($request->getMethod() == 'POST') {
//            $task = new Task();
//            $task->setAuthor('');
//            $task->setDueDate(new \DateTime());
//            $task->setSite('');
//            $task->setComment('');
//            $task->setPoint('');
//            $form = $this->createForm(new TaskType(), $task);
//            $form->handleRequest($request);
//            $response = array();
//            if ($form->isValid()) {
//                $em = $this->getDoctrine()->getEntityManager();
//                $em->persist($task);
//                $em->flush();
////                $taskData = '<tr>' . $task->getAuthor() . $task->getPoint() . $task->getComment() . '</tr>';
//                $taskData = '<div class="comment"><div class="top_row"> <ul>
//                                <li class="author">' . $task->getAuthor() . '</li>
//                                <li class="point">' . 'Point:' . $task->getPoint() . '</li>
//                                <li class="date">' . 'Date:' . $task->getDueDate()->format('d-m-Y H:i:s') . '</li>
//                            </ul></div>
//                            <table border="1" cellspacing="0" cellpadding="7">
//                            <tr>
//                                <td width="160px">' . $task->getSite() . '</td>
//                                <td>' . $task->getComment() . '</td>
//
//                            </tr>
//                           </table></div>';
//                $response['message'] = '<span>Thank You for review, You can add another one.</span>';
//                $response['data'] = $taskData;
//                $response = json_encode($response);
//                return new Response($response, 200, array('Content-Type'=>'application/json'));
//            }
//        } else {
//            return self::indexAction();
//        }
//    }
//}