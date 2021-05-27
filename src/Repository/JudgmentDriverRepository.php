<?php

namespace App\Repository;

use App\Entity\JudgmentDriver;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JudgmentDriver|null find($id, $lockMode = null, $lockVersion = null)
 * @method JudgmentDriver|null findOneBy(array $criteria, array $orderBy = null)
 * @method JudgmentDriver[]    findAll()
 * @method JudgmentDriver[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JudgmentDriverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JudgmentDriver::class);
    }

    // /**
    //  * @return JudgmentDriver[] Returns an array of JudgmentDriver objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JudgmentDriver
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
