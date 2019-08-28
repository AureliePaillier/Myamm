<?php

namespace App\Repository;

use App\Entity\Tablemeal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Tablemeal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tablemeal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tablemeal[]    findAll()
 * @method Tablemeal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TablemealRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tablemeal::class);
    }

    // /**
    //  * @return Tablemeal[] Returns an array of Tablemeal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tablemeal
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
