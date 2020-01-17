<?php

namespace App\Repository;

use App\Entity\Product as Entity;

/**
 * @codingStandardsIgnoreStart
 *
 * @method Entity|null                     find(string $id, ?int $lockMode = null, ?int $lockVersion = null): ?Entity
 * @method array<int|string, mixed>|Entity findAdvanced(string $id, $hydrationMode = null)
 * @method Entity|null                     findOneBy(array $criteria, ?array $orderBy = null): ?Entity
 * @method array<int, Entity>              findBy(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null): array
 * @method array<int, Entity>              findByAdvanced(array $criteria, ?array $orderBy = null, ?int $limit = null, ?int $offset = null, ?array $search = null): array
 * @method array<int, Entity>              findAll(): array
 *
 * @codingStandardsIgnoreEnd
 */
class ProductRepository extends BaseRepository
{
    protected static string $entityName = Entity::class;
}

    // /**
    //  * @return Product[] Returns an array of Product objects
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

