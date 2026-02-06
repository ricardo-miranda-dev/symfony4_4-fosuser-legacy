<?php
namespace App\Logistica;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuLogistica extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/logistica")
     */
    public function indexAction()
    {
        $titulo = "Log&iacute;stica";
        $menu = $this->menuService->dimeMenuSecundario(3);

        return $this->render(
            'Logistica/SubMenuLogistica.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
