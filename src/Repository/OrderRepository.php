<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
    * @return Order[] 
    */

    public function findSuccessOrders($user)
    {
        $query = $this
            ->createQueryBuilder('o')
            ->andWhere('o.isPaid = 1')
            ->andWhere('o.user= :user')
            ->setParameter('user', $user)
            ->orderBy('o.id','DESC')
            ->getQuery()
            ->getResult();

        /*if(!empty($search->categories)){
            $query = $query
            ->andWhere('c.id IN (:categories)')
            ->setParameter('categories', $search ->categories);
        }
        if(!empty($search->string)){
            $query = $query
            ->andWhere('p.name LIKE :string')
            ->setParameter('string',"%{$search->string}%");
        }
        return $query->getQuery()->getResult();
            
        ;*/
    }

    /*
    public function findOneBySomeField($value): ?Order
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
