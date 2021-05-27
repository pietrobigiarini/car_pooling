<?php

namespace App\Repository;

use App\Entity\JudgmentPassenger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JudgmentPassenger|null find($id, $lockMode = null, $lockVersion = null)
 * @method JudgmentPassenger|null findOneBy(array $criteria, array $orderBy = null)
 * @method JudgmentPassenger[]    findAll()
 * @method JudgmentPassenger[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JudgmentPassengerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JudgmentPassenger::class);
    }

    // /**
    //  * @return JudgmentPassenger[] Returns an array of JudgmentPassenger objects
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
    public function findOneBySomeField($value): ?JudgmentPassenger
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
