<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientViwerController extends AbstractController
{
    /**
     * @Route("/", name="client_list_viewer")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function clientLists(PaginatorInterface $paginator, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        /** @var ClientRepository $clientRepository */
        $clientRepository = $em->getRepository(Client::class);

        $queryBuilder = $clientRepository->findAllClients();

        $pagination = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt('page', 1),
            5
        );

        return $this->render('client_viewer/clientLists.html.twig', [
            'pagination' => $pagination
        ]);
    }

    /**
     * @Route("/client/{id}/show", name="show")
     * @param $id
     * @return Response
     */
    public function show($id)
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

        return $this->render('client_viewer/show.html.twig', [
            'client' => $client
        ]);
    }
}
