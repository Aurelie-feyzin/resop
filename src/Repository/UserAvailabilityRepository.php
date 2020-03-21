<?php

namespace App\Repository;

use App\Entity\UserAvailability;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserAvailability|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserAvailability|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserAvailability[]    findAll()
 * @method UserAvailability[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserAvailabilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserAvailability::class);
    }
}
