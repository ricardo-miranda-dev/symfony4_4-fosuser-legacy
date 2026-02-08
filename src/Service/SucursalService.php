<?php
// src/Service/SucursalService.php

namespace App\Service;

use App\Entity\Ventas\Sucursal;
use Doctrine\ORM\EntityManagerInterface;

class SucursalService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function crear(array $data): Sucursal
    {
        $sucursal = new Sucursal();
        $sucursal->setEmisor($data['emisor']);
        $sucursal->setRuc($data['ruc']);
        $sucursal->setMatriz($data['matriz']);
        $sucursal->setSucursal($data['sucursal']);
        $sucursal->setCorreo($data['correo']);
        $sucursal->setTelefono($data['telefono']);
        $sucursal->setLlevaCont($data['lleva_cont']);
        $sucursal->setEstado($data['estado']);
        $sucursal->setFecha(new \DateTime());

        $this->em->persist($sucursal);
        $this->em->flush();

        return $sucursal;
    }
	
	public function editar(int $id, array $data): void
	{
		$sucursal = $this->em->getRepository(Sucursal::class)->find($id);

		if (!$sucursal) {
			throw new \RuntimeException('Sucursal no encontrada');
		}

		$sucursal->setEmisor($data['emisor']);
		$sucursal->setRuc($data['ruc']);
		$sucursal->setMatriz($data['matriz']);
		$sucursal->setSucursal($data['sucursal']);
		$sucursal->setCorreo($data['correo']);
		$sucursal->setTelefono($data['telefono']);
		$sucursal->setLlevaCont($data['lleva_cont']);
		$sucursal->setEstado($data['estado']);

		$this->em->flush();
	}


    public function eliminar(int $id): void
    {
        $sucursal = $this->em->getRepository(Sucursal::class)->find($id);
        if (!$sucursal) {
            throw new \RuntimeException('Sucursal no encontrada');
        }

        $this->em->remove($sucursal);
        $this->em->flush();
    }
}
