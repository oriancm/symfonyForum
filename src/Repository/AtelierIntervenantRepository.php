<?php

namespace App\Repository;

use App\Entity\AtelierIntervenant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AtelierIntervenant>
 *
 * @method AtelierIntervenant|null find($id, $lockMode = null, $lockVersion = null)
 * @method AtelierIntervenant|null findOneBy(array $criteria, array $orderBy = null)
 * @method AtelierIntervenant[]    findAll()
 * @method AtelierIntervenant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtelierIntervenantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AtelierIntervenant::class);
    }

//    /**
//     * @return AtelierIntervenant[] Returns an array of AtelierIntervenant objects
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

//    public function findOneBySomeField($value): ?AtelierIntervenant
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
