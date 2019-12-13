<?php


namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends AbstractController
{
    public function listClients()
    {
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository(Client::class)->findAll();

        return $this->render('clientList.html.twig', ['clients' => $clients]);
    }

    public function createFormView(Request $request)
    {
        $form = $this->createForm(ClientType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $client = $form->getData();
            dump($client);
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('clientList');
        }

        return $this->render('clientCreate.html.twig', ['form' => $form->createView()]);
    }
}