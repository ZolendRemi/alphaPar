<?php


namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ClientController extends AbstractController
{
    public function list()
    {
        $em = $this->getDoctrine()->getManager();
        $clients = $em->getRepository(Client::class)->findAll();

        return $this->render('clientList.html.twig', ['clients' => $clients]);
    }

    public function create(Request $request)
    {
        $form = $this->createForm(ClientType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $client = $form->getData();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('clientList');
        }

        return $this->render('clientCreate.html.twig', ['form' => $form->createView()]);
    }

    public function modify(int $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository(Client::class)->find($id);

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em->persist($data);
            $em->flush();

            return $this->redirectToRoute('clientList');
        }

        return $this->render('clientModify.html.twig', ['form' => $form->createView()]);
    }
}