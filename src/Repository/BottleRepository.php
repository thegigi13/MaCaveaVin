<?php

namespace App\Repository;

use App\Entity\Bottle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\Query\QueryBuilder;

/**
 * @method Bottle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bottle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bottle[]    findAll()
 * @method Bottle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BottleRepository extends ServiceEntityRepository
{

    /**
     * BottleRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bottle::class);
    }

    /**
     * @return Bottle
     */
    public function findAllVisible() //  :array
    {
        return $this->findVisibleQuery()
            ->getQuery()
            ->getResult();

    }

    /**
     * @return  Bottle array
     */
    public function findLatest() //  : array
    {
        return $this->findVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return QueryBuilder
     */
    private function findVisibleQuery() // : QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->where('p.sold = false');
    }


    // /**
    //  * @return Bottle[] Returns an array of Bottle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bottle
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
