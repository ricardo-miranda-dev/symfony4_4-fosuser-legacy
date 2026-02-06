<?php
namespace App\Configuracion;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuConfiguracion extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/TEIC",name="TEIC")
     */
    public function indexAction()
    {
        $titulo = "Gestión de Usuarios";
        $menu = $this->menuService->dimeMenuSecundario(7);

        return $this->render(
            'Configuracion/SubMenuConfiguracion.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
