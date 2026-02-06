<?php
namespace App\CRM;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuCRM extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/crm")
     */
    public function indexAction()
    {
        $titulo = "Customer Relationship Management";
        $menu = $this->menuService->dimeMenuSecundario(8);

        return $this->render(
            'CRM/SubMenuCRM.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
