<?php
// src/Controller/SucursalesController.php

namespace App\Sucursales\Controller;

use App\Service\SucursalService;
use App\Repository\Ventas\SucursalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SucursalesController extends AbstractController
{
	 private $sucursalRepository;

    public function __construct(SucursalRepository $sucursalRepository)
    {
        $this->sucursalRepository = $sucursalRepository;
    }
    /**
     * @Route("/sucursales/Sucursales/post", name="postActionSucursales", methods={"POST","GET"})
     */
    public function postAction(Request $request, SucursalService $service): Response
    {
       
		$id = $request->get('id', 0);
        $sucursal = null;

        if ($id) {
            $sucursal = $this->sucursalRepository->find($id);
        }
		
		$titulo = "Registro de Sucursales";
		$link[0] = '../../menu';
        $link[1] = '../../sucursales';

        return $this->render('Sucursales/Sucursales.html.twig', [
			'titulobase' => $titulo,
			'link' => $link,
            'sucursal' => $sucursal,
            'sucursales' => $this->sucursalRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    /**
     * @Route("/ajax/sucursales", name="ajaxSucursales", methods={"POST"},options={"expose"=true})
     */
    public function ajaxAction(Request $request, SucursalService $service): JsonResponse
{
    try {

        /* ===============================
         * GUARDAR
         * =============================== */
        if ($request->request->has('guardarSucursal')) {

            $service->crear([
                'emisor'      => $request->request->get('xEmisor'),
                'ruc'         => $request->request->get('xRuc'),
                'matriz'      => $request->request->get('xMatriz'),
                'sucursal'    => $request->request->get('xSucursal'),
                'correo'      => $request->request->get('xCorreo'),
                'telefono'    => $request->request->get('xTelefono'),
                'lleva_cont'  => $request->request->get('xContabilidad'),
                'estado'      => $request->request->get('xEstado'),
            ]);

            return new JsonResponse([
                'success' => true,
                'message' => 'Usuario guardado correctamente'
            ]);
        }

        /* ===============================
         * EDITAR
         * =============================== */
        if ($request->request->has('editarSucursal')) {

            $service->editar(
                (int)$request->request->get('xIdSucursal'),
                [
                    'emisor'      => $request->request->get('xEmisor'),
                    'ruc'         => $request->request->get('xRuc'),
                    'matriz'      => $request->request->get('xMatriz'),
                    'sucursal'    => $request->request->get('xSucursal'),
                    'correo'      => $request->request->get('xCorreo'),
                    'telefono'    => $request->request->get('xTelefono'),
                    'lleva_cont'  => $request->request->get('xContabilidad'),
                    'estado'      => $request->request->get('xEstado'),
                ]
            );

            return new JsonResponse([
                'success' => true,
                'message' => '../Sucursales/post'
            ]);
        }

        /* ===============================
         * BORRAR
         * =============================== */
        if ($request->request->has('borrarSucursal')) {

            $service->eliminar(
                (int)$request->request->get('xIdSucursal')
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
