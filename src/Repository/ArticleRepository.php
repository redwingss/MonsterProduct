<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findDisplay() : QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->where('p.display = true')
        ;
    }
    public function findPromo()
    {
        return $this->findDisplay()
            ->andWhere('p.promo = true')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findVisibleDisplay(){
        return $this->findDisplay()
        ->getQuery()
        ->getResult();
    } 
    public function findDate() : QueryBuilder
    {
        return $this->createQueryBuilder('p')
        ->orderBy('p.created_', 'DESC')    
        ->where('p.display = true')
            
        ;
    }
    

}
