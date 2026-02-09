<?php
// src/Controller/UxSucursalesController.php

namespace App\Sucursales\Controller;

use App\Service\UsuarioXSucursalService;
use App\Service\SucursalService;
use App\Service\UsuarioXEmpleadoService;
use App\Repository\Ventas\UsuarioXSucursalRepository;
use App\Repository\Ventas\SucursalRepository;
use App\Repository\RRHH\UsuarioXEmpleadosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UxSucursalController extends AbstractController
{
	 private $uxsucursalRepository;

    public function __construct(UsuarioXSucursalRepository $uxsucursalRepository,SucursalRepository $sucursalRepository)
    {
        $this->uxsucursalRepository = $uxsucursalRepository;
		$this->sucursalRepository = $sucursalRepository;
    }
    /**
     * @Route("/sucursales/UxSucursales/post", name="postActionUxSucursales", methods={"POST","GET"})
     */
    public function postAction(Request $request, UsuarioXSucursalService $service,SucursalService $sucursalservice, UsuarioXEmpleadoService $usxemplservice): Response
    {
		$link = array();
		$id = $request->get('id', 0);
        $uxsucursal = null;

        if ($id) {
            $uxsucursal = $this->uxsucursalRepository->find($id);
        }
		
		$titulo = "Registro de Usuarios por Sucursal";
		$link[0] = '../../menu';
        $link[1] = '../../sucursales';
		
		//print(json_encode($usxemplservice->getListado()));

        return $this->render('Sucursales/UxSucursales.html.twig', [
			'titulobase' => $titulo,
			'link' => $link,
            'uxsucursal' => $uxsucursal,
            'uxsucursales' => $this->uxsucursalRepository->findBy([], ['idusxsuc' => 'DESC']),
			'sucursales' => $this->sucursalRepository->findBy([], ['id' => 'ASC']),
			'empleados' => $usxemplservice->getEmpleadosForSelect(),
			'listado' => $usxemplservice->getListado()
        ]);
    }

    /**
     * @Route("/ajax/ajaxUxSucursales", name="ajaxUxSucursales", methods={"POST"},options={"expose"=true})
     */
    public function ajaxAction(Request $request, UsuarioXSucursalService $service): JsonResponse
{
    try {

        /* ===============================
         * GUARDAR
         * =============================== */
        if ($request->request->has('guardarUxSucursal')) {

            $service->crear([
                'id_sucursal'    => $request->request->get('xSuc'),
                'id_usuario'     => $request->request->get('xUs'),
                's_default'      => $request->request->get('xDef'),
            ]);

            return new JsonResponse([
                'success' => true,
                'message' => 'Usuario guardado correctamente'
            ]);
        }

        /* ===============================
         * EDITAR
         * =============================== */
        if ($request->request->has('editarUxSucursal')) {

            $service->editar(
                (int)$request->request->get('xIdUxSucursal'),
                [
                    'id_sucursal'    => $request->request->get('xSuc'),
					'id_usuario'     => $request->request->get('xUs'),
					's_default'      => $request->request->get('xDef'),					
                ]
            );

            return new JsonResponse([
                'success' => true,
                'message' => '../UxSucursales/post'
            ]);
        }

        /* ===============================
         * BORRAR
         * =============================== */
        if ($request->request->has('borrarUxSucursal')) {

            $service->eliminar(
                (int)$request->request->get('xIdUxSucursal')
            );

            return new JsonResponse([
                'success' => true,
                'message' => 'Usuario eliminado correctamente'
            ]);
        }

        return new JsonResponse([
            'success' => false,
            'message' => 'Acción no válida'
        ]);

    } catch (\Throwable $e) {

        return new JsonResponse([
            'success' => false,
            'message' => 'Error interno del servidor',
            'debug'   => $e->getMessage() 
        ], 500);
    }
}

	
}
