<?php

namespace App\Service;

use App\Repository\RRHH\EmpleadosRepository;

class UsuarioXEmpleadoService
{
    private $empleadosRepository;

    public function __construct(EmpleadosRepository $empleadosRepository)
    {
        $this->empleadosRepository = $empleadosRepository;
    }

    public function getEmpleadosForSelect(): array
    {
        return $this->empleadosRepository->findEmpleadosWithUsername();
    }
	
	public function getListado(): array
    {
        return $this->empleadosRepository->findUxSucursalesListado();
    }
}
