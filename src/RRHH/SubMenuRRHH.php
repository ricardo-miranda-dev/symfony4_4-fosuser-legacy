<?php
namespace App\RRHH;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuRRHH extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/rrhh")
     */
    public function indexAction()
    {
        $titulo = "RRHH";
        $menu = $this->menuService->dimeMenuSecundario(8);

        return $this->render(
            'RRHH/SubMenuRRHH.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
