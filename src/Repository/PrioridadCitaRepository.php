<?php

namespace App\Repository;

use App\Entity\PrioridadCita;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PrioridadCita>
 *
 * @method PrioridadCita|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrioridadCita|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrioridadCita[]    findAll()
 * @method PrioridadCita[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrioridadCitaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrioridadCita::class);
    }

//    /**
//     * @return PrioridadCita[] Returns an array of PrioridadCita objects
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

//    public function findOneBySomeField($value): ?PrioridadCita
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
