<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    public function list()
    {
        $em = $this->getDoctrine()->getManager();
        $invoices = $em->getRepository(Invoice::class)->findAll();

        return $this->render('invoiceList.html.twig', ['invoices' => $invoices]);
    }

    public function info($id)
    {
        $em = $this->getDoctrine()->getManager();
        $invoice = $em->getRepository(Invoice::class)->find($id);

        return $this->render('invoiceInfo.html.twig', ['invoice' => $invoice]);
    }

    public function create(Request $request)
    {
        $form = $this->createForm(InvoiceType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $invoice = $form->getData();
            $em->persist($invoice);
            $em->flush();

            $this->redirectToRoute('invoiceList');
        }

        return $this->render('invoiceCreate.html.twig', ['form' => $form->createView()]);
    }
}
