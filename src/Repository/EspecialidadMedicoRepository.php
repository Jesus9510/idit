<?php

namespace App\Repository;

use App\Entity\EspecialidadMedico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EspecialidadMedico>
 *
 * @method EspecialidadMedico|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspecialidadMedico|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspecialidadMedico[]    findAll()
 * @method EspecialidadMedico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspecialidadMedicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EspecialidadMedico::class);
    }

//    /**
//     * @return EspecialidadMedico[] Returns an array of EspecialidadMedico objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EspecialidadMedico
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
