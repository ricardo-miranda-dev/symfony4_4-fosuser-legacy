<?php
namespace App\Ventas;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuVentas extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/ventas")
     */
    public function indexAction()
    {
        $titulo = "Ventas";
        $menu = $this->menuService->dimeMenuSecundario(4);

        return $this->render(
            'Ventas/SubMenuVentas.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
