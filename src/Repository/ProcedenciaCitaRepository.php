<?php

namespace App\Repository;

use App\Entity\ProcedenciaCita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProcedenciaCita>
 *
 * @method ProcedenciaCita|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProcedenciaCita|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProcedenciaCita[]    findAll()
 * @method ProcedenciaCita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcedenciaCitaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProcedenciaCita::class);
    }

//    /**
//     * @return ProcedenciaCita[] Returns an array of ProcedenciaCita objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProcedenciaCita
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
