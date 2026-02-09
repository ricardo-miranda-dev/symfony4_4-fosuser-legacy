<?php
// src/Service/UsuarioXSucursalService.php

namespace App\Service;

use App\Entity\Ventas\UsuarioXSucursal;
use Doctrine\ORM\EntityManagerInterface;

class UsuarioXSucursalService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function crear(array $data): UsuarioXSucursal
    {
        $usxsuc = new UsuarioXSucursal();
        $usxsuc->setSuc($data['id_sucursal']);
        $usxsuc->setUs($data['id_usuario']);
        $usxsuc->setDef($data['s_default']);
        $usxsuc->setFecha(new \DateTime());

        $this->em->persist($usxsuc);
        $this->em->flush();

        return $usxsuc;
    }
	
	public function editar(int $id, array $data): void
	{
		$usxsuc = $this->em->getRepository(UsuarioXSucursal::class)->find($id);

		if (!$usxsuc) {
			throw new \RuntimeException('Usuario no encontrado');
		}

		$usxsuc->setSuc($data['id_sucursal']);
        $usxsuc->setUs($data['id_usuario']);
        $usxsuc->setDef($data['s_default']);

		$this->em->flush();
	}


    public function eliminar(int $id): void
    {
        $usxsuc = $this->em->getRepository(UsuarioXSucursal::class)->find($id);
        if (!$usxsuc) {
            throw new \RuntimeException('Usuario no encontrada');
        }

        $this->em->remove($usxsuc);
        $this->em->flush();
    }
}