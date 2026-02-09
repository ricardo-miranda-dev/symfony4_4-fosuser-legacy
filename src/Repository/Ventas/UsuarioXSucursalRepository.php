<?php

namespace App\Repository\Ventas;

use App\Entity\Ventas\UsuarioXSucursal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UsuarioXSucursalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuarioXSucursal::class);
    }

}