<?php

namespace App\Repository;

use App\Entity\Métiers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Métiers>
 *
 * @method Métiers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Métiers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Métiers[]    findAll()
 * @method Métiers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MétiersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Métiers::class);
    }

//    /**
//     * @return Métiers[] Returns an array of Métiers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Métiers
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
