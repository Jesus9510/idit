<?php

namespace App\Repository;

use App\Entity\TipoEps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoEps>
 *
 * @method TipoEps|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoEps|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoEps[]    findAll()
 * @method TipoEps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoEpsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoEps::class);
    }

//    /**
//     * @return TipoEps[] Returns an array of TipoEps objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TipoEps
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
