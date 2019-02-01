<?php

namespace App\Repository;

use App\Entity\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


class MessageRepository extends ServiceEntityRepository {

    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Message::class);
    }

    public function findByIdTopic($id)
    {
        $qb = createQueryBuilder();
        $qb ->select('m', 't')
            ->from('App\Entity\Message', 'm')
            ->leftJoin('m.idTopic', 't')
            ->where('t = :id')
            ->orderBy('m.dateMessage', 'DESC')
            ->setParameter('id', $id);
            

        return $qb->getQuery()->getResult();

    }

}