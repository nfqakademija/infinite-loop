<?php

namespace App\Repository;

use App\Entity\UserMilestone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserMilestone|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserMilestone|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserMilestone[]    findAll()
 * @method UserMilestone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserMilestoneRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserMilestone::class);
    }

//    /**
//     * @return UserMilestone[] Returns an array of UserMilestone objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserMilestone
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
