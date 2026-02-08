<?php

namespace App\Repository\Ventas;

use App\Entity\Ventas\Sucursal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SucursalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sucursal::class);
    }

    public function findActivas(): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.estado = :estado')
            ->setParameter('estado', 1)
            ->orderBy('s.nombre', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
