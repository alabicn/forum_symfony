<?php

namespace App\Repository;

use App\Entity\Topic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class TopicRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Topic::class);
    }

    public function findAllOrderedByName() {


        $qb = $this->createQueryBuilder('t')
                ->orderBy('t.nameTopic', 'ASC')
                ->getQuery();

        return $qb->execute();
    }

    public function findByIdCategory($id)
    {
        $qb = createQueryBuilder();
        $qb ->select('t', 'c')
            ->from('App\Entity\Topic', 't')
            ->leftJoin('t.idCategory', 'c')
            ->where('c = :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getResult();

    }
}
