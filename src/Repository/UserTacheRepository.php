<?php

namespace App\Repository;

use App\Entity\UserTache;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserTache|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserTache|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserTache[]    findAll()
 * @method UserTache[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTacheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserTache::class);
    }

    // /**
    //  * @return UserTache[] Returns an array of UserTache objects
    //  */
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
    public function findOneBySomeField($value): ?UserTache
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
