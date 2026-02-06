<?php
namespace App\Sucursales;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuSucursales extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/sucursales")
     */
    public function indexAction()
    {
        $titulo = "Sucursales";
        $menu = $this->menuService->dimeMenuSecundario(20);

        return $this->render(
            'Sucursales/SubMenuSucursales.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
