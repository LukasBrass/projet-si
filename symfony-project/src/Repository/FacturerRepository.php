<?php

namespace App\Repository;

use App\Entity\Facturer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Facturer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facturer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facturer[]    findAll()
 * @method Facturer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Facturer::class);
    }

    // /**
    //  * @return Facturer[] Returns an array of Facturer objects
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
    public function findOneBySomeField($value): ?Facturer
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
