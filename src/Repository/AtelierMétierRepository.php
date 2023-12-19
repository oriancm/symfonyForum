<?php

namespace App\Repository;

use App\Entity\AtelierMétier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AtelierMétier>
 *
 * @method AtelierMétier|null find($id, $lockMode = null, $lockVersion = null)
 * @method AtelierMétier|null findOneBy(array $criteria, array $orderBy = null)
 * @method AtelierMétier[]    findAll()
 * @method AtelierMétier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtelierMétierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AtelierMétier::class);
    }

//    /**
//     * @return AtelierMétier[] Returns an array of AtelierMétier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AtelierMétier
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
