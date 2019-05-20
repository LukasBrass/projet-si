<?php

namespace App\Repository;

use App\Entity\ImputationCDP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImputationCDP|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImputationCDP|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImputationCDP[]    findAll()
 * @method ImputationCDP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImputationCDPRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImputationCDP::class);
    }

    // /**
    //  * @return ImputationCDP[] Returns an array of ImputationCDP objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImputationCDP
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
