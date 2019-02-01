<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class CategoryRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Category::class);
    }

    public function findAllOrderedByName() {
        $qb = $this->createQueryBuilder('c')
                ->orderBy('c.nameCategory', 'ASC')
                ->getQuery();

        return $qb->execute();
    }
}