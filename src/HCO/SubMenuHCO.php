<?php
namespace App\HCO;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuHCO extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/hco")
     */
    public function indexAction()
    {
        $titulo = "Historia Clínica Optométrica";
        $menu = $this->menuService->dimeMenuSecundario(5);

        return $this->render(
            'HCO/SubMenuHCO.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
