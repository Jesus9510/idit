<?php

namespace App\Repository;

use App\Entity\DatosClinicos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DatosClinicos>
 *
 * @method DatosClinicos|null find($id, $lockMode = null, $lockVersion = null)
 * @method DatosClinicos|null findOneBy(array $criteria, array $orderBy = null)
 * @method DatosClinicos[]    findAll()
 * @method DatosClinicos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DatosClinicosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DatosClinicos::class);
    }

//    /**
//     * @return DatosClinicos[] Returns an array of DatosClinicos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DatosClinicos
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
