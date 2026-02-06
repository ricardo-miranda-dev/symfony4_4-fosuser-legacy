<?php
namespace App\Servicios;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuServicios extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/servicios")
     */
    public function indexAction()
    {
        $titulo = "Servicios";
        $menu = $this->menuService->dimeMenuSecundario(5);

        return $this->render(
            'Servicios/SubMenuServicios.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
