<?php
//namespace Acme\GuestbookBundle\Controller;
//
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Response;
//
//class ShowController extends Controller
//{
//    public function showAction()
//    {
//        $task = $this->getDoctrine()
//            ->getRepository ('AcmeGuestbookBundle:Task')
//            ->findAll();
//        if (!$task)
//        {
//            return new Response('No comment found');
//        }
//
//        return $this->render('AcmeGuestbookBundle:Default:index.html.twig', array ('task'=>$task));
//    }
//
//}