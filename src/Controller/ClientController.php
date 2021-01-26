<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use App\Service\Store;
use App\Service\Update;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CalculateScoring;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/add", name="add_new_client")
     * @param Request $request
     * @param CalculateScoring $calculateScoring
     * @param Store $store
     * @return Response
     * @throws \Exception
     */
    public function index(
        Request $request,
        CalculateScoring $calculateScoring,
        Store $store
    ): Response {

        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $calculateScoring->scoring($client);
            $scoring = array_sum($data);
            $store->save($client, $scoring);

            $this->addFlash(
                'info',
                'Create successfully!'
            );

            return $this->redirectToRoute('client_list_viewer');
        }

        return $this->render('form/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/client/{id}/edit", name="edit")
     * @param Request $request
     * @param $id
     * @param CalculateScoring $calculateScoring
     * @param Update $update
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function edit(
        Request $request,
        $id,
        CalculateScoring $calculateScoring,
        Update $update
    ) {
        $em = $this->getDoctrine()->getManager();

        /** @var ClientRepository $clientRepository */
        $clientRepository = $em->getRepository(Client::class);

        $client = $clientRepository->findOneBy(['id' => $id]);

        if (!$client) {
            throw $this->createNotFoundException(
                'No client found for id ' . $id
            );
        }

        $educationCollection = new ArrayCollection();

        foreach ($client->getEducations() as $educ) {
            $educationCollection->add($educ);
        }

        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $calculateScoring->scoring($client);
            $scoring = array_sum($data);
            $update->edit($client, $scoring, $educationCollection);

            $this->addFlash(
                'info',
                'Update successfully!'
            );

            return $this->redirectToRoute('edit', ['id' => $id]);
        }

        return $this->render('form/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/client/{id}/remove", name="remove")
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();

        /** @var ClientRepository $clientRepository */
        $clientRepository = $em->getRepository(Client::class);

        $client = $clientRepository->findOneBy(['id' => $id]);

        if (!$client) {
            throw $this->createNotFoundException(
                'No user found for id ' . $id
            );
        }

        $em->remove($client);
        $em->flush();

        $this->addFlash(
            'info',
            'Delete successfully!'
        );

        return $this->redirectToRoute('client_list_viewer');
    }
}
