<?php
namespace App\Lab;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuLab extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/laboratorio")
     */
    public function indexAction()
    {
        $titulo = "Laboratorio";
        $menu = $this->menuService->dimeMenuSecundario(21);

        return $this->render(
            'Lab/SubMenuLab.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
