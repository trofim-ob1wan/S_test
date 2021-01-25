<?php

namespace App\Service;

use App\Entity\Scoring;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class Store
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function save($client, $scoring)
    {
        $scor = new Scoring();
        $scor->setBalls($scoring);
        $client->setScoring($scor);

        $educationCollection = new ArrayCollection();

        foreach ($client->getEducations() as $educ) {
            $educationCollection->add($educ);
        }

        $this->em->persist($client);
        $this->em->flush();
    }
}
