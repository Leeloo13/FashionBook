<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MessageController extends AbstractController
{
    #[Route('/message', name: 'message')]
    public function index(): Response
    {
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }

    #[Route('/send', name:'send')]
    public function send(Request $request, EntityManagerInterface $em): Response
    {
        $message = new Messages;
        $form = $this->createForm(MessageType::class, $message);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $message->setSender($this->getUser());

            $em->persist($message);
            $em->flush();

            $this->addFlash('message', 'Message envoyé');

            return $this->redirectToRoute('message');
        }

        return $this->render("message/send.html.twig", [
            'form' =>$form->createView()
        ]);
    }
}
