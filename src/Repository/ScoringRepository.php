<?php

namespace App\Repository;

use App\Entity\Scoring;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scoring|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scoring|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scoring[]    findAll()
 * @method Scoring[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoringRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scoring::class);
    }
}
