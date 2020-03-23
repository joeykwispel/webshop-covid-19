<?php

namespace App\Repository;

use App\Entity\FactuurProducten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FactuurProducten|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactuurProducten|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactuurProducten[]    findAll()
 * @method FactuurProducten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactuurProductenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactuurProducten::class);
    }

    // /**
    //  * @return FactuurProducten[] Returns an array of FactuurProducten objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FactuurProducten
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
