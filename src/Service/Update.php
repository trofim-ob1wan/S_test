<?php

namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;

class Update
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function edit($client, $scoring, $educationCollection)
    {
        $client->getScoring()->setBalls($scoring);

        foreach ($educationCollection as $exp) {
            if ($client->getEducations()->contains($exp) === false) {
                $this->em->remove($exp);
            }
        }

        $this->em->persist($client);
        $this->em->flush();
    }
}