<?php

namespace App\Repository;

use App\Entity\GSanguineo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GSanguineo>
 *
 * @method GSanguineo|null find($id, $lockMode = null, $lockVersion = null)
 * @method GSanguineo|null findOneBy(array $criteria, array $orderBy = null)
 * @method GSanguineo[]    findAll()
 * @method GSanguineo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GSanguineoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GSanguineo::class);
    }

//    /**
//     * @return GSanguineo[] Returns an array of GSanguineo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GSanguineo
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
