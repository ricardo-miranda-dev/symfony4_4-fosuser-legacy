<?php
namespace App\Agenda;

use App\Configuracion\Services\MenuService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SubMenuAgenda extends AbstractController
{
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * @Route("/agenda")
     */
    public function indexAction()
    {
        $titulo = "Agenda";
        $menu = $this->menuService->dimeMenuSecundario(22);

        return $this->render(
            'Agenda/SubMenuAgenda.html.twig',
            [
                'titulobase' => $titulo,
                'menu' => $menu
            ]
        );
    }
}
