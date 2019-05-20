<?php

namespace App\Repository;

use App\Entity\Chefprojet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Chefprojet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chefprojet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chefprojet[]    findAll()
 * @method Chefprojet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChefprojetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Chefprojet::class);
    }

    // /**
    //  * @return Chefprojet[] Returns an array of Chefprojet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Chefprojet
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
