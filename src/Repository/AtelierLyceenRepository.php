<?php

namespace App\Repository;

use App\Entity\AtelierLyceen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AtelierLyceen>
 *
 * @method AtelierLyceen|null find($id, $lockMode = null, $lockVersion = null)
 * @method AtelierLyceen|null findOneBy(array $criteria, array $orderBy = null)
 * @method AtelierLyceen[]    findAll()
 * @method AtelierLyceen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtelierLyceenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AtelierLyceen::class);
    }

//    /**
//     * @return AtelierLyceen[] Returns an array of AtelierLyceen objects
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

//    public function findOneBySomeField($value): ?AtelierLyceen
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
